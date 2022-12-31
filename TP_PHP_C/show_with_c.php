<?php

session_start();
require('db.php');


$sql = 'select * from personnel where YEAR(date) > "2020" ';
$all = $connection->prepare($sql);
$all->execute();

$data = $all->fetchAll(PDO::FETCH_ASSOC);

function displayArrayAsTable($array)
{
    echo '<div class="container mt-5"> <table class="table table-bordered">';
    foreach ($array as $row) {
        echo '<tr>';
        foreach ($row as $key => $value) {

            echo '<td>' . $key . '</td>';
        }
        echo '<td>ACTION</td>';
        echo '<td>ACTION</td>';

        break;
        echo '</tr>';
    }



    foreach ($array as $data) {
        echo '<tr>';

        $numero = $data['numero'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $adresse = $data['adresse'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $date_r = $data['date'];
        $service = $data['numero_service'];


        echo '<td>' . $numero . '</td>';
        echo '<td>' . $nom . '</td>';
        echo '<td>' . $prenom . '</td>';
        echo '<td>' . $adresse . '</td>';
        echo '<td>' . $email . '</td>';
        echo '<td>' . $mobile . '</td>';
        echo '<td>' . $date_r . '</td>';
        echo '<td>' . $service . '</td>';

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo "<td> <a  class='btn btn-outline-primary update-button' href='update.php?id=" . $numero . "'>update</a> </td>";
            echo "<td> <a  class='btn btn-outline-danger delete-button' href='delete_p.php?id=" . $numero . "'>delete</a> </td>";
        }
        echo '</tr>';
    }


    echo '</table></div>';
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

    <?php
    require('navBar.php');
    displayArrayAsTable($data);
    ?>
</body>

</html>