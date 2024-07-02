<?php

function reset_db() {
    $actor_file = fopen(getenv("ACTOR_FILEPATH"), "r");
    $movie_file = fopen(getenv("MOVIE_FILEPATH"), "r");
    $aim_file = fopen(getenv("ACTORS_IN_MOVIES_FILEPATH"), "r");
    $actors = [];
    $movies = [];
    $aims = [];

    while (!feof($actor_file)) {
        $a = explode(",", fgets($actor_file));
        if (sizeof($a) != 3) continue;
        array_push($actors, array( 
            "last_name"=>strtoupper(trim($a[0])),
            "first_name"=>strtoupper(trim($a[1])),
            "birthdate"=>trim($a[2])
        ));
    }
    while (!feof($movie_file)) {
        $m = explode(",", fgets($movie_file));
        if (sizeof($m) != 3) continue;
        array_push($movies, array(
            "name"=>strtoupper(trim($m[0])),
            "release_year"=>trim($m[1]),
            "genre"=>strtoupper(trim($m[2]))
        ));
    }

    while (!feof($aim_file)) {
        $aim = explode(",", fgets($aim_file));
        if (sizeof($aim) != 4) continue;
        array_push($aims, array(
            "actor_fn"=>strtoupper(trim($aim[0])),
            "actor_ln"=>strtoupper(trim($aim[1])),
            "movie_name"=>strtoupper(trim($aim[2])),
            "character"=>strtoupper(trim($aim[3]))
        ));
    }

    delete_aims();
    delete_actors();
    delete_movies($movies);

    insert_actors($actors);
    insert_movies($movies);

    foreach ($aims as $am) {
        $ai = get_actor_id($am["actor_fn"], $am["actor_ln"]);
        $mi = get_movie_id($am["movie_name"]);
        if (!$ai or !$mi) continue;
        insert_actors_in_movies($ai, $mi, trim($am["character"]));
    }

    fclose($actor_file);
    fclose($movie_file);
    fclose($aim_file);
}
