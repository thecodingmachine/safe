#!/bin/sh
set -eu

# A little helper script to run a shell in a known-good environment, so that
# developers can easily debug issues with the build process.

cd $(dirname $0)/../
docker run --rm -ti -v ${PWD}:/app $(docker build -q . -f .devcontainer/Dockerfile) /bin/bash
