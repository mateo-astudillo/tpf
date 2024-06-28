<?php
switch($page) {
    case "":
    case "home":
        include "views/home.php";
        break;
    case "files":
        include "views/files.php";
        break;
    case "actors":
        switch ($p = array_shift($r)) {
            case "":
                include "views/actors.php";
                break;
            case "insert":
                include "views/insert_actor.php";
                break;
            case "edit":
                $id = array_shift($r);
                include "views/edit_actor.php";
                break;
            default:
                echo $p;
                break;
        }
        break;
    case "movies":
        switch (array_shift($r)) {
            case "insert":
                include "views/insert_movie.php";
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
