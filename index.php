<?php
include "model/connection.php";
include "model/actors.php";
include "model/movies.php";
include "model/actors_in_movies.php";
include "model/reset.php";
$request_uri = $_SERVER["REQUEST_URI"];
$end = strpos($request_uri, "?") ?: strlen($request_uri);
$request_uri = substr($request_uri, 0, $end);
$r = explode("/", $request_uri);
array_shift($r); // the first element is empty
switch ($page = array_shift($r)) {
    case "api":
        include "controller/api.php";
        break;
    default:
        include "views/top.php";
        include "controller/frontend.php";
        include "views/down.php";
}
