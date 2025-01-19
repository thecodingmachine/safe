#!/bin/sh
set -eu

# A little helper script to rebuild the generated files using a known-good
# environment, so that we should all end up with the same results, and also
# no need to install any dependencies on the host machine.

cd $(dirname $0)/../
docker run --rm -v ${PWD}:/app $(docker build -q -f .devcontainer/Dockerfile .)
