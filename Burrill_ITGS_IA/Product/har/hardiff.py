"""
Library intended for finding differences in har files

The idea is that one would import this module in the Python REPL and use
it to get information about requests that fail in one har file, but
succeed in another.  This allows me to fix requests that fail in the
mock server.

This is designed to fit my needs and is not meant as a comprehensive
library for tasks involving HAR files.  It has several functions and
methods which exist only as conveniences for me, and is missing many
things that a HAR library should have.
"""

import os
import re
import json
import sys
import shutil
import base64
from urllib.parse import urlparse, parse_qsl

class HAREntry:
    """
    A simple abstraction over the parts of the HAR data I care about

    HAR spec: http://www.softwareishard.com/blog/har-12-spec
    """
    def __init__(self, data):
        self.data = data

    def __repr__(self):
        return f"<HAREntry {self.status} {self.method} {self.url.geturl()}>"

    @property
    def url(self):
        return urlparse(self.data["request"]["url"])

    @property
    def content(self):
        """ Returns a byte string representing the response body """
        content = self.data["response"]["content"]
        encoding = content.get("encoding", "utf-8")
        if encoding == "base64":
            return base64.b64decode(content["text"])
        else:
            # (!!!) This won't work properly for arbitrary codecs
            # because `encoding` is meant to be used to decode `text`,
            # but since `text` is a character string in Python rather
            # than a byte string, we can't use byte string codecs to
            # decode it further.  Instead we just re-encode it with the
            # specified encoding which, although improper, is probably
            # the best we can do and almost certainly won't be a problem
            # for my purposes.
            return content["text"].encode(encoding)

    @property
    def status(self):
        return self.data["response"]["status"]

    @property
    def method(self):
        return self.data["request"]["method"]

    @property
    def query(self):
        return dict(parse_qsl(self.url.query))

    # Silly methods below:
    def paths_match(self, other):
        """ Useful as a filter method for my purposes """
        return self.url.path == other.url.path
    
    def print_content(self):
        sys.stdout.buffer.write(self.content)
        print()
    
    def print_info(self):
        print(f"{self.method} {self.url.geturl()}")
        print("-" * shutil.get_terminal_size().columns)
        self.print_content()
    
    def save_content(self, filename, *, force=False):
        if not force and os.path.exists(filename):
            raise FileExistsError("Use force=True to force")

        os.makedirs(os.path.dirname(filename), exist_ok=True)
        with open(filename, "wb") as file:
            file.write(self.content)


def load_har(filename):
    with open(filename) as file:
        return json.load(file)

def get_entries(filename):
    return list(map(HAREntry, load_har(filename)["log"]["entries"]))

def failed(entries):
    for entry in entries:
        if entry.status >= 400:
            yield entry

def search_urls(entries, pattern, flags=0):
    for entry in entries:
        if re.search(pattern, entry.url.geturl(), flags):
            yield entry

def install(entries, path):
    for entry in entries:
        if entry.url.path.startswith(path):
            filename = f".{entry.url.path}-{entry.method}.html"

            try:
                entry.save_content(filename)
            except FileExistsError:
                print(f"Already saved {filename}")
            else:
                print(f"Saved {filename} ({entry.status})")

def dict_diff(old, new):
    # Returns a dict that can extend old to make new (not accounting for
    # deleted items)
    return {
        name: value
        for name, value in new.items()
        if name not in old or value != old[name]
    }

def tab_activity_diff(entry):
    old = json.loads(entry.query.get("tabActivity", ["{}"])[0])
    match = re.search(rb"updateTabActivity\( (.*?) \)", entry.content)
    if match:
        try:
            new = json.loads(match.group(1))
        except json.decoder.JSONDecodeError:
            return {
                "!!unknown_change!!": {
                    "entry": entry,
                    "call": match.group()
                }
            }
        return dict_diff(old, new)
    return {}

def search_dict(d, pattern, path=()):
    for key, value in d.items():
        if isinstance(value, str):
            match = re.search(pattern, value)
            if match:
                yield path
            continue
        elif isinstance(value, dict):
            sub_dict = value
        else:
            try:
                sub_dict = dict(enumerate(value))
            except TypeError:
                continue
        yield from search_dict(sub_dict, pattern, path + (key,))
