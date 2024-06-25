<?php
switch($page) {
    case "":
    case "home":
        include "views/home.php";
        break;
    case "actors":
        switch (array_shift($r)) {
            case "insert":
                include "views/insert_actors.php";
                break;
            default:
                include "views/actors.php";
                break;
        }
        break;
    case "movies":
        switch (array_shift($r)) {
            case "insert":
                include "views/insert_movies.php";
                break;
            default:
                include "views/movies.php";
                break;
        }
        break;
    default:
        include "views/404.php";
        break;
}
