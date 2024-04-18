<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="shortcut icon" type="image/icon" href="image/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/789005376d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
   

</head>
<body>
<?php include "includes/header.php"; ?>

    <div class="container">
    <div class="inform">
        <div class="tekst">
        <h3>Szczęść Boże! Witaj!</h3>

          </div>
        <br>
        <div class="tekst">
            <p>Zarejestruj się! </p>
        </div>
        <br>
        <div class="tekst">
            <p>Możesz pobierać raporty stypendystów zapisanych na obozy fundacyjne, zarówno z jednej diecezji jak i ze wszystkich.</p>
        </div>
        <br>
        <div class="tekst">
            <p>Kontakt:</p>
            <p>Email: serwis@dzielo.pl </p>
            <p>Telefon: 784-000-111</p>
        </div>

    </div>

 <div class="login">
 <div class="login-container">

<img class="logo" src="image/logo.jpg" alt="logo Fundacji" />
    <h2>Rejestracja</h2>
    <form action="zarejestruj.php" method="POST" id="form">

    <div class="input-group-register">
        <div class="input-group">
            <label for="imie">Imię</label>
            <input type="text" id="imie" name="imie">
            <span class="error">Proszę uzupełnić to pole</span>
        </div>
        <div class="input-group">
            <label for="nazwisko">Nazwisko</label>
            <input type="text" id="nazwisko" name="nazwisko">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="diecezja">Diecezja</label>
            <input type="text" id="diecezja" name="diecezja">
        </div>
        <br>
        <div class="input-group">
            <label for="login">Login</label>
            <input type="text" id="login" name="login">
        </div>
        <div class="input-group">
            <label for="haslo">Hasło</label>
            <input type="password" id="haslo" name="haslo">
        </div>
      
        <label for="regulamin">
        <input type="checkbox" id="regulamin" name="regulamin">
            Akceptuję regulamin</label>

    </div>
        <br>
   
           <button type="submit" class="btn" id="send-button">Zarejestruj się</button>
    </form>

</div>
<div class="login-container">
            <h4>Masz już konto? Wróć do strony logowania</h4>
            <a href="index.php">Logowanie</a><br>
        </div>
 </div>
 
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>

