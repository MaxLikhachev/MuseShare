<?php
session_start();
echo join('',file('nav.html'));

if (isset($_SESSION['id']))
    echo "<li class='nav-item active'>
                    <a class='nav-link active' href='profile.php'><h5>Профиль</h5></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link disabled' href='#'><h5>Подписки</h5></a>
                </li>";
else
    echo "<li class='nav-item active'>
                    <a class='nav-link' href='index.php'><h5>Войти или зарегистрироваться</h5></a>
                </li>";
require('search-form.html');