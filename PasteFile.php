<?php

require_once "IdGenerator.php";

class PasteFile
{

    /**
     * PasteFile constructor.
     * @param $path
     * @param $id
     * @param $type
     */
    public function __construct($path, $id, $type)
    {
        $this->path = $path;
        $this->id = $id;
        $this->type = $type;
    }

    public static function create($base, $id, $type) {
        $path = "$base/$id-$type";
        return new PasteFile($path, $id, $type);
    }

    public static function load($file) {
        $name = basename($file);
        $parts = str_split($name, "-");
        $id = $parts[0];
        $type = $parts[1];
        return new PasteFile($file, $id, $type);
    }

    private $path;
    private $id;
    private $type;


    public function serve() {
        $type = mime_content_type($this->path);
        header("Content-Type: $type");
        echo file_get_contents($this->path);
    }

    public function write($data) {
        file_put_contents($this->path, $data);
    }

    public function move($src) {
        rename($src, $this->path);
    }

    public function delete() {
        unlink($this->path);
    }



}