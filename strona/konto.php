<?php
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if(isset($_SESSION['zlel']))
	{
		$_SESSION['a'] = $_SESSION['a'] + 1;
		if($_SESSION['a'] > 1)
		{
			unset($_SESSION['zlel']);
			unset($_SESSION['a']);
		}
	}
	
	if(isset($_SESSION['zlee']))
	{
		$_SESSION['b'] = $_SESSION['b'] + 1;
		if($_SESSION['b'] > 1)
		{
			unset($_SESSION['zlee']);
			unset($_SESSION['b']);
		}
	}
	
	if(isset($_SESSION['zleh']))
	{
		$_SESSION['c'] = $_SESSION['c'] + 1;
		if($_SESSION['c'] > 1)
		{
			unset($_SESSION['zleh']);
			unset($_SESSION['c']);
		}
	}
	
	if(isset($_SESSION['udaneh']))
	{
		$_SESSION['d'] = $_SESSION['d'] + 1;
		if($_SESSION['d'] > 1)
		{
			unset($_SESSION['udaneh']);
			unset($_SESSION['d']);
		}
	}
	
	if(isset($_SESSION['zlet']))
	{
		$_SESSION['e'] = $_SESSION['e'] + 1;
		if($_SESSION['e'] > 1)
		{
			unset($_SESSION['zlet']);
			unset($_SESSION['e']);
		}
	}
?>

<!DOCTYPE html>

