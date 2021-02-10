<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/IdGenerator.php";

$pattern = "(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})";

$gen = new IdGenerator(Config::$DIR);

$id = $gen->create();

$file = Config::$DIR . "/" . $gen->create();
if (isset($_POST["text"]) && strlen($_POST["text"]) > 0) {
    file_put_contents($file, $_POST["text"]);
} else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
        echo "File uploaded\n";
    } else {
        echo "Unable to upload\n";
    }
}

echo "<h1>$id</h1>";
