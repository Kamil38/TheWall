<?php
    require 'includes/functions.php';
    $connection = dbConnect();

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $wachtwoord_confirm = $_POST['wachtwoord_confirm'];

        if(empty($email)){
            $errors['email'] = 'E-mail adres niet ingevuld';
        }

        if(empty($wachtwoord)){
            $errors['wachtwoord'] = 'Wachtwoord niet ingevuld';
        }

        if(empty($wachtwoord_confirm)){
            $errors['wachtwoord_confirm'] = 'Wachtwoord bevestiging niet ingevuld';
        }

        if(count($errors) === 0){
            
            if($wachtwoord !== $wachtwoord_confirm){
                $errors['wachtwoord_zelfde'] = 'De wachtwoorden zijn niet gelijk';
            }

        }

        if(count($errors) === 0){
            
            $connection = dbConnect();

            $sql = 'SELECT * FROM `gerbuikers` WHERE `email` = :email';
            $statement = $connection->prepare($sql);

            $params = [
                'email' => $email
            ];

            $statement->execute($params);

            if($statement->rowCount() === 1){
                $gebruiker = $statement->fetch();
                
                if(password_verify($wachtwoord, $gebruiker['wachtwoord'])){

                    $_SESSION['user_id'] = $gebruiker['id'];
                    $_SESSION['voornaam'] = $gebruiker['voornaam'];

                    header('Location: admin/admin_index.php');
                    exit();

                }else{
                    $errors['wachtwoord_check'] = 'Wachtwoord is incorrect';
                }

            }
            

        }
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
    <h2>Inloggen</h2>

    <?php foreach($errors as $error):?>
    <?php echo $error?><br/>
    <?php endforeach;?>
    <form action="login.php" method="POST" class="login-form centerbox__form">
        <p>
            <label for="">Email</label>
            <input type="text" name="email" class="special">
        </p>
        <p>
            <label for="">Wachtwoord</label>
            <input type="password" name="wachtwoord" class="special">
        </p>
        <p>
            <label for="">Wachtwoord check</label>
            <input type="password" name="wachtwoord_confirm" class="special">
        </p>

        <button type="submit" class="buttons1">Inloggen</button>
        <p><a href="register.php" class="buttons1">Registreren</a></p>

    </form>
</div>
    </div>

</body>
</html>