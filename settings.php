<?php
session_start();
include 'password.php';
include 'config.php';
include 'header.php';

if(isset($_SESSION['id'])) {
    include 'subnav.php';
    require('settings.html');
} else require('authorization.html');

require('footer.html');

if(isset ($_GET['sendEmail']) && !empty($_GET['email']) && !empty($_GET['confirmedEmail'])) {
    $email = $_GET['email'];
    $confirmed_email = $_GET['confirmedEmail'];
    $id = $_SESSION['id'];

    if($email == $confirmed_email) {
        $stmt = $pdo->prepare('UPDATE users SET user_email = ? WHERE user_id = ?');
        $stmt->execute(array($email, $id));

        echo "<script>alert(\"E-mail успешно изменен!\");</script>";
    }
}
else require_once ("settings.php");

if(isset ($_GET['sendPassword'])&& !empty($_GET['lastPassword']) && !empty($_GET['newPassword']) && !empty($_GET['confirmedPassword'])) {
    $last_password = $_GET['lastPassword'];
    $new_password = $_GET['newPassword'];
    $confirmed_password = $_GET['confirmedPassword'];
    $current_password = $_SESSION['password'];
    $id = $_SESSION['id'];

    if($current_password == $last_password) {
        if($new_password == $confirmed_password) {
            $stmt = $pdo->prepare('UPDATE users SET user_password = ? WHERE user_id = ?');
            $password = new password($new_password);
            $stmt->execute(array($password->value, $id));
            $_SESSION['password'] = $password->value;

            echo "<script>alert(\"Пароль успешно изменен!\");</script>";
        } else echo "<script>alert(\"Новый пароль не подтвержден!\");</script>";
    } else echo "<script>alert(\"Старый пароль введен неверно!\");</script>";
}
else require_once ("settings.php");

if(isset ($_GET['exit'])) {
    session_destroy();
}
?>