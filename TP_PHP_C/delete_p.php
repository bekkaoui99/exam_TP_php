<?php


require('db.php');


$sql = 'DELETE FROM personnel WHERE numero = :id';
$delete_f = $connection->prepare($sql);

$delete_f->bindValue(':id', $_GET['id']);

$delete_f->execute();


if ($delete_f->rowCount() > 0) {
    header('location:showData.php?deleted=data is deleted');
} else {
    header('location:showData.php?not_seleted=data is not deleted');
}
