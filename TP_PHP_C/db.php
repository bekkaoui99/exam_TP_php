<?php

try {
    $dsn = 'mysql:host=localhost;dbname=GestionService';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}



// function displayArrayAsTable($array)
// {
//     echo '<div class="container mt-5"> <table class="table table-bordered">';
//     foreach ($array as $row) {
//         echo '<tr>';
//         foreach ($row as $key => $value) {

//             echo '<td>' . $key . '</td>';
//         }
//         break;
//         echo '</tr>';
//     }

//     foreach ($array as $row) {
//         echo '<tr>';
//         foreach ($row as $key => $value) {

//             echo '<td>' . $value . '</td>';
//         }
//     }
//     echo '</tr>';
//     echo '</table></div>';
// }