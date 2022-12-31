<?php

session_start();
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['login']) and isset($_POST['password'])) {

        $login = $_POST['login'];
        // Validate the password
        if (strlen($_POST['password']) < 8) {
            // Display an error message if the password is too short
            $error_message = "Password must be at least 8 characters long.";
            $password = "";
        } else {
            $password = $_POST['password'];
        }
    }

    if (!empty($login) and !empty($password)) {


        $sql = "SELECT * FROM admin where login = :login and password = :password";

        $getUser = $connection->prepare($sql);
        $getUser->bindValue(':login', $login);
        $getUser->bindValue(':password', $password);
        // Execute the statement
        $getUser->execute();
        $data = $getUser->fetchAll(PDO::FETCH_ASSOC);

        if (empty($data)) {
            header('location:erreur.php?erreur=you rite the bad data');
            $_SESSION['logged_in'] = false;
        } else {

            $_SESSION['logged_in'] = true;
        }
    } else {
        header('location:index.php?erreur=you shoud to write the good email and password');
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require('navBar.php'); ?>

    <?php
    if (isset($_GET['erreur'])) {
        echo '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>warning</strong> ' . $_GET['erreur'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
    ?>


    <div class="container mt-5 col-6">

        <div class="">

            <?php if (isset($_GET["msg"])) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $_GET["msg"];
                echo '</div>';
            } ?>

            <form class="form-signin" action="index.php" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">login</label>
                <input type="text" id="inputEmail" name="login" class="form-control mt-3 mb-2" placeholder="Email address">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control mb-2" placeholder="Password">
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>

</body>

</html>