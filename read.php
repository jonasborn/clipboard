<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/IdGenerator.php";

function back() {
    header('Location: ./');
    exit();
}

$pattern = "(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})";

$gen = new IdGenerator(Config::$DIR);

$id = urlencode($_GET["id"]);

$file = Config::$DIR . "/" . $id;

if (time() - filemtime($file) > 259200) {
    unlink($file);
    back();
}

if (!file_exists($file) || !is_file($file)) {
    back();
}

$type = mime_content_type($file);
$content = file_get_contents('php://input');

/*if ($type == "text/plain") {
    $replaced = preg_replace($pattern, "", $content);
    echo $replaced;
    if (strlen($replaced) < 1) $type = "text/x-uri";
}

if ($type == "text/x-uri") {
    header("Location: $content");
    exit();
}*/

header("Content-Type: $type");
echo file_get_contents($file);
