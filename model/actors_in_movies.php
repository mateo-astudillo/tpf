<?php

function delete_aims() {
    global $pdo;
    $q = "DELETE FROM `actors_in_movies`;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
}

function insert_actors_in_movies($actor_id, $movie_id, $character) {
    global $pdo;
    $q = "INSERT INTO `actors_in_movies` (`actor_id`, `movie_id`, `character`) VALUES (:ai, :mi, :ch);";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":ai", $actor_id, PDO::PARAM_INT);
    $stmt->bindParam(":mi", $movie_id, PDO::PARAM_INT);
    $stmt->bindParam(":ch", $character, PDO::PARAM_STR, 255);
    $stmt->execute();
}

function get_movie_ids_by_actor($actor_id): array {
    global $pdo;
    $q = "SELECT `movie_id` FROM `actors_in_movies` WHERE `actor_id` = :ai;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":ai", $actor_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_actor_ids_by_movie($movie_id): array {
    global $pdo;
    $q = "SELECT `actor_id` FROM `actors_in_movies` WHERE `movie_id` = :mi;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":mi", $movie_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_movies_by_actor($actor_id): array {
    global $pdo;
    $q = "SELECT * FROM `movies` WHERE `id` = :mi;";
    $stmt = $pdo->prepare($q);
    $movies = [];
    foreach (get_movie_ids_by_actor($actor_id) as $m) {
        $stmt->bindParam(":mi", $m["movie_id"], PDO::PARAM_INT);
        $stmt->execute();
        array_push($movies, $stmt->fetch(PDO::FETCH_ASSOC));
    }
    return $movies;
}

function get_actors_by_movie($movie_id): array {
    global $pdo;
    $q = "SELECT * FROM `actor` WHERE `id` = :ai;";
    $stmt = $pdo->prepare($q);
    $actors = [];
    foreach (get_actor_ids_by_movie($movie_id) as $a) {
        $stmt->bindParam(":mi", $a["actor_id"], PDO::PARAM_INT);
        $stmt->execute();
        array_push($actors, $stmt->fetch(PDO::FETCH_ASSOC));
    }
    return $actors;
}

function get_number_of_movies_by_actor($actor_id) {
    global $pdo;
    $q = "SELECT COUNT(`movie_id`) as movies FROM `actors_in_movies` WHERE `actor_id` = :ai;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":ai", $actor_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_number_of_actors_by_movie($movie_id) {
    global $pdo;
    $q = "SELECT COUNT(`actor_id`) as actors FROM `actors_in_movies` WHERE `movie_id` = :mi;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":mi", $movie_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
