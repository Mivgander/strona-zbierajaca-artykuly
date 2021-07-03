<?php
	session_start();
	
	if(isset($_POST['email']))
	{
		$wszystko_OK = true;
		
		
		$login = $_POST['login'];
		if(strlen($login)<3 || strlen($login)>20)
		{
			$wszystko_OK = false;
			$_SESSION['e_login'] = "Nick musi posiadać od 3 do 20 znaków";
		}
		
		if(ctype_alnum($login)==false)
		{
			$wszystko_OK = false;
			$_SESSION['e_login'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email)
		{
			$wszystko_OK = false;
			$_SESSION['e_email'] = "Podaj poprawny adres e-mail";
		}
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		if(strlen($haslo1)<8 || strlen($haslo1)>20)
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków";
		}
		
		if($haslo1!=$haslo2)
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Podane hasła nie są identyczne";
		}
		
		if(!isset($_POST['regulamin']))
		{
			$wszystko_OK = false;
			$_SESSION['e_regulamin'] = "Musisz zaakceptować regulamin";
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
				$rezultat = $polaczenie->query("SELECT id FROM klienci WHERE email='$email'");
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK = false;
					$_SESSION['e_email'] = "Już istnieje konto przypisane do takiego adresu email";
				}
				
				
				$rezultat = $polaczenie->query("SELECT id FROM klienci WHERE login='$login'");
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_OK = false;
					$_SESSION['e_login'] = "Już istnieje konto z takim loginem";
				}
				
				
				if($wszystko_OK==true)
				{
					if($polaczenie->query("INSERT INTO klienci VALUES ('', '$login', '$haslo1', '$email', '0', '0', '0', '0', '0')"))
					{
						$_SESSION['udanaRejestracja'] = true;
						header('Location: index.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				
				
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			$_SESSION['e_regulamin'] = "Błąd serwera!";
		}
	}
	
	header("Location: index.php");
?>