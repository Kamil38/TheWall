<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auto Toevoegen</title>
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
            <div class="nav__container__logo" href="index.php">
            <img src="images/autojachtlogo.jpg" alt="autojacht" id="logo"><br><h1>AutoJacht</h1>
            </div>
            
            
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
    <div class="centerbox__content">
    <h1>Voeg nieuwe auto toe</h1>
    <form action="process.php" method="POST" class="centerbox__form" enctype="multipart/form-data">
        <p>
            <label for="">Merk:</label>
            <input type="text" name="merk" value="" class="special">
        </p>
        <p>
            <label for="">Model:</label>
            <input type="text" value="" name="model" class="special">
        </p>
        <p>
            <label for="">Vermogen:</label>
            <input type="text" value="" name="vermogen" class="special">
        </p>
        <p>
            <label for="">Bouwjaar:</label>
            <input type="number" name="bouwjaar" value="" class="special">
        </p>
        <p>
            <label for="carrosserie">Carrosserie:</label>
            <input type="text" name="carrosserie" value="" class="special">
        </p>
        <p>
            <label for="kilometerstand">Kilometerstand:</label>
            <input type="text" name="kilometerstand" value="" class="special">
        </p>
        <p>
            <label for="prijs">Prijs:</label>
            <input type="text" name="prijs" value="<?php echo $row['prijs']?>" class="special">
        </p>
        <p>
            <label for="">Afbeelding File:</label>
            <input type="file" name="image" value="">
        </p>
        <button type="submit" class="buttons1">Opslaan</button>
    </form>
    </div>
    </div>
    

</body>
</html>