#!/bin/sh
set -eu
cd $(dirname $0)/../
docker run --rm -v ${PWD}:/app $(docker build -q -f .devcontainer/Dockerfile .)
