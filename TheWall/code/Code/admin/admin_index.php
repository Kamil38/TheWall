<?php 
    include '../includes/functions.php';
    loginIfNeeded();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ingelogd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://kit.fontawesome.com/29f41dc4fb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style/menu.css">
    <link rel="stylesheet" type="text/css" href="../style/hover.css">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" type="image/x-icon" href="../images/autojachtlogo.jpg">
</head>
<body>
<div class="nav__container">
            <a href="index.php"><div class="nav__container__logo">
            <img src="../images/autojachtlogo.jpg" alt="autojacht" id="logo"><h1>AutoJacht</h1>
            </div></a>
            
            
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
    <h2>Welkom <?php echo $_SESSION['voornaam'] ?></h2>
    <p>Je gebruikers ID = <?php echo $_SESSION['user_id'] ?></p>
    <p><a href="../logout.php" class="buttons1">Log out</a></p>
    <p><a href="../index.php" class="buttons1">Home Page</a></p>
</div></div>

</body>
</html>