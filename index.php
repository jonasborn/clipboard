<?php

require_once __DIR__ . "/IdGenerator.php";
$dir = __DIR__ . "/pastes";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "POST";
    require_once "write.php";
    exit();
} else if (isset($_GET["id"])) {

    require_once "read.php";
    exit();

} else {
    echo file_get_contents("template.html");
}



?>

