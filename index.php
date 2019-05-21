<?php
session_start();
include "config.php";

if (!isset($_SESSION['id']))
{
    include "header.php";
    require ('authorization.html');
    require ('footer.html');
} else require('profile.php');
?>