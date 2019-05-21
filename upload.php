<?php
session_start();
include "header.php";
include "subnav.php";
include "config.php";

require('upload.html');
require('footer.html');

$stmt = $pdo->prepare('SELECT * FROM albums WHERE album_author_id = ?');
$stmt->execute([$_SESSION['id']]);
foreach ($stmt as $row)
    echo "<option value='".$row['album_id']."'>".$row['album_title']."</option>";

echo "</select>
                </div>
                <button type='submit' class='col-8 px-0 btn btn-primary' name='uploadTrack'>Добавить трек</button>
            </form>
        </div>
    </div>
    ";

if (isset ($_GET['uploadAlbum']) && isset($_GET['title']) && isset($_GET['genre']) && isset($_GET['year'])) {

    $authors = "";
    if(isset($_GET['authors'])) $authors = " ".$_GET['authors'];

    $demo = 0;
    if(isset($_GET['isDemo'])) $demo++;

    $stmt = $pdo->prepare("INSERT INTO albums(album_author_id, album_title, album_authors, album_genre, album_year, is_demo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute(array($_SESSION['id'], $_GET['title'], $authors, $_GET['genre'], $_GET['year'], $demo));

    echo "<script>alert(\"Альбом <<".$_GET['title'].">> успешно добавлен!\");</script>";
}

if (isset ($_GET['uploadTrack']) && isset($_GET['title']) && isset($_GET['album'])) {

    $is_exist = false;
    $id = 0;
    $title = "";
    $track = 1;

    $authors = "";
    if(isset($_GET['authors'])) $authors = " ".$_GET['authors'];

    $stmt = $pdo->prepare('SELECT * FROM albums WHERE album_id = ?');
    $stmt->execute([$_GET['album']]);
    foreach ($stmt as $row)
    {
        $id = $row['album_id'];
        $title = $row['album_title'];
        $is_exist = true;
    }

    if($is_exist)
    {
        $stm = $pdo->prepare('SELECT * FROM songs WHERE album_id = ?');
        $stm->execute([$row['album_id']]);
        $track = $stm->rowCount();

        $stmt = $pdo->prepare("INSERT INTO songs(album_id, song_title, song_authors, song_number) VALUES (?, ?, ?, ?)");
        $stmt->execute(array($id, $_GET['title'], $authors, $track));
        echo "<script>alert(\"Трек <<".$_GET['title'].">> успешно добавлен! в альбом <<".$title.">>\");</script>";
    }
    else echo "<script>alert(\"Альбом <<".$_GET['album'].">> не существует!\");</script>";

}
?>