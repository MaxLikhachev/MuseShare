<?php
session_start();
echo "<div class='row no-gutters'>
    <div class='col'>
        <ul class='nav'>
            <li class='nav-item'>
                <a class='nav-link' href='profile.php'>Альбомы</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='demo.php'>Черновики</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='upload.php'>Добавить</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='settings.php'>Настройки</a>
            </li>
        </ul>
    </div>

    <div class='col'>
        <ul class='nav justify-content-end'>
            <li class='nav-item'>
                <a class='nav-link' href='profile.php'>
";

echo '<h5>'.$_SESSION['username'].'</h5>';

echo "</a></li></ul></div></div></div>";
?>

