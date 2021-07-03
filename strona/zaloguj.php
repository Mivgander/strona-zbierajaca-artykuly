<?php

	session_start();
	
	if(!isset($_POST['login']) || !isset($_POST['haslo']))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once "connect.php";
	try
	{
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
		if($polaczenie->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
			$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
			
			if($rezultat = @$polaczenie->query(
			sprintf("SELECT * FROM klienci WHERE login='%s' AND haslo='%s'",
			$polaczenie->real_escape_string($login),
			$polaczenie->real_escape_string($haslo))))
			{
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow>0)
				{
					$_SESSION['zalogowany'] = true;
					
					$wiersz = $rezultat->fetch_assoc();
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['login'];
					$_SESSION['passwd'] = $wiersz['haslo'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['sport'] = $wiersz['sport'];
					$_SESSION['gry'] = $wiersz['gry'];
					$_SESSION['polska'] = $wiersz['polska'];
					$_SESSION['esport'] = $wiersz['esport'];
					$_SESSION['motoryzacja'] = $wiersz['motoryzacja'];
					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: index.php');
				}
				else
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
			}
			
			$polaczenie->close();
		}
	}
	catch(Exception $e)
	{
		$_SESSION['blad'] = '<span style="color:red">Błąd połączenia z bazą!</span>';
		header('Location: index.php');
	}

?>