<hmtl>
<head>
	<meta charset="utf-8">
	<title>Profil</title>
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
		position: relative;
	}
	
	div.menu
	{
		position: sticky;
		top: 0;
		z-index: 3;
	}
	
	div.menu a
	{
		cursor: pointer;
	}
	
	div.menu ul
	{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #0080ff;
	}
	
	div.menu li
	{
		float: left;
		font-size: 20px;
	}
	
	div.menu li a
	{
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	
	div.menu li a:hover
	{
		background-color: #00bfff;
	}
	
	.head
	{
		border: 2px solid black;
		background-color: #0080ff;
		text-align: center;
		padding: 10px;
		margin: 40px;
		clear: both;
	}
	
	.choose
	{
		position: absolute;
		left: 3px;
		font-size: 25px;
		line-height: 1.7em;
		width: 400px;
		margin-left: 40px;
	}
	
	.choose ul
	{
		margin: 0;
	}
	
	.choose a
	{
		cursor: pointer;
	}
	
	.info
	{
		height: 0;
		width: 40%;
		position: absolute;
		right: 10%;
		overflow: hidden;
		transition: 0.5s;
		margin-right: 40px;
		font-size: 25px;
		line-height: 1.6em;
		background-color: white;
		text-align: center;
	}
	
	.info ul
	{
		margin-top: 15px;
		padding: 0;
	}

	#infox
	{
		height: 300%;
	}
	
	#tematyx
	{
		text-align: left;
	}
	
	#tematyx input[type=checkbox]
	{
		margin-left: 44%;
		height: 20px;
		width: 20px;
	}
	
	#tematyx input[type=submit]
	{
		margin-left: 40%;
	}
	
	button
	{
		position: absolute;
		bottom: 0px;
	}
	
	input[type=text], input[type=password], input[type=email]
	{
		font-family: Comic Sans MS;
		font-size: 15px;
		border: 2px solid black;
		box-shadow: 2px 2px 10px #000;
		border-radius: 4px;
		height: 20px;
		padding: 5px;
		margin-top: 14px;
	}
	
	input[type=submit]
	{
		font-family: Comic Sans MS;
		font-size: 15px;
		cursor: pointer;
		border: 2px solid black;
		background-color: white;
		border-radius: 4px;
		height: 40px;
		padding: 5px;
		margin-top: 25px;
	}
	
	.error
	{
		font-size: 18px;
		text-align: center;
		color: red;
	}
	
	.good
	{
		font-size: 18px;
		color: green;
	}
	
	</style>
</head>

<body>
	
	<div class="menu">
		<ul>
			<li><a href="index.php">Strona główna</a></li>
			<li><a href="kategorie.php">Kategorie</a></li>
			<li style="float: right"><a href="logout.php">Wyloguj się</a></li>
		</ul>
	</div>

	<h1 class="head">Informacje o koncie</h1>
	
	<div class="choose">
		<ul>
			<li><a id="w1" style="font-weight: bold;" onclick=wyb()>Informacje podstawowe</a></li>
			<li><a id="w2" onclick=wyb2()>Zmień login</a></li>
			<li><a id="w3" onclick=wyb3()>Zmień E-mail</a></li>
			<li><a id="w4" onclick=wyb4()>Zmień hasło</a></li>
			<li><a id="w5" onclick=wyb5()>Zmień śledzone tematy</a></li>
		</ul>
	</div>
	
	<div id="infox" class="info">
		<?php if(isset($_SESSION['udaneh'])) echo "<div class='good'> $_SESSION[udaneh] </div>";?>
		Login: <?php echo $_SESSION['user']?></br>
		E-mail: <?php echo $_SESSION['email']?></br>
		Tematy, które śledzisz:
		<ul>
			<li>Sport: <?php if($_SESSION['sport']) echo "TAK"; else echo "NIE";?></li>
			<li>Gry: <?php if($_SESSION['gry']) echo "TAK"; else echo "NIE";?></li>
			<li>Polska: <?php if($_SESSION['polska']) echo "TAK"; else echo "NIE";?></li>
			<li>Esport: <?php if($_SESSION['esport']) echo "TAK"; else echo "NIE";?></li>
			<li>Motoryzacja: <?php if($_SESSION['motoryzacja']) echo "TAK"; else echo "NIE";?></li>
		</ul>
	</div>
	
	<div id="loginx" class="info">
		<?php if(isset($_SESSION['zlel'])) echo "<div class='error'> $_SESSION[zlel] </div>";?>
		<form action="zmiany.php" method="post">
			Obecny login: <input type="text" name="logins"></input></br>
			Nowy login: <input type="text" name="loginn"></input></br>
			<input type="submit" value="Zmień login">
		</form>
	</div>
	
	<div id="emailx" class="info">
	<?php if(isset($_SESSION['zlee'])) echo "<div class='error'> $_SESSION[zlee] </div>";?>
		<form action="zmiany.php" method="post">
			Obecny E-mail: <input type="email" name="emails"></input></br>
			Nowy E-mail: <input type="email" name="emailn"></input></br>
			<input type="submit" value="Zmień E-mail">
		</form>
	</div>
	
	<div id="haslox" class="info">
		<?php if(isset($_SESSION['zleh'])) echo "<div class='error'> $_SESSION[zleh] </div>";?>
		<form action="zmiany.php" method="post">
			Obecne hasło: <input id="passwd" type="password" name="haslos"></input>
			<label style="font-size: 12px;"><input id="pokaz" type="checkbox" onclick=widok() value="Pokaż hasło"></input>Pokaż hasło</label></br>
			Nowe hasło: <input id="passwd2" type="password" name="haslon"></input>
			<label style="font-size: 12px;"><input id="pokaz2" type="checkbox" onclick=widok2() value="Pokaż hasło"></input>Pokaż hasło</label></br>
			<input type="submit" value="Zmień hasło">
		</form>
	</div>
	
	<div id="tematyx" class="info">
		<?php if(isset($_SESSION['zlet'])) echo "<div class='error'> $_SESSION[zlet] </div>";?>
		<form action="zmiany.php" method="post">
			<input type="checkbox" name="sport">Sport
			<input type="checkbox" name="esport">Esport</br>
			<input type="checkbox" name="gry">Gry</br>
			<input type="checkbox" name="polska">Polska</br>
			<input type="checkbox" name="motoryzacja">Motoryzacja</br>
			<input type="submit" value="Potwierdź zmiany">
		</form>
	</div>
	
	<script>
		function wyb()
		{
			document.getElementById("loginx").style.zIndex = "0";
			document.getElementById("loginx").style.height = "0px";
			document.getElementById("emailx").style.zIndex = "0";
			document.getElementById("emailx").style.height = "0px";
			document.getElementById("haslox").style.zIndex = "0";
			document.getElementById("haslox").style.height = "0px";
			document.getElementById("tematyx").style.zIndex = "0";
			document.getElementById("tematyx").style.height = "0px";
			document.getElementById("infox").style.zIndex = "1";
			document.getElementById("infox").style.height = "300%";
			document.getElementById("w1").style.fontWeight = "bold";
			document.getElementById("w2").style.fontWeight = "normal";
			document.getElementById("w3").style.fontWeight = "normal";
			document.getElementById("w4").style.fontWeight = "normal";
			document.getElementById("w5").style.fontWeight = "normal";
		}
		
		function wyb2()
		{
			document.getElementById("infox").style.zIndex = "0";
			document.getElementById("infox").style.height = "0px";
			document.getElementById("emailx").style.zIndex = "0";
			document.getElementById("emailx").style.height = "0px";
			document.getElementById("haslox").style.zIndex = "0";
			document.getElementById("haslox").style.height = "0px";
			document.getElementById("tematyx").style.zIndex = "0";
			document.getElementById("tematyx").style.height = "0px";
			document.getElementById("loginx").style.zIndex = "1";
			document.getElementById("loginx").style.height = "300%";
			document.getElementById("w2").style.fontWeight = "bold";
			document.getElementById("w1").style.fontWeight = "normal";
			document.getElementById("w3").style.fontWeight = "normal";
			document.getElementById("w4").style.fontWeight = "normal";
			document.getElementById("w5").style.fontWeight = "normal";
		}
		
		function wyb3()
		{
			document.getElementById("loginx").style.zIndex = "0";
			document.getElementById("loginx").style.height = "0px";
			document.getElementById("haslox").style.zIndex = "0";
			document.getElementById("haslox").style.height = "0px";
			document.getElementById("infox").style.zIndex = "0";
			document.getElementById("infox").style.height = "0";
			document.getElementById("tematyx").style.zIndex = "0";
			document.getElementById("tematyx").style.height = "0px";
			document.getElementById("emailx").style.zIndex = "1";
			document.getElementById("emailx").style.height = "300%";
			document.getElementById("w3").style.fontWeight = "bold";
			document.getElementById("w2").style.fontWeight = "normal";
			document.getElementById("w1").style.fontWeight = "normal";
			document.getElementById("w4").style.fontWeight = "normal";
			document.getElementById("w5").style.fontWeight = "normal";
		}
		
		function wyb4()
		{
			document.getElementById("loginx").style.zIndex = "0";
			document.getElementById("loginx").style.height = "0px";
			document.getElementById("emailx").style.zIndex = "0";
			document.getElementById("emailx").style.height = "0px";
			document.getElementById("infox").style.zIndex = "0";
			document.getElementById("infox").style.height = "0";
			document.getElementById("tematyx").style.zIndex = "0";
			document.getElementById("tematyx").style.height = "0px";
			document.getElementById("haslox").style.zIndex = "1";
			document.getElementById("haslox").style.height = "300%";
			document.getElementById("w4").style.fontWeight = "bold";
			document.getElementById("w2").style.fontWeight = "normal";
			document.getElementById("w3").style.fontWeight = "normal";
			document.getElementById("w1").style.fontWeight = "normal";
			document.getElementById("w5").style.fontWeight = "normal";
		}
		
		function wyb5()
		{
			document.getElementById("loginx").style.zIndex = "0";
			document.getElementById("loginx").style.height = "0px";
			document.getElementById("emailx").style.zIndex = "0";
			document.getElementById("emailx").style.height = "0px";
			document.getElementById("infox").style.zIndex = "0";
			document.getElementById("infox").style.height = "0";
			document.getElementById("haslox").style.zIndex = "0";
			document.getElementById("haslox").style.height = "0";
			document.getElementById("tematyx").style.zIndex = "1";
			document.getElementById("tematyx").style.height = "300%";
			document.getElementById("w5").style.fontWeight = "bold";
			document.getElementById("w2").style.fontWeight = "normal";
			document.getElementById("w3").style.fontWeight = "normal";
			document.getElementById("w4").style.fontWeight = "normal";
			document.getElementById("w1").style.fontWeight = "normal";
		}
		
		function widok()
		{
			box = document.getElementById("pokaz");
			if(box.checked == true)
			{
				button = document.getElementById("passwd");
				button.type = "text";
			}
			else
			{
				button = document.getElementById("passwd");
				button.type = "password";
			}
		}
		
		function widok2()
		{
			box = document.getElementById("pokaz2");
			if(box.checked == true)
			{
				button = document.getElementById("passwd2");
				button.type = "text";
			}
			else
			{
				button = document.getElementById("passwd2");
				button.type = "password";
			}
		}
	</script>
	
</body>
</html>