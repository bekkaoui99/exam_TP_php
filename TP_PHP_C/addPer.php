<?php


session_start();
require('db.php');
$sql_s = "SELECT nom_service , numero_service FROM service";
$all_s = $connection->prepare($sql_s);
$all_s->execute();

$data_s = $all_s->fetchAll(PDO::FETCH_ASSOC);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $service = $_POST['service'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $mobile = $_POST['mobil'];
    $date = $_POST['date'];



    if (!empty($nom) and !empty($prenom) and !empty($adresse) and !empty($email)) {

        $sql_f = "INSERT INTO personnel (nom, prenom, adresse, email, mobile, date, numero_service)
         VALUES (:nom , :prenom , :adresse , :email , :mobile , :date , :numero_service)";


        // Prepare the statement
        $insertPre = $connection->prepare($sql_f);

        // Bind the values to the placeholders
        $insertPre->bindValue(':nom', $nom);
        $insertPre->bindValue(':prenom', $prenom);
        $insertPre->bindValue(':adresse', $adresse);
        $insertPre->bindValue(':email', $email);
        $insertPre->bindValue(':mobile', $mobile);
        $insertPre->bindValue(':date', $date);
        $insertPre->bindValue(':numero_service', $service);

        // Execute the statement
        $insertPre->execute();

        if ($insertPre->rowCount() > 0) {
            print_r($insertPre);
            header('location:showData.php?valid=data is added');
        } else {
            header('location:erreur.php?erreur=erreur');
        }
    } else {
        header('location:addPer.php?erreur=you need to write the corect data');
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


    <div class="container col-6 mt-5">

        <form action="addPer.php" method="post">
            <div class="form-group">
                <label for="idGenre">service</label>
                <select class="form-control" id="idGenre" name="service">
                    <?php
                    foreach ($data_s as $row) {
                        $id = $row['numero_service'];
                        $service = $row['nom_service'];
                        echo "<option value='$id'>$service</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="titre">nom</label>
                <input type="text" class="form-control" id="titre" name="nom" placeholder="Enter Titre">
            </div>
            <div class="form-group">
                <label for="annee">prenom</label>
                <input type="text" class="form-control" id="annee" name="prenom" placeholder="Enter Annee">
            </div>
            <div class="form-group">
                <label for="duré">adresse</label>
                <input type="text" class="form-control" id="duré" name="adresse" placeholder="Enter Duré">
            </div>
            <div class="form-group">
                <label for="resume">email</label>
                <input type="email" class="form-control" id="resume" name="email">
            </div>
            <div class="form-group">
                <label for="resume">mobil</label>
                <input type="text" class="form-control" id="resume" name="mobil">
            </div>

            <div class="form-group">
                <label for="resume">date</label>
                <input type="date" class="form-control" id="resume" name="date">
            </div>




            <!-- <div class="form-group">
        <label for="createdDate">Created Date</label>
        <input type="date" class="form-control" id="createdDate" name="createdDate">
    </div>
    <div class="form-group">
        <label for="lastModifiedDate">Last Modified Date</label>
        <input type="date" class="form-control" id="lastModifiedDate" name="lastModifiedDate">
    </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>




</body>

</html>