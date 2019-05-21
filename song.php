<?php


class song
{
    private $id, $title, $plays, $author, $time, $rate;
    function __construct($_id, $_title, $_plays, $_author, $_time, $_rate) {
        $id = $_id;
        $title = $_title;
        $plays = $_plays;
        $author = $_author;
        $time = $_time;
        $rate = $_rate;
    }

    public function __get($attr)
    {
        if (isset($this->$attr))
            return $this->$attr;
        else
            user_error("Атрибут ".$attr." не найден!");
    }
}
?>