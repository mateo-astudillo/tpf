<?php
switch($page) {
    case "":
    case "home":
        include "views/home.php";
        break;
    case "files":
        include "views/files.php";
        break;
    case "insert":
        include "views/insert.php";
        break;
    case "actors":
        switch ($p = array_shift($r)) {
            case "":
                include "views/actors/actors.php";
                break;
            case "insert":
                include "views/actors/insert_actor.php";
                break;
            case "edit":
                $id = array_shift($r);
                include "views/actors/edit_actor.php";
                break;
            default:
                echo $p;
                break;
        }
        break;
    case "movies":
        switch (array_shift($r)) {
            case "":
                include "views/movies/movies.php";
                break;
            case "insert":
                include "views/movies/insert_movie.php";
                break;
            case "edit":
                $id = array_shift($r);
                include "views/movies/edit_movie.php";
                break;
            default:
                echo $p;
                break;
        }
        break;
    default:
        include "views/404.php";
        break;
}
