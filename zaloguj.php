<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
 
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
<<<<<<< HEAD
		if ($rezultat = $polaczenie->query(
		sprintf("SELECT * FROM koordynatorzy WHERE login='%s' AND haslo='%s'",
=======
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM koordynatorzy WHERE user='%s' AND haslo='%s'",
>>>>>>> df83254a97380b5030ef9b98e95a709c3c37b857
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				$_SESSION['drewno'] = $wiersz['drewno'];
				$_SESSION['kamien'] = $wiersz['kamien'];
				$_SESSION['zboze'] = $wiersz['zboze'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['dnipremium'] = $wiersz['dnipremium'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: panel_uzytkownika.php');
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red; font-size:16px" >Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>