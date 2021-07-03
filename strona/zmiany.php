<?php
	
	session_start();
	require_once "connect.php";
	
	if(isset($_POST['logins']) && isset($_POST['loginn']))
	{
		try
		{
			$baza = @new mysqli($host, $db_user, $db_password, $db_name);
			if($baza->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$logins = $_POST['logins'];
				$login = $_POST['loginn'];
				$wszystko_OK = true;
				if(strlen($login)<3 || strlen($login)>20)
				{
					$wszystko_OK = false;
					$_SESSION['zlel'] = "Nick musi posiadać od 3 do 20 znaków";
				}
		
				if(ctype_alnum($login)==false)
				{
					$wszystko_OK = false;
					$_SESSION['zlel'] = "Login może składać się tylko z liter i cyfr (bez polskich znaków)";
				}
				
				$pytanie = $baza->query("SELECT id FROM klienci WHERE login='$login'");
				if(!$pytanie) throw new Exception($baza->error);
				
				$ile_takich_loginow = $pytanie->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_OK = false;
					$_SESSION['zlel'] = "Już istnieje konto z takim loginem";
				}
				
				if($logins != $_SESSION['user'])
				{
					$wszystko_OK = false;
					$_SESSION['zlel'] = "Wprowadzono błędny obecny login";
				}
				
				if($wszystko_OK == true)
				{
					if($baza->query("UPDATE klienci SET login='$login' WHERE login='$logins'"))
					{
						$_SESSION['user'] = $login;
						unset($_SESSION['zlel']);
						header('Location: konto.php');
					}
					else
					{
						throw new Exception($baza->error);
					}
				}
				else
				{
					$_SESSION['a'] = 0;
				}
				
				$pytanie->free();
				$baza->close();
			}
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	
	if(isset($_POST['emails']) && isset($_POST['emailn']))
	{
		try
		{
			$baza = @new mysqli($host, $db_user, $db_password, $db_name);
			if($baza->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$emails = $_POST['emails'];
				$email = $_POST['emailn'];
				$wszystko_OK = true;
				
				$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
				if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email)
				{
					$wszystko_OK = false;
					$_SESSION['zlee'] = "Podaj poprawny adres e-mail";
				}
				
				if($emails != $_SESSION['email'])
				{
					$wszystko_OK = false;
					$_SESSION['zlee'] = "Wprowadzono błędny obecny adres e-mail";
				}
				
				$rezultat = $baza->query("SELECT id FROM klienci WHERE email='$email'");
				if(!$rezultat) throw new Exception($baza->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK = false;
					$_SESSION['zlee'] = "Już istnieje konto przypisane do takiego adresu e-mail";
				}
				
				if($wszystko_OK == true)
				{
					if($baza->query("UPDATE klienci SET email='$email' WHERE email='$emails'"))
					{
						$_SESSION['email'] = $email;
						unset($_SESSION['zlee']);
						header('Location: konto.php');
					}
					else
					{
						throw new Exception($baza->error);
					}
				}
				else
				{
					$_SESSION['b'] = 0;
				}
				
				$rezultat->free();
				$baza->close();
			}
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	
	if(isset($_POST['haslos']) && isset($_POST['haslon']))
	{
		try
		{
			$baza = @new mysqli($host, $db_user, $db_password, $db_name);
			if($baza->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$haslos = $_POST['haslos'];
				$haslo = $_POST['haslon'];
				$wszystko_OK = true;
				
				if(strlen($haslo)<8 || strlen($haslo)>20)
				{
					$wszystko_OK = false;
					$_SESSION['zleh'] = "Nowe hasło musi posiadać od 8 do 20 znaków";
				}
				
				if($haslos != $_SESSION['passwd'])
				{
					$wszystko_OK = false;
					$_SESSION['zleh'] = "Wpisano złe obecne hasło";
				}
				
				if($wszystko_OK == true)
				{
					$user = $_SESSION['user'];
					if($baza->query("UPDATE klienci SET haslo='$haslo' WHERE haslo='$haslos' AND login='$user'"))
					{
						$_SESSION['passwd'] = $haslo;
						$_SESSION['udaneh'] = "Hasło zostało zmienione";
						$_SESSION['d'] = 0;
						unset($_SESSION['zleh']);
						header('Location: konto.php');
					}
					else
					{
						throw new Exception($baza->error);
					}
				}
				else
				{
					$_SESSION['c'] = 0;
				}
				
				$baza->close();
			}
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	
	if(isset($_POST['polska']) || isset($_POST['gry']) || isset($_POST['sport']) || isset($_POST['esport']) || isset($_POST['motoryzacja']))
	{
		$sport = 0;
		$esport = 0;
		$gry = 0;
		$polska = 0;
		$motoryzacja = 0;
		
		if(isset($_POST['sport'])) $sport = 1;
		if(isset($_POST['gry'])) $gry = 1;
		if(isset($_POST['polska'])) $polska = 1;
		if(isset($_POST['esport'])) $esport = 1;
		if(isset($_POST['motoryzacja'])) $motoryzacja = 1;
		
		try
		{
			$baza = @new mysqli($host, $db_user, $db_password, $db_name);
			if($baza->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$login = $_SESSION['user'];
				if($baza->query("UPDATE klienci SET polska=$polska, gry=$gry, sport=$sport, esport=$esport, motoryzacja=$motoryzacja WHERE login='$login'"))
				{
					if($sport != 0) $_SESSION['sport'] = 1; else $_SESSION['sport'] = 0;
					if($polska != 0) $_SESSION['polska'] = 1; else $_SESSION['polska'] = 0;
					if($gry != 0) $_SESSION['gry'] = 1; else $_SESSION['gry'] = 0;
					if($esport != 0) $_SESSION['esport'] = 1; else $_SESSION['esport'] = 0;
					if($motoryzacja != 0) $_SESSION['motoryzacja'] = 1; else $_SESSION['motoryzacja'] = 0;
					unset($_SESSION['zlet']);
				}
				
				$baza->close();
			}
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	else
	{
		$_SESSION['zlet'] = "Nie zaznaczono żadnego tematu";
		$_SESSION['e'] = 0;
		header('Location: konto.php');
	}
	
	header("Location: konto.php");
?>