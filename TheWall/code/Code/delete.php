<?php

$id = (int) $_GET['id'];

if(empty($id)){
    echo 'Geen id!';
    exit;
}

try {

    require 'includes/functions.php';
    $connection = dbConnect();

    $parameters = [
        'id' => $id,
        'userid' => intval($_SESSION['user_id']),
    ];
    $sql = 'DELETE FROM `autos` WHERE id = :id AND `user_id` = :userid';
    $statement = $connection->prepare($sql);
    $statement->execute($parameters);

    header('Location: index.php');

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}
?>