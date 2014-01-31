<!DOCTYPE html>

<html>

<head>
	<meta name="robots" content="index, follow, all" />
	<title><?php echo (!empty($data['titre']) ? $data['titre'] : 'Easy Event Management'); ?></title>
	<?php
	$cssjs = $this->getModel('cssjs');
	$cssjs->register_css('style', array('src' => __WWW_ROOT_SITE__ . '/skin/css/style.css'));
	$cssjs->register_js('js', array('src' => __WWW_ROOT_SITE__ . '/skin/js/js.js'));
	$cssjs->register_js('jquery', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/jquery/jquery.min.js'));
	$this->getBlock('cssjs/head', $data);
	?>
</head>

<body>
    <div id="wrapper">
        <div id="main">
			<header>
				<a href="<?php echo __WWW__; ?>/index">
					<img id="logo" src="" alt="logo" />
					
				</a>
				<a href="<?php echo __WWW__; ?>/index">
					<h1>Easy Event Management</h1>
				</a>
				<nav>
<?php
$users = $this->getModel('users');
$profil = $this->getModel('profil');
$auth = $users->getAuth();
$user = $profil->getUser($auth['id']);
?>
					<ul>
						<li><a title="Votre compte" href="<?php echo __WWW__; ?>/profil">Votre compte</a></li>
						<li><a title="Vos évènements" href="<?php echo __WWW__; ?>/events">Vos évènements</a></li>
						<li><a title="Vos bénévoles" href="<?php echo __WWW__; ?>/volunteers">Vos bénévoles</a></li>
						<li><a title="Vos postes" href="<?php echo __WWW__; ?>/jobs">Vos postes</a></li>
						<li><a title="Assistance" href="<?php echo __WWW__; ?>/index/faq">Assistance</a></li>
						<li><a title="Se d&eacute;connecter" href="<?php echo __WWW__; ?>/users/logout">Se d&eacute;connecter</a></li>
						<li><a title="Votre abonnement" href="<?php echo __WWW__; ?>/profil/subscription">Votre abonnement expirera le <?php //echo $account->dateOfBuy(); ?>.</a></li>
					</ul>
				</nav>
			</header>
			<hr>
			
			<div id="body">
