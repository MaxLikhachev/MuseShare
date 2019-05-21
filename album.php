<?php


class album
{
    public $id, $title, $author, $genre, $rate, $year, $is_demo;
    public $songs = array(), $tracks = 0;
    function __construct($_id, $_title, $_author, $_genre, $_year, $_rate, $_is_demo) {
        $id = $_id;
        $title = $_title;
        $author = $_author;
        $genre = $_genre;
        $rate = $_rate;
        $is_demo = $_is_demo;
        $year = $_year;
    }

    public function __get($attr)
    {
        if (isset($this->$attr))
            return $this->$attr;
        else
            user_error("Атрибут ".$attr." не найден!");
    }
}