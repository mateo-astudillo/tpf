<?php
include "model/connection.php";
include "model/actors.php";
include "model/movies.php";
$r = explode("/", $_SERVER["REQUEST_URI"]);
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
