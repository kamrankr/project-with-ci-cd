#!/usr/bin/env bash

make build-and-start
make composer-install
make test
