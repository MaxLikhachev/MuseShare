<?php
session_start();

include "header.php";
include "subnav.php";
include "config.php";
include "album.php";
include "song.php";

$stmt = $pdo->prepare('SELECT * FROM albums WHERE album_author_id = ?');
$stmt->execute([$_SESSION['id']]);
foreach ($stmt as $row) {
    $stm = $pdo->prepare('SELECT * FROM songs WHERE album_id = ?');
    $stm->execute([$row['album_id']]);
    if($stm->rowCount()>0 && $row['is_demo']==1) {

        require('album.html');

        $stm = $pdo->prepare('SELECT song_id, song_title, song_authors  FROM songs WHERE album_id = ?');
        $stm->execute([$row['album_id']]);
        foreach ($stm as $subrow)
            require('song.html');
    }
}
echo join('',file('footer.html'));
?>