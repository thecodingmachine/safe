#!/bin/sh
cd $(dirname $0)/../
docker run --rm -v ${PWD}:/app $(docker build -q -f .devcontainer/Dockerfile .)
