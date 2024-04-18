<?php
require_once 'connect.php';
session_start();


if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;

        	//Sprawdź poprawność imienia
		$imie = $_POST['imie'];
		
		//Sprawdzenie długości imienia
		if ((strlen($imie)<3) || (strlen($imie)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']="Login musi posiadać od 3 do 20 znaków!";
		}

        	//Sprawdź poprawność nazwiska
		$nazwisko = $_POST['nazwisko'];
		
		//Sprawdzenie długości nazwiska
		if ((strlen($nazwisko)<2) || (strlen($nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Login musi posiadać od 3 do 20 znaków!";
		}
		
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";

        }
              	//Sprawdź poprawność diecezji
        $diecezja = $_POST['diecezja'];
            	//Sprawdzenie długości diecezji
		if ((strlen($diecezja)<2) || (strlen($diecezja)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_diecezja']="Diecezja musi posiadać więcej niż 3 znaki!";
		}
		

        		//Sprawdź poprawność loginu
		$login = $_POST['login'];
		
		//Sprawdzenie długości loginu
		if ((strlen($login)<3) || (strlen($login)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($login)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		//Sprawdź poprawność hasła
		$haslo = $_POST['haslo'];

		
		if ((strlen($haslo)<8) || (strlen($haslo)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
	

		$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		//Bot or not? Oto jest pytanie!
		// $sekret = "PODAJ WŁASNY SEKRET!";
		
		// $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		// $odpowiedz = json_decode($sprawdz);
		
		// if ($odpowiedz->success==false)
		// {
		// 	$wszystko_OK=false;
		// 	$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		// }		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr-imie'] = $imie;
        $_SESSION['fr-nazwisko'] = $nazwisko;
		$_SESSION['fr_email'] = $email;
        $_SESSION['fr_diecezja'] = $diecezja;
        $_SESSION['fr_login'] = $login;
		$_SESSION['fr_haslo'] = $haslo;
		
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
            $conn = new mysqli($host, $db_user, $db_password, $db_name);
			if ($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $conn->query("SELECT id FROM koordynatorzy WHERE Email='$email'");
				
				if (!$rezultat) throw new Exception($conn->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy login jest już zarezerwowany?
				$rezultat = $conn->query("SELECT id FROM koordynatorzy WHERE user='$login'");
				
				if (!$rezultat) throw new Exception($conn->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_login']="Istnieje już użytkownik o takim loginie! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($conn->query("INSERT INTO koordynatorzy (Imię, Nazwisko, Email, Diecezja, user, pass) 
                    VALUES ('$imie', '$nazwisko', '$email', '$diecezja', '$login', '$haslo')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: index_success.php');
					}
					else
					{
						throw new Exception($conn->error);
					}
					
				}
				
				$conn->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	
    }



?>