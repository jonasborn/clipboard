<?php


class IdGenerator
{

    public static function randomString($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private $dir;

    /**
     * Id constructor.
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function create()
    {
        $index = array_diff(scandir($this->dir), array('.', '..'));
        $length = 3;
        $round = 30;
        $id = IdGenerator::randomString($length);
        while (in_array($id, $index)) {
            $id = IdGenerator::randomString($length);
            $round++;
            $length = round($round / 10);
        }
        return $id;
    }
}