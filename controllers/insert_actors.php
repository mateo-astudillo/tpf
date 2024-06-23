<?php
if (isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
}
if (isset($_POST["last_name"])) {
    $last_name = $_POST["last_name"];
}
if (isset($_POST["birthday"])) {
    $birthday = $_POST["birthday"];
}

header('Location: /actors'); 
