#!/bin/bash

docker run \
  --name tpf \
  -e MYSQL_ROOT_PASSWORD=pass \
  -e MYSQL_DATABASE=tpf \
  -p 3306:3306 \
  -v $(pwd)/data/create_tables.sql:/docker-entrypoint-initdb.d/init.sql \
  -d \
  mysql
