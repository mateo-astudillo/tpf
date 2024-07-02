<?php
switch (array_shift($r)) {
    case "reset":
        reset_db();
        break;
    case "files":
        if (isset($_FILES["actors_file"])) {
            $actors_file = $_FILES["actors_file"];
            $af = fopen($actors_file["tmp_name"], "r");
            $actors = [];
            while (!feof($af)) {
                $a = explode(",", fgets($af));
                if (sizeof($a) != 3) continue;
                array_push($actors, array( 
                    "last_name"=>strtoupper(trim($a[0])),
                    "first_name"=>strtoupper(trim($a[1])),
                    "birthdate"=>strtoupper(trim($a[2]))
                ));
            }
            insert_actors($actors);
            fclose($af);
            header('Location: /actors');
        }
        if (isset($_FILES["movies_file"])) {
            $movies_file = $_FILES["movies_file"];
            $mf = fopen($movies_file["tmp_name"], "r");
            $movies = [];
            while (!feof($mf)) {
                $m = explode(",", fgets($mf));
                if (sizeof($m) != 3) continue;
                array_push($movies, array(
                    "name"=>strtoupper(trim($m[0])),
                    "release_year"=>strtoupper(trim($m[1])),
                    "genre"=>strtoupper(trim($m[2]))
                ));
            }
            insert_movies($movies);
            fclose($mf);
            header('Location: /movies');
        }
        break;
    case "actors":
        $id = array_shift($r) ?: "";
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                switch ($id) {
                    case "":
                        header('Content-Type: application/json; charset=utf-8');
                        echo json_encode(get_all_actors());
                        break;
                    default:
                        header('Content-Type: application/json; charset=utf-8');
                        echo json_encode(get_actor($id));
                        break;
                }
                break;
            case "POST":
                $first_name = strtoupper(trim($_POST["first_name"]));
                $last_name = strtoupper(trim($_POST["last_name"]));
                $birthdate = strtoupper(trim($_POST["birthdate"]));
                insert_actor($first_name, $last_name, $birthdate);
                header('Location: /actors');
                break;
            case "DELETE":
                remove_actor($id);
                header('Location: /actors');
                break;
            case "PATCH":
                $_PATCH = json_decode(file_get_contents("php://input"), true);
                $first_name = strtoupper(trim($_PATCH["first_name"]));
                $last_name = strtoupper(trim($_PATCH["last_name"]));
                $birthdate = strtoupper(trim($_PATCH["birthdate"]));
                update_actor($id, $first_name, $last_name, $birthdate);
                break;
            default:
                break;
        }
        break;
    case "movies":
        $id = array_shift($r);
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $data = get_all_movies();
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data);
                break;
            case "POST":
                $name = strtoupper(trim($_POST["name"]));
                $release_year = strtoupper(trim($_POST["release_year"]));
                $genre = strtoupper(trim($_POST["genre"]));
                insert_movie($name, $release_year, $genre);
                header('Location: /movies');
                break;
            case "DELETE":
                remove_movie($id);
                header('Location: /movies');
                break;
            case "PATCH":
                $_PATCH = json_decode(file_get_contents("php://input"), true);
                $name = strtoupper(trim($_PATCH["name"]));
                $release_year = strtoupper(trim($_PATCH["release_year"]));
                $genre = strtoupper(trim($_PATCH["genre"]));
                update_movie($id, $name, $release_year, $genre);
                break;
            default:
                echo "API";
                break;
        }
        break;
    default:
        break;
}
