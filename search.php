<?php
session_start();

include "header.php";
include "subnav.php";
include "config.php";

if(isset($_GET['find']))
{
    $users_counter = 0;
    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) if (strripos($row['user_nickname'], $_GET['text']) !== false) $users_counter++;
    echo "<h6>Найдено пользователей: ".$users_counter."</h6>";

    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) {
        if (strripos($row['user_nickname'], $_GET['text']) !== false) {
            echo $row['user_nickname']."<br>";
        }
    }

    $albums_counter = 0;
    $stmt = $pdo->prepare('SELECT * FROM albums');
    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) if (strripos($row['album_title'], $_GET['text']) !== false) $albums_counter++;
    echo "<br><h6>Найдено альбомов: ".$albums_counter."</h6>";

    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) {
        if (strripos($row['album_title'], $_GET['text']) !== false) {
            echo $row['album_title']."<br>";
        }
    }

    $songs_counter = 0;
    $stmt = $pdo->prepare('SELECT * FROM songs');
    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) if (strripos($row['song_title'], $_GET['text']) !== false) $songs_counter++;
    echo "<br><h6>Найдено треков: ".$songs_counter."</h6>";

    $stmt->execute([$_GET['text']]);
    foreach ($stmt as $row) {
        if (strripos($row['song_title'], $_GET['text']) !== false) {
            echo $row['song_title']."<br>";
        }
    }
}
require('footer.html');
?>