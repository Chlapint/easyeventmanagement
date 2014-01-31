<!DOCTYPE html>

<html>

<head>
	<meta name="robots" content="index, follow, all" />
	<title><?php echo (!empty($data['titre']) ? $data['titre'] : 'Easy Event Management'); ?></title>
	<?php
	$users = $this->getModel('users');
	$profil = $this->getModel('profil');
	$cssjs = $this->getModel('cssjs');
	$cssjs->register_css('style', array('src' => __WWW_ROOT_SITE__ . '/skin/css/style.css'));
	$cssjs->register_js('jquery', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/jquery/jquery.min.js'));
	$this->getBlock('cssjs/head', $data);
	?>
</head>

<body>
    <div id="wrapper">
        <div id="main">
			<header>
				<div id="header">
					<a href="<?php echo __WWW__; ?>/index">
						<h1>Easy Event<br />Management</h1>
						<img id="logo" src="" alt="logo" />
					</a>
					<nav id="profil-box">
<?php
if ($auth = $users->getAuth()) {
	$user = $profil->getUser($auth['id']);
?>
						<a title="Mon compte" href="<?php echo __WWW__; ?>/profil">Mon compte</a></li>
						<a title="Se d&eacute;connecter" href="<?php echo __WWW__; ?>/users/logout">Se d&eacute;connecter</a></li>
<?php
} else {
?>
						<a id="connexion" title="Connexion" href="<?php echo __WWW__ . '/users/login'; ?>">Connexion</a>
						<form id="form-login" method=post name="form-login" action="<?php echo __WWW__ . '/profil'; ?>">
							<input type=text name="email" placeholder="Votre email" />
							<br />
							<input type=text name="password" placeholder="Votre password" />
							<br />
							<input type=submit value="Connexion" />
						</form>
						<a title="Inscription" href="<?php echo __WWW__ . '/users/create'; ?>">Inscription</a>
<?php
}
?>
					</nav>
				<form id="form-search" method=post name="form-search" action="<?php echo __WWW__ . '/events/search'; ?>">
					<ul>
						<li><label>Recherche</label></li>
						<li><label>Dates<input type=date name="date_start" /></label></li>
						<li><label>au<input type=date name="date_end" /></label></li>
						<li><label>Lieu<input type=text name="place" /></label></li>
						<li><label>Type
							<select name="type">
								<option>Concert</option>
								<option>Exposition</option>
								<option>Festival</option>
							</select>
						</label></li>
						<li><button><img src="<?php echo __WWW_ROOT_SITE__ . '/skin/images/icon-search.png'; ?>" /></button></li>
					</ul>
				</form>
				</div>
				<div id="banner">
					<img src="<?php echo __WWW_ROOT_SITE__ . '/skin/images/event-people.jpg'; ?>" />
					<div>
						<p>Inscrivez vous</p>
						<p>au festival</p>
						<p>de votre choix</p>
						<p>en 1 clic !</p>
					</div>
				</div>
				<div class="clear"></div>
			</header>
			
			<div id="body">
