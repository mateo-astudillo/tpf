#!/bin/bash

export PDO_USER=root &&
export PDO_PASS=pass &&
export PDO_HOST=127.0.0.1 &&
export PDO_DB=tpf &&
export ACTOR_FILEPATH=/home/mateo/tpf/data/actors.csv &&
export MOVIE_FILEPATH=/home/mateo/tpf/data/movies.csv &&
export ACTORS_IN_MOVIES_FILEPATH=/home/mateo/tpf/data/actors_in_movies.csv &&

php -S localhost:8080


