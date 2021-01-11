<?php
session_start();
$merk = $_POST['merk'];
$model = $_POST['model'];
$vermogen = $_POST['vermogen'];
$bouwjaar = $_POST['bouwjaar'];
$carrosserie = $_POST['carrosserie'];
$kilometerstand = $_POST['kilometerstand'];
$prijs = $_POST['prijs'];

$errors = [];

if (!isset($_FILES['image'])) {
    echo 'Geen bestand geupload!';
    exit;
}

$file_tmp = $_FILES['image']['tmp_name'];

$file_error = $_FILES['image']['error'];
switch ($file_error) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        $errors[] = 'Er is geen bestand geupload';
        break;
    case UPLOAD_ERR_CANT_WRITE:
        $errors[] = 'Kan niet schrijven naar disk';
        break;
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        $errors[] = 'Dit bestand is te groot, pas php.ini aan';
        break;
    default:
        $errors[] = 'Onbekeden fout';
}


$valid_image_types = [
    1 => 'gif',
    2 => 'jpg',
    3 => 'png'
];
$image_type        = exif_imagetype($file_tmp);
if ($image_type !== false) {
    // Juiste extensie opzoeken, die gaan we zo gebruiken bij het maken van de nieuwe bestandsnaam
    $file_extension = $valid_image_types[$image_type];
} else {
    $errors[] = 'Dit is geen afbeelding!';
}

if (count($errors) == 0) {
    $new_filename = sha1_file($file_tmp) . '.' . $file_extension;  // 398572395739b29852739735jgfhsjgfd.png
    $final_filename = 'uploads/' . $new_filename;
    move_uploaded_file($file_tmp, $final_filename);


    $parameters = [
        'merk' => $merk,
        'model' => $model,
        'vermogen' => $vermogen,
        'bouwjaar' => $bouwjaar,
        'carrosserie' => $carrosserie,
        'kilometerstand' => $kilometerstand,
        'prijs' => $prijs,
        'image' => $new_filename,
        'userid' => intval($_SESSION['user_id']),
    ];
    require 'includes/functions.php';
    $connection = dbConnect();

    try {
        $query = 'INSERT INTO `autos` (`merk`, `model`, `vermogen`, `bouwjaar`, `carrosserie`, `kilometerstand`, `prijs`, `user_id`, `image`) 
        VALUES (:merk, :model, :vermogen, :bouwjaar, :carrosserie, :kilometerstand, :prijs, :userid, :image)';
        $statement = $connection->prepare($query);

        $statement->execute($parameters);
        header('location: index.php');
    }catch (PDOException $e) {
        echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    }

}else{
    echo "Er zijn fouten!";

    foreach($errors as $error){
        echo $error . '<br />';
    }
}
