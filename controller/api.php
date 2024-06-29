<?php
switch (array_shift($r)) {
    case "reset":
        reset_db();
        break;
    case "files":
        echo "HELLO";
        if (isset($_POST["actor_file"])) {
            echo "archivo";
        }
        break;
    case "actors":
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $data = get_all_actors();
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data);
                break;
            case "POST":
                insert_actor();
                header('Location: /actors');
                break;
            case "DELETE":
                remove_actor((int)array_shift($r));
                header('Location: /actors');
                break;
            case "PUT":
                echo "Hello put";
                break;
            case "PATCH":
                echo "Hello patch";
                break;
            default:
                break;
        }
        break;
    case "movies":
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $data = get_all_movies();
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data);
                break;
            case "POST":
                insert_movie();
                header('Location: /movies');
                break;
            case "DELETE":
                remove_movie((int)array_shift($r));
                header('Location: /movies');
                break;
            default:
                echo "API";
                break;
        }
        break;
    default:
        break;
}
