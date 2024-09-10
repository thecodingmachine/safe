#!/bin/sh
docker run --rm -ti -v ${PWD}:/app $(docker build -q .) /bin/bash
