<?php
session_start();



if ((isset($_POST['login'])) && (isset($_POST['haslo'])))
{
    $_SESSION['zalogowany'] = $_POST['login'];
    header('Location: panel_uzytkownika.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
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

        <p>Jesteś na stronie dla Koordynatorów Diecezjalnych. Po zalogowaniu się na swoje konto możesz pobrać z bazy danych wymagane raporty.</p>
        </div>
        <div class="tekst">
            <p>Załóż konto, aby mieć dostęp do tych danych.</p>
        </div>
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

            <form action="zaloguj.php" method="POST">
                <div class="input-group">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" required>

                  </div>
                <div class="input-group">
                    <label for="haslo">Hasło</label>
                    <input type="password" id="haslo" name="haslo" required>
                </div>

                 <br>
                <button type="submit" class="btn">Zaloguj się</button>
            </form>
                 <br>
                 <?php
	            if(isset($_SESSION['blad']))	{
                   echo $_SESSION['blad'];
                 }
                 ?>
            </div>

   
          <div class="login-container">
            <h4>Nie masz jeszcze konta? Zarejestruj się</h4>
            <a href="rejestracja.php">Rejestracja</a><br>

          </div>

        </div>
 

        

    </div>
    <?php include "includes/footer.php"; ?>


</body>

</html>