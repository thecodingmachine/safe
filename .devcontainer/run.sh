#!/bin/sh
cd $(dirname $0)/../
docker run --rm -ti -v ${PWD}:/app $(docker build -q . -f .devcontainer/Dockerfile) /bin/bash
