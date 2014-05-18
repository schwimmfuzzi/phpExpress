<?php

	// --------------------------------- general stuff

	// (de)activate authentification
	// false0 = off | true = on
	$authState = false;

	// (de)activate google analytics
	// false0 = off | true = on
	$gAnaState = false;

	define('DS',DIRECTORY_SEPARATOR);
	// --------------------------------- db conenction
	$host 	= '';
	$dbUser = '';
	$dbPass = '';
	$db		= '';

	// --------------------------------- site settings
	define('_siteTitle', 'Some Title');
	define('_siteAuthor', 'Author Name');
	define('_siteContact', 'Email');
	define('_siteInstitution', 'Einrichtung');

	// --------------------------------- route settings
	$routeBase = 'include'.DS.'content';
	$routeEnd  = '.php';

	$routes = array(
			'' 		=> 'welcome', // do not remove this one
			'sth' 	=>'sth',
		);

	// --------------------------------- messages
	$messages = array(
			'siteNotExist'  => 'the site you are looking for does not exist',
			'routeNotExist' => 'the route you look for does not exist',
		);
 ?>
