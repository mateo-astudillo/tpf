<?php
function reset_db() {
    $actor_file = fopen(getenv("ACTOR_FILE_PATH"), "r");
    $movie_file = fopen(getenv("MOVIE_FILE_PATH"), "r");
    $actors = [];
    $movies = [];
    while (!feof($actor_file) and fgets($actor_file) != "") {
        $a = explode(",", fgets($actor_file));
        $actor = array("first_name"=>$a[1], "last_name"=>$a[0], "birthdate"=>$a[2]);
        array_push($actors, $actor);
    }
    while (!feof($movie_file) and fgets($movie_file) != "") {
        $m = explode(",", fgets($movie_file));
        $movie = array("name"=>$m[0], "release_year"=>$m[1], "genre"=>$m[2]);
        array_push($movies, $movie);
    }

    multiple_actors_insert($actors);
    multiple_movies_insert($movies);

    fclose($actor_file);
    fclose($movie_file);
}
