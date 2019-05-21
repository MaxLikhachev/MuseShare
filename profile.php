<?php
session_start();

include "header.php";
include "subnav.php";
include "config.php";

$stmt = $pdo->prepare('SELECT * FROM albums WHERE album_author_id = ?');
$stmt->execute([$_SESSION['id']]);
foreach ($stmt as $row) {
    $stm = $pdo->prepare('SELECT * FROM songs WHERE album_id = ?');
    $stm->execute([$row['album_id']]);
    if($stm->rowCount()>0 && $row['is_demo']==0) {

        require('album.html');

        $stm = $pdo->prepare('SELECT * FROM songs WHERE album_id = ?');
        $stm->execute([$row['album_id']]);
        foreach ($stm as $subrow) {
            $rate = $subrow['song_rate'];
            $rate_mix = $rate%100;
            $rate/=100;
            $rate_record = $rate%100;
            $rate/=100;
            $rate_melody = $rate%100;
            $rate/=100;
            $rate_idea = $rate%100;
            $rate/=100;
            $rate_fire = $rate%100;
            $rate/=100;
            require('song.html');
        }
    }
    //require ('update-album-form.html');
}
require('footer.html');
?>