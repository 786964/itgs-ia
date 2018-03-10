from setuptools import setup, find_packages

setup(
    name="hartools",
    version="0.1.0",
    author="Ben Burrill",
    py_modules=["harcapture", "hardiff"],
    entry_points={
        "console_scripts": ["harcapture=harcapture:main"]
    },
    install_requires=["selenium", "browsermob-proxy"]
)
