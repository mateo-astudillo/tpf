<?php
$pdo;
$q = "SELECT * FROM `actors` WHERE `id` = :id;";
$get_actor = $pdo->prepare($q);

function age(string $bd): string {
    $bd = new DateTime($bd);
    $now = new DateTime();
    $age = $bd->diff($now);
    return $age->format("%y");
}

function get_actor_id($first_name, $last_name): int|bool {
    global $pdo;
    $q = "SELECT `id` FROM `actors` WHERE `first_name`= :fn AND `last_name` = :ln;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":fn", $first_name, PDO::PARAM_STR);
    $stmt->bindParam(":ln", $last_name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)["id"] ?: false;
}

function get_actor($id) {
    global $get_actor;
    $get_actor->bindParam(":id", $id, PDO::PARAM_INT);
    $get_actor->execute();
    return $get_actor->fetch(PDO::FETCH_ASSOC);
}

function get_all_actors(): array {
    global $pdo;
    $q = "SELECT * FROM `actors`;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_actor($first_name, $last_name, $birthdate) {
    global $pdo;
    $q = "INSERT INTO `actors` (`first_name`, `last_name`, `birthdate`) VALUES(:fn, :ln, :bd);";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam("fn", $first_name);
    $stmt->bindParam("ln", $last_name);
    $stmt->bindParam("bd", $birthdate);
    $stmt->execute();
}

function delete_actors() {
    global $pdo;
    $q_delete = "DELETE FROM `actors`;";
    $stmt = $pdo->prepare($q_delete);
    $stmt->execute();
}

function insert_actors(array $actors) {
    global $pdo;
    $q = "INSERT INTO `actors` (`first_name`, `last_name`, `birthdate`) VALUES(:fn, :ln, :bd);";
    $stmt = $pdo->prepare($q);
    foreach ($actors as $a) {
        $stmt->bindParam(":fn", $a["first_name"]);
        $stmt->bindParam(":ln", $a["last_name"]);
        $stmt->bindParam(":bd", $a["birthdate"]);
        $stmt->execute();
    }
}

function remove_actor($id) {
    global $pdo;
    $q = "DELETE FROM `actors_in_movies` WHERE `actor_id` = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $q = "DELETE FROM `actors` WHERE id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}

function update_actor($actor_id, $first_name, $last_name, $birthdate) {
    global $pdo;
    $q = "UPDATE `actors` SET `first_name` = :fn, `last_name` = :ln, `birthdate` = :bd WHERE `id` = :ai;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":ai", $actor_id);
    $stmt->bindParam(":fn", $first_name);
    $stmt->bindParam(":ln", $last_name);
    $stmt->bindParam(":bd", $birthdate);
    $stmt->execute();
}
