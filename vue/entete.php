<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-witdh, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="../sun/view/style.css">
		<link rel="icon" type="image/png" href="art.png" />
		<title>Ma plateforme</title>
	</head>
		<header class="topbar">
			<span class="menu"><img src="../img/menu.png" class="menu_img">
				<div class="sidebar">
					<a href="contacts.php" class="active" class="icon-home">Nos contacts</a>
					<a href="identification_panier.php" class="sidebar-message">Votre panier</a>
					<a href="listemagsins.php">Nos services</a>
					<a href="identification_moncompte.php">Votre compte</a>
					<a href="identification.php">Se Connecter</a>
				</div>
			</span>
			<span href="#" class="topbar-logo">
			</span>

			<nav class="topbar-nav">
				<form action="search.php<?php echo $_SERVER['PHP_SELF'];?>" METHOD="POST">
	      			<input type="search" name="ask" id="ask" class="searchbar">
					<input type="submit" class="searchclic" value=" ">
				</form>
			</nav>
			<div class="panier-topbar">
				<a href="identification_panier.php">
					0
					<br>
					<img src="../img/panier.png">
				</a>
			</div>
		</header>
		<div class="main">
			<div class="main-adresse">
				Votre adresse de livraison est Av du lac N°33
			</div>
			<div class="main-return">
				<a href="../index.php">Retour vers la page d'accueil</a> 
			</div>
		</div>       