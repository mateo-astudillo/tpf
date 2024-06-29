<?php

function reset_db() {
    $actor_file = fopen(getenv("ACTOR_FILE_PATH"), "r");
    $movie_file = fopen(getenv("MOVIE_FILE_PATH"), "r");
    $actors = [];
    $movies = [];

    while (!feof($actor_file)) {
        $a = explode(",", fgets($actor_file));
        if (sizeof($a) != 3) continue;
        $actor = array("first_name"=>$a[1], "last_name"=>$a[0], "birthdate"=>$a[2]);
        array_push($actors, $actor);
    }
    while (!feof($movie_file)) {
        $m = explode(",", fgets($movie_file));
        if (sizeof($m) != 3) continue;
        $movie = array("name"=>$m[0], "release_year"=>$m[1], "genre"=>$m[2]);
        array_push($movies, $movie);
    }

    delete_actors();
    insert_actors($actors);
    delete_movies($movies);
    insert_movies($movies);

    fclose($actor_file);
    fclose($movie_file);
}
