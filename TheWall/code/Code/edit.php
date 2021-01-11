<?php

$id = (int) $_GET['id'];

try {

    require 'includes/functions.php';
    $connection = dbConnect();

    $sql = 'SELECT * FROM `autos` WHERE `id` = :id AND `user_id` = :userid';

    $statement = $connection->prepare($sql);
    $userid = intval($_SESSION['user_id']);
    $parameters = [
        'id' => $id,
        'userid' => $userid,
    ];
    
    $statement->execute($parameters);
    $row = $statement->fetch();
    if(count($row) <= 1){
        header('Location: index.php'); // return to index when vehicle is not owned by logged in user
    }
} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
<title>auto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://kit.fontawesome.com/29f41dc4fb.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style/menu.css">
        <link rel="stylesheet" type="text/css" href="style/hover.css">
        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet"> 
        <link rel="shortcut icon" type="image/x-icon" href="../images/autojachtlogo.jpg">
</head>
<body>
    <div class="nav__container">
    <a href="index.php"><div class="nav__container__logo">
            <img src="images/autojachtlogo.jpg" alt="autojacht" id="logo"><h1>AutoJacht</h1>
            </div></a>
            
            
            <input type="checkbox" id="menuSwitcher" checked>
            <nav class="buttonWrapper">
            <label for="menuSwitcher" class="haal-menu"><i class="fas fa-bars"></i></label>
            <ul>
                <li>
                    <a href="index.php" >Home Page</a>
                </li>
                <li>
                    <a href="form.php" >Auto Toevoegen</a>
                </li>
                <li>
                    <a href="login.php">Log In</a>
                </li>
                <li>
                    <a href="register.php">Registreren</a>
                </li>
                <li>
                    <a href="logout.php">Log Out</a>
                </li>
            </ul>
            </nav>
        

            <div class="container" id="home">
                <label for="menuSwitcher" class="haalmenu">
                <i class="fas fa-bars"></i>
                </label> 
            </div>
        </div>
        <div class="centerbox__wrapper">
    <div class="centerbox__content" style="padding-left: 30px;">
    <h2>Bewerk je auto</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
        <p>
            <label for="merk">Merk:</label>
            <input type="text" name="merk" value="<?php echo $row['merk']?>" class="special">
        </p>
        <p>
            <label for="model">Model:</label>
            <input type="text" name="model" value="<?php echo $row['model']?>" class="special">
        </p>
        <p>
            <label for="vermogen">Vermogen:</label>
            <input type="text" name="vermogen" value="<?php echo $row['vermogen']?>" class="special">
        </p>
        <p>
            <label for="bouwjaar">Bouwjaar:</label>
            <input type="number" name="bouwjaar" value="<?php echo $row['bouwjaar']?>" class="special">
        </p>
        <p>
            <label for="carrosserie">Carrosserie:</label>
            <input type="text" name="carrosserie" value="<?php echo $row['carrosserie']?>" class="special">
        </p>
        <p>
            <label for="kilometerstand">Kilometerstand:</label>
            <input type="text" name="kilometerstand" value="<?php echo $row['kilometerstand']?>" class="special">
        </p>
        <p>
            <label for="prijs">Prijs:</label>
            <input type="text" name="prijs" value="<?php echo $row['prijs']?>" class="special">
        </p>
        <p>
            <label for="image">Afbeelding File:</label>
            <input type="file" value="<?php echo $row['merk']?>" name="image">
        </p>
        
        <button type="submit" class="buttons1">Oplaan</button>
    </form>
</div>
</div>
</body>
</html>