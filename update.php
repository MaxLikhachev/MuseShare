<?php
session_start();
include "config.php";

if (isset($_GET['album_id'])) {
    $album_id = $album_title = $album_authors = $album_genre = $album_year = NULL;
    $stmt = $pdo->prepare("SELECT * FROM albums WHERE album_id = ?");
    $stmt->execute([$_GET['album_id']]);
    foreach ($stmt as $row) {
        $album_id = $row['album_id'];
        $album_title = $row['album_title'];
        $album_authors = $row['album_authors'];
        $album_genre = $row['album_genre'];
        $album_year = $row['album_year'];
    }
    include "header.php";
    require_once ('update-album-form.html');
    require_once ('footer.html');
}

if (isset($_GET['saveAlbum'])) {
    $authors = "";
    if(isset($_GET['authors'])) $authors = " ".$_GET['authors'];

    $stmt = $pdo->prepare("UPDATE albums SET album_title = ?, album_authors = ?, album_genre = ?, album_year = ? WHERE album_id = ?");
    $stmt->execute(array($_GET['title'], $authors, $_GET['genre'], $_GET['year'], $_GET['id']));

    //echo "<script>alert(\"Альбом <<".$_GET['title'].">> успешно обновлен!\");</script>";
    require_once ('index.php');
}

if (isset($_GET['removeAlbum'])) {
    $stmt = $pdo->prepare("DELETE FROM albums WHERE album_id = ?");
    $stmt->execute([$_GET['id']]);

    //echo "<script>alert(\"Альбом <<".$_GET['title'].">> успешно удален!\");</script>";
    require_once ('index.php');
}

if (isset($_GET['song_id'])) {
    $song_id = $song_title = $song_authors = NULL;
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['song_id']]);
    foreach ($stmt as $row) {
        $song_id = $row['song_id'];
        $song_title = $row['song_title'];
        $song_authors = $row['song_authors'];
    }
    include "header.php";
    require_once ('update-song-form.html');
    require_once ('footer.html');
}

if (isset($_GET['saveSong'])) {
    $authors = "";
    if(isset($_GET['authors'])) $authors = " ".$_GET['authors'];

    $stmt = $pdo->prepare("UPDATE songs SET song_title = ?, song_authors = ? WHERE song_id = ?");
    $stmt->execute(array($_GET['title'], $authors, $_GET['id']));

    //echo "<script>alert(\"Трек <<".$_GET['title'].">> успешно обновлен!\");</script>";
    require_once ('index.php');
}

if (isset($_GET['removeSong'])) {
    $stmt = $pdo->prepare("DELETE FROM songs WHERE song_id = ?");
    $stmt->execute([$_GET['id']]);
    require_once ('index.php');
}
?>