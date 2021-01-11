<?php

    require 'includes/functions.php';
    // op true for error
    $wip = false;
    if($wip){
        exit('MySQL: ERROR 1040: Too many connections');
    };
    loginIfNeeded();
    $connection = dbConnect();
    $statement = $connection->query('SELECT * FROM `autos`');

?>



<!DOCTYPE html>
<html>
    <head>
	    <title>AutoJacht</title>
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
        <h3>Auto's te koop:</h3>
        <div class="autos__container">
        <div class="autos">
         <?php foreach ($statement as $row){ ?>

          <?php ?>
            <div class="autocover">
            <div class="auto">
            <h2><?php echo $row['merk']?> <?php echo $row['model']?></h2>
            <img src="uploads/<?php echo $row['image']?>">
            <article>
                <h3>Vermogen: <?php echo $row['vermogen']?></h3>
                <h3>Bouwjaar: <?php echo $row['bouwjaar']?></h3>
                <h3>Carrosserie: <?php echo $row['carrosserie']?></h3>
                <h3>kilometerstand: <?php echo $row['kilometerstand']?></h3>
                <h3>prijs: <?php echo $row['prijs']?></h3>
                <br><br><br><br>
                <?php if($_SESSION['user_id'] == $row['user_id']){ ?>
                <a href="edit.php?id=<?php echo $row['id'] ?>" class="buttons button--full">Bewerk je Auto</a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" class="buttons button--full">Verwijder je Auto</a>
                <?php }; ?>
            </article>
            </div>
            </div>
         <?php } ?>

        </div>
        </div>
        

    </body>
</html>