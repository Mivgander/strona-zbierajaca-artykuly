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
	
	.blok
	{
		width: 100%;
		float: left;
		display: grid;
		grid-template-columns: repeat(3, 1fr);
	}
	
		
	.wiado
	{
		display: inline-block;
		vertical-align: top;
		float: left;
		width: 400px;
		height: 400px;
		margin: 10px auto 50px auto;
	}
	
	.aK
	{
		width: 400px;
		height: 400px;
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
		font-size: 28px;
		line-height: 33px;
	}
	
	.sport, .gry
	{
		border: 2px solid black;
		background-color: #23c906;
		padding: 10px;
		margin: 120px 50px 50px 50px;
		clear: both;
	}
	
	.gry
	{
		background-color: #b31b07;
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
	
	.more
	{
		text-align: center;
		border: 2px solid black;
		border-radius: 11px;
		margin: auto;
		height: 40px;
		width: 210px;
		clear: both;
	}
	
	.more a
	{
		text-decoration: none;
		font-size: 25px;
		color: brown;
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
		top: 56px;
	}
	
	.rejestracja .close
	{
		position: absolute;
		top: 2px;
		left: 8px;
		font-size: 30px;
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
			<form action="zaloguj.php" method="post">
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
			<form action="rejestracja.php" method="post">
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
		
	<?php
		if(isset($_SESSION['udanaRejestracja']) && $_SESSION['udanaRejestracja'] == true)
		{
echo<<<end
		<div id="reje" class="rejestracja">
			<a class="close" onclick=zamknij()>&times;</a>
			<h3>Dziękuję za rejestrację! Zaloguj się i wejdź w opcje swojego konta aby wybrać interesujące cię tematy.</h3>
		</div>
end;
		unset($_SESSION['udanaRejestracja']);
		}
	?>
		
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
					if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true)
					{
						$query = "SELECT * FROM klienci WHERE login = '$_SESSION[user]' AND haslo = '$_SESSION[passwd]'";
						$pytanie = $polaczenie->query($query);
						
						if($pytanie->num_rows > 0)
						{
							while($row = $pytanie->fetch_assoc())
							{
								$lubisport = true;
								$lubiesport = true;
								$lubigry = true;
								$lubipolska = true;
								$lubimotoryzacja = true;
								
								if($row['sport'] == true)
								{
									echo '<center><h1 class="sport">SPORT</h1></center>';
									echo '<div class="blok">';
						
									$rezultat = $polaczenie->query("SELECT * FROM sport ORDER BY sport.dataDodania DESC LIMIT 8");
									while($linia = mysqli_fetch_assoc($rezultat))
									{
echo<<<end
										<div class="wiado">
											<a href="http://$linia[link]" target="_blank" class="aK">
											<div class="image"></div>
											<div class="tekst">
												<div class="napis">$linia[tytul]</div>
											</div>
											</a>
										</div>
end;
									}
echo<<<end
									<div class="more">
										<a href="kategorie.php?sport=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
									</div>
									</div>
end;
									$rezultat->free();
								}
								else
								{
									$lubisport = false;
								}
								
								if($row['gry'] == true)
								{
									echo '<center><h1 class="gry">GRY KOMPUTEROWE</h1></center>';
									echo '<div class="blok">';
						
									$rezultat = $polaczenie->query("SELECT * FROM gry ORDER BY gry.dataDodania DESC LIMIT 8");
									while($linia = $rezultat->fetch_row())
									{
echo<<<end
										<div class="wiado">
											<a href="http://$linia[1]" target="_blank" class="aK">
											<div class="image"></div>
											<div class="tekst">
												<div class="napis">$linia[2]</div>
											</div>
											</a>
										</div>
end;
									}
echo<<<end
									<div class="more">
										<a href="kategorie.php?gry=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
									</div>
									</div>
end;
									$rezultat->free();
								}
								else
								{
									$lubigry = false;
								}
								
								if($row['esport'] == true)
								{
									echo '<center><h1 class="sport">ESPORT</h1></center>';
									echo '<div class="blok">';
						
									$rezultat = $polaczenie->query("SELECT * FROM esport ORDER BY esport.dataDodania DESC LIMIT 8");
									while($linia = mysqli_fetch_assoc($rezultat))
									{
echo<<<end
										<div class="wiado">
											<a href="http://$linia[link]" target="_blank" class="aK">
											<div class="image"></div>
											<div class="tekst">
												<div class="napis">$linia[tytul]</div>
											</div>
											</a>
										</div>
end;
									}
echo<<<end
									<div class="more">
										<a href="kategorie.php?esport=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
									</div>
									</div>
end;
									$rezultat->free();
								}
								else
								{
									$lubiesport = false;
								}
								
								if($row['motoryzacja'] == true)
								{
									echo '<center><h1 class="sport">MOTORYZACJA</h1></center>';
									echo '<div class="blok">';
						
									$rezultat = $polaczenie->query("SELECT * FROM motoryzacja ORDER BY motoryzacja.dataDodania DESC LIMIT 8");
									while($linia = mysqli_fetch_assoc($rezultat))
									{
echo<<<end
										<div class="wiado">
											<a href="http://$linia[link]" target="_blank" class="aK">
											<div class="image"></div>
											<div class="tekst">
												<div class="napis">$linia[tytul]</div>
											</div>
											</a>
										</div>
end;
									}
echo<<<end
									<div class="more">
										<a href="kategorie.php?motoryzacja=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
									</div>
									</div>
end;
									$rezultat->free();
								}
								else
								{
									$lubimotoryzacja = false;
								}
								
								if($row['polska'] == true)
								{
									echo '<center><h1 class="gry">POLSKA</h1></center>';
									echo '<div class="blok">';
						
									$rezultat = $polaczenie->query("SELECT * FROM polska ORDER BY polska.dataDodania DESC LIMIT 8");
									while($linia = $rezultat->fetch_row())
									{
echo<<<end
										<div class="wiado">
											<a href="http://$linia[1]" target="_blank" class="aK">
											<div class="image"></div>
											<div class="tekst">
												<div class="napis">$linia[2]</div>
											</div>
											</a>
										</div>
end;
									}
echo<<<end
									<div class="more">
										<a href="kategorie.php?polska=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
									</div>
									</div>
end;
									$rezultat->free();
								}
								else
								{
									$lubipolska = false;
								}
								
								if(!$lubigry || !$lubipolska || !$lubisport || !$lubiesport || !$lubimotoryzacja)
								{	
									$tak = false;
									
									while(!$tak)
									{
										$a = rand(1, 5);
									
										if($a == 1)
										{
											if(!$lubigry)
											{
												echo '<center><h1 class="gry">MOŻE CI SIĘ SPODOBA - GRY</h1></center>';
												echo '<div class="blok">';
												
												$rezultat = $polaczenie->query("SELECT * FROM gry ORDER BY gry.dataDodania DESC LIMIT 6");
												while($linia = $rezultat->fetch_row())
												{
echo<<<end
													<div class="wiado">
														<a href="http://$linia[1]" target="_blank" class="aK">
														<div class="image"></div>
														<div class="tekst">
															<div class="napis">$linia[2]</div>
														</div>
														</a>
													</div>
end;
												}
												$tak = true;
												$rezultat->free();
											}
										}
										else if($a == 2)
										{
											if(!$lubisport)
											{
												echo '<center><h1 class="gry">MOŻE CI SIĘ SPODOBA - SPORT</h1></center>';
												echo '<div class="blok">';
												
												$rezultat = $polaczenie->query("SELECT * FROM sport ORDER BY sport.dataDodania DESC LIMIT 6");
												while($linia = $rezultat->fetch_row())
												{
echo<<<end
													<div class="wiado">
														<a href="http://$linia[1]" target="_blank" class="aK">
														<div class="image"></div>
														<div class="tekst">
															<div class="napis">$linia[2]</div>
														</div>
														</a>
													</div>
end;
												}
												$tak = true;
												$rezultat->free();
											}
										}
										else if($a == 3)
										{
											if(!$lubipolska)
											{
												echo '<center><h1 class="gry">MOŻE CI SIĘ SPODOBA - POLSKA</h1></center>';
												echo '<div class="blok">';
												
												$rezultat = $polaczenie->query("SELECT * FROM polska ORDER BY polska.dataDodania DESC LIMIT 6");
												while($linia = $rezultat->fetch_row())
												{
echo<<<end
													<div class="wiado">
														<a href="http://$linia[1]" target="_blank" class="aK">
														<div class="image"></div>
														<div class="tekst">
															<div class="napis">$linia[2]</div>
														</div>
														</a>
													</div>
end;
												}
												$tak = true;
												$rezultat->free();
											}
										}
										else if($a == 4)
										{
											if(!$lubiesport)
											{
												echo '<center><h1 class="gry">MOŻE CI SIĘ SPODOBA - ESPORT</h1></center>';
												echo '<div class="blok">';
												
												$rezultat = $polaczenie->query("SELECT * FROM esport ORDER BY esport.dataDodania DESC LIMIT 6");
												while($linia = $rezultat->fetch_row())
												{
echo<<<end
													<div class="wiado">
														<a href="http://$linia[1]" target="_blank" class="aK">
														<div class="image"></div>
														<div class="tekst">
															<div class="napis">$linia[2]</div>
														</div>
														</a>
													</div>
end;
												}
												$tak = true;
												$rezultat->free();
											}
										}
										else if($a == 5)
										{
											if(!$lubimotoryzacja)
											{
												echo '<center><h1 class="gry">MOŻE CI SIĘ SPODOBA - MOTORYZACJA</h1></center>';
												echo '<div class="blok">';
												
												$rezultat = $polaczenie->query("SELECT * FROM motoryzacja ORDER BY motoryzacja.dataDodania DESC LIMIT 6");
												while($linia = $rezultat->fetch_row())
												{
echo<<<end
													<div class="wiado">
														<a href="http://$linia[1]" target="_blank" class="aK">
														<div class="image"></div>
														<div class="tekst">
															<div class="napis">$linia[2]</div>
														</div>
														</a>
													</div>
end;
												}
												$tak = true;
												$rezultat->free();
											}
										}
									}
								}	
							}
							
							$pytanie->free();
							$polaczenie->close();
						}
						else
						{
							throw new Exception("Nieprawidłowe zapytanie");
						}
					}
					else
					{
						echo '<center><h1 class="sport">SPORT</h1></center>';
						echo '<div class="blok">';
						
						$rezultat = $polaczenie->query("SELECT * FROM sport ORDER BY sport.dataDodania DESC LIMIT 8");
						while($row = mysqli_fetch_assoc($rezultat))
						{
echo<<<end
							<div class="wiado">
								<a href="http://$row[link]" target="_blank" class="aK">
								<div class="image"></div>
								<div class="tekst">
									<div class="napis">$row[tytul]</div>
								</div>
								</a>
							</div>
end;
						}
						
echo<<<end
						<div class="more">
							<a href="kategorie.php?sport=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
						</div>
						</div>
end;
						$rezultat->free();
						
						echo '<center><h1 class="sport">MOTORYZACJA</h1></center>';
						echo '<div class="blok">';
						
						$rezultat = $polaczenie->query("SELECT * FROM motoryzacja ORDER BY motoryzacja.dataDodania DESC LIMIT 8");
						while($row = mysqli_fetch_assoc($rezultat))
						{
echo<<<end
							<div class="wiado">
								<a href="http://$row[link]" target="_blank" class="aK">
								<div class="image"></div>
								<div class="tekst">
									<div class="napis">$row[tytul]</div>
								</div>
								</a>
							</div>
end;
						}
						
echo<<<end
						<div class="more">
							<a href="kategorie.php?motoryzacja=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
						</div>
						</div>
end;
						$rezultat->free();
						
						echo '<center><h1 class="gry">GRY KOMPUTEROWE</h1></center>';
						echo '<div class="blok">';
						
						$rezultat = $polaczenie->query("SELECT * FROM gry ORDER BY gry.dataDodania DESC LIMIT 8");
						while($row = $rezultat->fetch_row())
						{
echo<<<end
							<div class="wiado">
								<a href="http://$row[1]" target="_blank" class="aK">
								<div class="image"></div>
								<div class="tekst">
									<div class="napis">$row[2]</div>
								</div>
								</a>
							</div>
end;
						}
						
echo<<<end
						<div class="more">
							<a href="kategorie.php?gry=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
						</div>
						</div>
end;
					
						$rezultat->free();
						
						
						echo '<center><h1 class="gry">POLSKA</h1></center>';
						echo '<div class="blok">';
					
						$rezultat = $polaczenie->query("SELECT * FROM polska ORDER BY polska.dataDodania DESC LIMIT 8");
						while($row = $rezultat->fetch_row())
						{
echo<<<end
							<div class="wiado">
								<a href="http://$row[1]" target="_blank" class="aK">
								<div class="image"></div>
								<div class="tekst">
									<div class="napis">$row[2]</div>
								</div>
								</a>
							</div>
end;
						}
						
echo<<<end
						<div class="more">
							<a href="kategorie.php?polska=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
						</div>
						</div>
end;

						echo '<center><h1 class="gry">Esport</h1></center>';
						echo '<div class="blok">';
					
						$rezultat = $polaczenie->query("SELECT * FROM esport ORDER BY esport.dataDodania DESC LIMIT 8");
						while($row = $rezultat->fetch_row())
						{
echo<<<end
							<div class="wiado">
								<a href="http://$row[1]" target="_blank" class="aK">
								<div class="image"></div>
								<div class="tekst">
									<div class="napis">$row[2]</div>
								</div>
								</a>
							</div>
end;
						}
						
echo<<<end
						<div class="more">
							<a href="kategorie.php?esport=on&sort=domyslnie"><b>Zobacz więcej ></b></a>
						</div>
						</div>
end;
					
						$rezultat->free();
						$polaczenie->close();
					}
				}
			}
			catch(Exception $e)
			{
				echo $e;
			}
		?>
	
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