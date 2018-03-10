#!/usr/bin/env python3
"""
A simple script for capturing HTTP archives.
This feature is built into both Firefox and Chromium, but I ran into
problems when saving archives of ezyvet HTTP traffic with content.
Firefox silently failed to save anything, and Chromium truncated the
JSON structure of the file, making it mostly useless.

You'll need to put the browsermob-proxy binary in your $PATH for this to
work.
"""

import json
import contextlib
import browsermobproxy
from selenium import webdriver

CAPTURE_OPTIONS = {
    "captureHeaders": True,
    "captureContent": True,
    "captureBinaryContent": True
}

@contextlib.contextmanager
def proxy_server():
    server = browsermobproxy.Server()
    server.start()
    try:
        yield server.create_proxy()
    finally:
        server.stop()

def proxy_cap(proxy):
    # https://stackoverflow.com/questions/11450158/how-do-i-set-proxy-for-chrome-in-python-webdriver
    return {
        "httpProxy": proxy,
        "ftpProxy": proxy,
        "sslProxy": proxy,
        "noProxy": None,
        "proxyType": "MANUAL",
        "class": "org.openqa.selenium.Proxy",
        "autodetect": False
    }

def main(url=None):
    with proxy_server() as proxy:
        # We use Chrome because I couldn't figure out how to get Firefox
        # to ignore that the proxy is self-signing certificates.  Chrome
        # doesn't seem to mind when it is being driven by selenium.
        driver = webdriver.Chrome(desired_capabilities={
            **webdriver.DesiredCapabilities.CHROME,
            "proxy": proxy_cap(proxy.proxy)
        })

        while True:
            proxy.new_har(options=CAPTURE_OPTIONS)
            print("Starting capture...")
            if url is not None:
                driver.get(url)
                url = None
            basename = input("Save as HAR: ")
            with open(f"{basename}.har", "w") as file:
                json.dump(proxy.har, file)

if __name__ == "__main__":
    import sys
    main(sys.argv[1] if len(sys.argv) >= 2 else None)
