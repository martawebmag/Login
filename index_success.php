<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="shortcut icon" type="image/icon" href="image/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include "includes/header.php"; ?>

    <div class="container">
 
        <div class="login">
            <img class="logo" src="image/logo.jpg" alt="logo Fundacji" />
           
            <div class="comment2">Zarejestrowano użytkownika!</div>
            <br>
            <a href="index.php">Zaloguj się</a><br>

        </div>



    </div>

    <?php include "includes/footer.php"; ?>
</body>

</html>