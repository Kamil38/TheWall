<?php 
require 'includes/functions.php';
$id = (int)$_POST['id'];
$merk = $_POST['merk'];
$image = $_POST['image'];
$model = $_POST['model'];
$vermogen = $_POST['vermogen'];
$bouwjaar = $_POST['bouwjaar'];
$carrosserie = $_POST['carrosserie'];
$kilometerstand = $_POST['kilometerstand'];
$prijs = $_POST['prijs'];
$userid = $_SESSION['user_id'];

try {

    $connection = dbConnect();

    $sql = 'UPDATE `autos` SET
    `merk` = :merk,
    `image` = :image,
    `model` = :model,
    `vermogen` = :vermogen,
    `bouwjaar` = :bouwjaar,
    `carrosserie` = :carrosserie,
    `kilometerstand` = :kilometerstand,
    `prijs` = :prijs
    
    WHERE `id` = :id AND `user_id` = :userid';

    $statement = $connection->prepare($sql);

    $data = [
        'merk' => $merk,
        'image' => $image,
        'model' => $model,
        'vermogen' => $vermogen,
        'bouwjaar' => $bouwjaar,
        'carrosserie' => $carrosserie,
        'kilometerstand' => $kilometerstand,
        'prijs' => $prijs,
        'id' => $id,
        'userid' => $userid,
    ];


    $statement->execute($data);

    header('Location: index.php');

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' .$e->getFile();
    exit;
}
?>