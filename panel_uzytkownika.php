<?php
session_start();
if (!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
    <link rel="shortcut icon" type="image/icon" href="image/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/789005376d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include "includes/header.php"; ?>
    
        <div class="container">


        <div class="login">
            <img class="logo" src="image/logo.jpg" alt="logo Fundacji" />

                <div class="input-group">
                    <?php
                	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="wyloguj.php">Wyloguj się!</a> ]</p>';

                     ?>
                </div>
                <br>

                <div class="input-group">
                     <label for="text">Zapisy na obozy wakacyjne </label> 
                     <ul>
                        <li>Stypendyści zapisani na obóz letni</li>   <a href="#">Pobierz raport</a> 
                        <li>Stypendyści - usprawiedliwienia</li>  <a href="#">Pobierz raport</a> 
                        <li>Wolontariusze</li>  <a href="#">Pobierz raport</a> 
                        <li>Duplikaty</li>  <a href="#">Pobierz raport</a> 
                     </ul>
                    
                </div>

        </div>

      

    </div>

    <?php include "includes/footer.php"; ?>
</body>

</html>