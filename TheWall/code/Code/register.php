<?php

    require 'includes/functions.php';
    $connection = dbConnect();

    try {
        $sql = "SELECT voornaam, achternaam, email, wachtwoord, id FROM gerbuikers ORDER BY id";
        $statement = $connection->query($sql);
    } 
    catch (PDOException $e){
        echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registreren</title>
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
            <div class="nav__container__logo">
            <img src="images/autojachtlogo.jpg" alt="autojacht" id="logo"><h1>Welkom bij de AutoJacht</h1>
            </div>
            
            
            <input type="checkbox" id="menuSwitcher" checked>
            <nav class="buttonWrapper">
            <label for="menuSwitcher" class="haal-menu"><i class="fas fa-bars"></i></label>
            <ul>
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
    <h1>Registreren</h1>
    <form action="save_user.php" class="centerbox__form" method="POST">
        <p>
            <label for="">Voornaam:</label>
            <input type="text" name="voornaam" value="" class="special">
        </p>
        <p>
            <label for="">Achternaam:</label>
            <input type="text" value="" name="achternaam" class="special">
        </p>
        <p>
            <label for="">Email:</label>
            <input type="text" value="" name="email" class="special">
        </p>
        <p>
            <label for="">Wachtwoord:</label>
            <input type="password" name="wachtwoord" value="" class="special">
        </p>
        <button type="submit" class="buttons1">Registreren</button>
    </form>
</div></div>
</body>
</html>