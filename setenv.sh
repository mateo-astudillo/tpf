#!/bin/bash

export PDO_USER=root &&
export PDO_PASS=pass &&
export PDO_HOST=127.0.0.1 &&
export PDO_DB=tpf &&
export ACTOR_FILE_PATH=/home/mateo/Projects/Php/tpf/data/actors.csv &&
export MOVIE_FILE_PATH=/home/mateo/Projects/Php/tpf/data/movies.csv &&

php -S localhost:8080


