<?php
function reset_db() {
    $actor_file = fopen(getenv("ACTOR_FILE_PATH"), "r");
    $movie_file = fopen(getenv("MOVIE_FILE_PATH"), "r");
    $actors = [];
    // $movies = [];
    while (!feof($actor_file)) {
        $a = explode(",", fgets($actor_file));
        $actor = array("first_name"=>$a[1], "last_name"=>$a[0], "birthdate"=>$a[2]);
        array_push($actors, $actor);
    }
    // while (!feof($movie_file)) {
    //     $movie = explode(",", fgets($actor_file));
    //     array_push($movies, $movie);
    // }

    multiple_actors_insert($actors);

    fclose($actor_file);
    fclose($movie_file);
}
