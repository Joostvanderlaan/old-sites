#!/bin/sh

gatsby build

docker-compose build && docker-compose up
