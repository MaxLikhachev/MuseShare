<?php
session_start();
include "config.php";
if(isset($_GET['play'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['play']]);
    foreach ($stmt as $row) {
        $_SESSION['active-song-details'] = $row['song_title']." - ".$_SESSION['username'];
        $_SESSION['active-song-link'] = $row['song_link'];

        $stm = $pdo->prepare("UPDATE songs SET song_plays = ? WHERE song_id = ?");
        $stm->execute(array($row['song_plays']+1,$_GET['play']));
    }
    require_once ('index.php');
} else require_once ('index.php');

if(isset($_GET['rate_fire'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['rate_fire']]);

    $rate = 0;
    foreach ($stmt as $row)
        $rate = $row['song_rate'];

    $rate+=100000000;
    $stm = $pdo->prepare("UPDATE songs SET song_rate = ? WHERE song_id = ?");
    $stm->execute(array($rate,$_GET['rate_fire']));
    require_once ('index.php');
} else require_once ('index.php');

if(isset($_GET['rate_idea'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['rate_idea']]);

    $rate = 0;
    foreach ($stmt as $row)
        $rate = $row['rate_idea'];

    $rate+=1000000;
    $stm = $pdo->prepare("UPDATE songs SET song_rate = ? WHERE song_id = ?");
    $stm->execute(array($rate,$_GET['rate_idea']));
    require_once ('index.php');
} else require_once ('index.php');

if(isset($_GET['rate_melody'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['rate_melody']]);

    $rate = 0;
    foreach ($stmt as $row)
        $rate = $row['rate_melody'];

    $rate+=10000;
    $stm = $pdo->prepare("UPDATE songs SET song_rate = ? WHERE song_id = ?");
    $stm->execute(array($rate,$_GET['rate_melody']));
    require_once ('index.php');
} else require_once ('index.php');

if(isset($_GET['$rate_record'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['rate_record']]);

    $rate = 0;
    foreach ($stmt as $row)
        $rate = $row['song_rate'];

    $rate+=100;
    $stm = $pdo->prepare("UPDATE songs SET song_rate = ? WHERE song_id = ?");
    $stm->execute(array($rate,$_GET['rate_record']));
    require_once ('index.php');
} else require_once ('index.php');


if(isset($_GET['rate_mix'])) {
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['rate_mix']]);

    $rate = 0;
    foreach ($stmt as $row)
        $rate = $row['song_rate'];

    $rate+=1;
    $stm = $pdo->prepare("UPDATE songs SET song_rate = ? WHERE song_id = ?");
    $stm->execute(array($rate,$_GET['rate_mix']));
    require_once ('index.php');
} else require_once ('index.php');
?>
