<?php
session_start();
include 'password.php';
include 'config.php';

if(isset ($_GET['send']) && !empty($_GET['email']) && !empty($_GET['nickname']) && !empty($_GET['password'])) {
    $email = $_GET['email'];
    $username = $_GET['nickname'];
    $password = $_GET['password'];
    $confirmedpassword = $_GET['confirmedpassword'];
    //echo $nickname ." ". $email." : ".$password ." | ".$confirmedpassword;

    if($password == $confirmedpassword)
    {
        echo "\n".'Password confirmed'."\n";
        //find user with email;
        $is_exist = false;
        $id = 0;

        $stmt = $pdo->prepare('SELECT user_id FROM users WHERE user_email = ?');
        $stmt->execute([$_GET['email']]);
        foreach ($stmt as $row)
        if ($email == $row['user_email'])
            $is_exist = true;

        if (!$is_exist)
        {
            $pass = new password($password);
            $password = $pass->value;
            $stmt = $pdo->prepare("INSERT INTO users(user_email, user_hashed_password, user_nickname) VALUES (?, ?, ?)");
            $stmt->execute(array($email, $pass->value, $username));

            $stmt = $pdo->prepare('SELECT user_id FROM users WHERE user_email = ?');
            $stmt->execute([$_GET['email']]);
            foreach ($stmt as $row)
            {
                $id = $row['user_id'];
            }


            $_SESSION['id'] = $id;
            $_SESSION['admin_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['rate'] = 0;

            //require_once ("album.html");
            include "settings.php";
        }
        else {
            echo "<script>alert(\"Пользователь с таким e-mail уже существует!\");</script>";
            //require_once("authorization.html");
            require_once ("index.php");
        }

    }
    else {
        echo  "<script>alert(\"Пароли не совпадают!\");</script>";
        //require "index.php";
        require_once ("index.php");
    }
}
else require_once ("index.php");
?>