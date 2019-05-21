<?php
session_start();
include 'password.php';
include 'config.php';

if(isset ($_GET['send']) && !empty($_GET['email']) && !empty($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
    //echo $email." :  ".$password;

    //find user with email;
    $hashedPassword = "";
    $id = -1;
    $username = "";
    $rate = 0;

    $stmt = $pdo->prepare('SELECT user_id, user_nickname, user_hashed_password, user_rate FROM users WHERE user_email = ?');
    $stmt->execute([$_GET['email']]);
    foreach ($stmt as $row)
    {
        $hashedPassword = $row['user_hashed_password'];
        $id = $row['user_id'];
        $username = $row['user_nickname'];
        $rate = $row['user_rate'];
    }

    if (crypt($password, $hashedPassword) == $hashedPassword && $id != -1)
    {
        //echo  "<script>alert(\"Вы вошли на сайт\");</script>";
        $password = $hashedPassword;

        $_SESSION['id'] = $id;
        $_SESSION['admin_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['rate'] = $rate;

        //echo $_SESSION['username'];
        require_once ("profile.php");
        //
    }
    else
    {
        echo  "<script>alert(\"Такого пользователя не существует!\");</script>";
        require_once ("index.php");
    }
}
else require_once ("authorization.html");
?>