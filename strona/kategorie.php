<?php
	function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }
    
    
	if(is_session_started() === FALSE)
	{
	    session_start();
	    echo "Zaczynam sesje!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona</title>
	<link rel="shortcut icon" href="ikona.ico">
	<style>
	html, body
	{
		font-family: Comic Sans MS;
		margin: 0;
		background-color: #eee;
	}
	
	body
	{
		min-height:1000px;
		position: relative;
	}
	
	div.menu
	{
		position: fixed;
		top: 0;
		z-index: 3;
		width: 100%;
	}
	
	div.menu a
	{
		cursor: pointer;
	}
	
	ul
	{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #0080ff;
	}
	
	li
	{
		float: left;
		font-size: 20px;
	}
	
	li a
	{
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	
	li a:hover
	{
		background-color: #00bfff;
	}
	
	.sidenav {
	  height: 100%;
	  width: 0;
	  position: fixed;
	  z-index: 3;
	  top: 0;
	  right: 0;
	  background-color: #0080ff;
	  overflow-x: hidden;
	  transition: 0.5s;
	  padding-top: 60px;
	  color: white;
	}

	.sidenav a {
	  padding: 8px;
	  text-decoration: none;
	  font-size: 25px;
	  color: white;
	  display: block;
	  transition: 0.3s;
	}


	.sidenav a
	{
		cursor: pointer;
	}

	.sidenav .closebtn {
	  position: absolute;
	  top: 5px;
	  left: 25px;
	  font-size: 36px;
	}
	
	.login
	{
		text-align: center;
		font-size: 22px;
	}
	
	.login input[type=text], .login input[type=password], .login input[type=email]
	{
		background-color: #0080ff;;
		border: 2px solid black;
		border-radius: 4px;
		box-shadow: 2px 2px 10px #000;
		font-family: Comic Sans MS;
		font-size: 17px;
		height: 20px;
		padding: 5px;
		color: white;
	}
	
	.login input[type=submit]
	{
		background-color: #0080ff;;
		color: white;
		border: 2px solid white;
		width: 80px;
		height: 40px;
		border-radius: 4px;
		font-family: Comic Sans MS;
		font-size: 17px;
		cursor: pointer;
	}
	
	.login input[type=checkbox]
	{
		height: 15px;
		width: 15px;
	}
	
	.error
	{
		font-size: 18px;
		color: #781616;
	}
	
	.rejestracja
	{
		text-align: center;
		font-size: 24px;
		padding: 10px;
		background-color: #78f55f;
		display: block;
		position: relative;
	}
	
	.rejestracja .close
	{
		position: absolute;
		top: 2px;
		left: 8px;
		font-size: 30px;
		cursor: pointer;
	}
	
	.filtry
	{
		margin: 100px 40px 40px 40px;
		float: left;
		width: 20%;
		height: 80%;
		position: fixed;
		overflow-z: hidden;
		color: white;
		border: 1px solid #ddd;
		background-color: #0080ff;
	}
	
	.container
	{
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		margin-left: 30px;
		cursor: pointer;
		font-size: 22px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}


	.container input
	{
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0;
	}

	.checkmark
	{
		position: absolute;
		top: 0;
		left: 0;
		height: 25px;
		width: 25px;
		background-color: #eee;
	}

	.container:hover input ~ .checkmark
	{
		background-color: #ddd;
	}

	.container input:checked ~ .checkmark
	{
		background-color: #eee;
	}

	.checkmark:after
	{
		content: "";
		position: absolute;
		display: none;
	}
	
	.container input:checked ~ .checkmark:after
	{
		display: block;
	}

	.container .checkmark:after
	{
		left: 9px;
		top: 5px;
		width: 5px;
		height: 10px;
		border: solid #0080ff;
		border-width: 0 3px 3px 0;
		transform: rotate(45deg);
	}
	
	.filtry .sub
	{
		background-color: #0080ff;
		border: 2px solid white;
		font-family: Comic Sans MS;
		font-size: 20px;
		font-weight: bold;
		color: white;
		padding: 7px;
		position: absolute;
		left: 37%;
		bottom: 4%;
	}
	
	.filtry .sub:hover
	{
		cursor: pointer;
	}
	
	.blok
	{
		margin-top: 60px;
		width: 76%;
		float: right;
		display: grid;
		grid-template-columns: repeat(3, 1fr);
	}
	
		
	.wiado
	{
		display: inline-block;
		vertical-align: top;
		float: left;
		width: 300px;
		height: 300px;
		margin: 40px auto 50px auto;
	}
	
	.aK
	{
		width: 300px;
		height: 300px;
		position: relative;
		display: flex;
		flex-direction: column;
		justify-content: stretch;
		line-height: 0;
		color: black;
		text-decoration: none;
		overflow: hidden;
	}
	
	.image
	{
		display: flex;
		background-color: white;
		width: 100%;
		max-width: 620px;
		height: 400px;
		background-image: url(tlo.png);
		position: relative;
		background-repeat: no-repeat;
		background-position: center;
	}
	
	.tekst
	{
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		line-height: initial;
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		z-index: 2;
		padding: 0px 10px 10px;
	}
	
	.napis
	{
		color: black;
		width: 100%;
		font-size: 20px;
		line-height: 28px;
	}
	
	.wybieranie
	{
		padding: 5px;
		margin-bottom: 30px;
		font-family: Comic Sans MS;
		font-weight: bold;
		color: white;
		width: 70%;
		background-color: #0080ff;
		border: 2px solid white;
		cursor: pointer;
	}
	</style>
</head>
<body>

	<div class="menu">
		<ul>
			<li><a href="index.php">Strona główna</a></li>
			<li><a href="kategorie.php">Kategorie</a></li>
			
			<?php
			if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true)
			{
				echo '<li style="float: right"><a href="logout.php">Wyloguj się</a></li>';
				echo '<li style="float: right"><a href="konto.php">Konto</a></li>';
			}
			else
			{
				echo '<li style="float: right"><a onclick=openNav2()>Zarejestruj się</a></li>';
				echo '<li style="float: right"><a onclick=openNav()>Zaloguj się</a></li>';
			}
			
			?>
		</ul>
	</div>
	
	<div id="mySidenav" class="sidenav">
		<a class="closebtn" onclick="closeNav()">&times;</a>
		</br></br>
		<div class="login">
			<form action="zaloguj.php" method="GET">
				Login:</br>
				<input type="text" name="login"></br></br>
				Hasło:</br>
				<input type="password" name="haslo"></br></br>
				<input type="submit" value="Zaloguj"></br>
				<?php
					if(isset($_SESSION['blad'])) echo $_SESSION['blad']."</br>";
				?>
			</form>
		</div>
	</div>
	
	<div id="mySidenav2" class="sidenav">
		<a class="closebtn" onclick=closeNav2()>&times;</a>
		</br></br>
		<div class="login">
			<form action="rejestracja.php" method="GET">
				Login:</br>
				<input type="text" name="login">
				<?php
					if(isset($_SESSION['e_login']))
					{
						echo "<div class='error'> $_SESSION[e_login]</div>";
						unset($_SESSION['e_login']);
					}
					else
					{
						echo '</br></br>';
					}
				?>
				E-mail:</br>
				<input type="email" name="email">
				<?php
					if(isset($_SESSION['e_email']))
					{
						echo "<div class='error'> $_SESSION[e_email]</div>";
						unset($_SESSION['e_email']);
					}
					else
					{
						echo '</br></br>';
					}
				?>
				Hasło:</br>
				<input type="password" name="haslo1"></br></br>
				Powtórz hasło:</br>
				<input type="password" name="haslo2">
				<?php
					if(isset($_SESSION['e_haslo']))
					{
						echo "<div class='error'> $_SESSION[e_haslo]</div>";
						unset($_SESSION['e_haslo']);
					}
					else
					{
						echo '</br></br>';
					}
				?>
				<input type="checkbox" name="regulamin"> Zażekam się, iż nie będę robił nic złego
				<?php
					if(isset($_SESSION['e_regulamin']))
					{
						echo "<div class='error'> $_SESSION[e_regulamin]</div>";
						unset($_SESSION['e_regulamin']);
					}
					else
					{
						echo '</br></br>';
					}
				?>
				<input type="submit" value="Zaloguj">
			</form>
		</div>
	</div>
	
	<div class="filtry">
		<h1 style="text-align: center;">Filtry</h1>
		<hr style="width: 80%; height: 2px; border: none; background: white;">
		<form action="kategorie.php" method="get">
			<h2 style="text-align: center;">Kategoria</h2>
			<label class="container">Gry
				<input type="checkbox" name="gry"  <?php if(isset($_GET['gry'])) echo 'checked' ?>>
				<span class="checkmark"></span>
			</label>
			<label class="container">Sport
				<input type="checkbox" name="sport" <?php if(isset($_GET['sport'])) echo 'checked' ?>>
				<span class="checkmark"></span>
			</label>
			<label class="container">Motoryzacja
				<input type="checkbox" name="motoryzacja" <?php if(isset($_GET['motoryzacja'])) echo 'checked' ?>>
				<span class="checkmark"></span>
			</label>
			<label class="container">Polska
				<input type="checkbox" name="polska" <?php if(isset($_GET['polska'])) echo 'checked' ?>>
				<span class="checkmark"></span>
			</label>
			<label class="container">Esport
				<input type="checkbox" name="esport" <?php if(isset($_GET['esport'])) echo 'checked' ?>>
				<span class="checkmark"></span>
			</label>
			
			<hr style="width: 80%; height: 2px; border: none; background: white; margin-top: 23px;">
			<h2 style="text-align: center;">Sortowanie</h2>
			<center><select class="wybieranie" name="sort">
				<option value="domyslnie" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'domyslnie') echo 'selected'?>>Sortowanie domyślne</option>
				<option value="data|nowe" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'data|nowe') echo 'selected'?>>Data dodania - najnowsze</option>
				<option value="data|stare" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'data|stare') echo 'selected'?>>Data dodania - najstarsze</option>
				<option value="alfa" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'alfa') echo 'selected'?>>Alfabetycznie</option>
			</select></center>
			
			<input class="sub" type="submit" value="Filtruj">
		</form>
	</div>
	
	<div class="blok">
	
		<?php
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
					$query = "SELECT * FROM wszystko";
					if(isset($_GET['gry']) || isset($_GET['polska']) || isset($_GET['sport']) || isset($_GET['esport']) || isset($_GET['motoryzacja']))
					{
						if(isset($_GET['gry']) && isset($_GET['polska']) && isset($_GET['sport']) && isset($_GET['esport']) && isset($_GET['motoryzacja']))
						{
							goto end;
						}
						
						$a = 0;
						$query = $query . " WHERE";
						
						if(isset($_GET['gry']))
						{
							$query = $query . " kategoria LIKE '%gry%'";
							$a = 1;
						}
						
						if(isset($_GET['motoryzacja']))
						{
							if($a)
							{
								$query = $query . " OR kategoria LIKE '%motoryzacja%'";
							}
							else
							{
								$query = $query . " kategoria LIKE '%motoryzacja%'";
								$a = 1;
							}
						}
						
						if(isset($_GET['esport']))
						{
							if($a)
							{
								$query = $query . " OR kategoria LIKE '%esport%'";
							}
							else
							{
								$query = $query . " kategoria LIKE '%esport%'";
								$a = 1;
							}
						}
						
						if(isset($_GET['polska']))
						{
							if($a)
							{
								$query = $query . " OR kategoria LIKE '%polska%'";
							}
							else
							{
								$query = $query . " kategoria LIKE '%polska%'";
								$a = 1;
							}
						}
						
						if(isset($_GET['sport']))
						{
							if($a)
							{
								$query = $query . " OR kategoria LIKE '%sport%'";
							}
							else
							{
								$query = $query . " kategoria LIKE '%sport%'";
								$a = 1;
							}
						}
					}
					
					end:
					if(isset($_GET['sort']))
					{
						$select = $_GET['sort'];
						
						switch($select)
						{
							case 'domyslnie':
								$query = $query . " ORDER BY wszystko.id";
								break;
							case 'data|nowe':
								$query = $query . " ORDER BY wszystko.dataDodania DESC";
								break;
							case 'data|stare':
								$query = $query . " ORDER BY wszystko.dataDodania";
								break;
							case 'alfa':
								$query = $query . " ORDER BY wszystko.tytul";
								break;
							default:
								$query = $query . " ORDER BY wszystko.id";
								break;
						}
					}
					else
					{
						$query = $query . " ORDER BY wszystko.id";
					}
					
					if($pytanie = $polaczenie->query($query))
					{
						if($pytanie->num_rows > 0)
						{
							while($row = $pytanie->fetch_row())
							{
echo<<<end
								<div class="wiado">
								<a href="$row[1]" target="_blank" class="aK">
									<div class="image"></div>
									<div class="tekst">
										<div class="napis">$row[2]</div>
									</div>
								</a>
								</div>
end;
							}
						}
						$pytanie->free();
					}
				}
				$polaczenie->close();
			}
			catch(Exception $e)
			{
				echo $e;
			}
		?>
	
	</div>
	
	<script>
		function openNav()
		{
			document.getElementById("mySidenav").style.width = "310px";
		}

		function closeNav()
		{
			document.getElementById("mySidenav").style.width = "0";
		}
		
		function openNav2()
		{
			document.getElementById("mySidenav2").style.width = "310px";
		}
		
		function closeNav2()
		{
			document.getElementById("mySidenav2").style.width = "0";
		}
		
		function zamknij()
		{
			document.getElementById("reje").style.display = "none";
		}
	</script>
</body>
</html>