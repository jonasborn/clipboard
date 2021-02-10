<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/IdGenerator.php";
require_once __DIR__ . "/PasteFile.php";


$pattern = "(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})";

$gen = new IdGenerator(Config::$DIR);

$id=urlencode($_GET["id"]);

$file = Config::$DIR . "/" . $id;

if (!file_exists($file)) {
    header('Location: ./');
    exit();
}

$type = mime_content_type($file);

if ($type == "text/plain") {
    $replaced = preg_replace($pattern, "", file_get_contents('php://input'));
    if (strlen($replaced) < 1) $type = "text/x-uri";
}

if ($type == "text/x-uri") {

}

header("Content-Type: $type");
echo file_get_contents($file);
