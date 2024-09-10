#!/bin/sh
docker run --rm -v ${PWD}:/app $(docker build -q .)
