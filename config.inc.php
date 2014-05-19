<?php

	// --------------------------------- general stuff

	// salt for crrypting passwords
	define('_salt','someSalt');
	define('DS',DIRECTORY_SEPARATOR);

	// (de)activate authentification
	// false0 = off | true = on
	$authState = false;

	// (de)activate google analytics
	// false0 = off | true = on
	$gAnaState = false;

	// (de)activate navbar
	// false0 = off | true = on
	$navbarState = true;

	// (de)activate sticky footer
	// false0 = off | true = on
	$footerState = true;

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

	// --------------------------------- navigation links

	$navLeft = array(
			// menu 1
			0 => array(
					0 => array('title' =>'1.1','href'=>'www.google.de','active'=>1,'target'=>'_blank'),
					1 => array('title' =>'1.2','href'=>'www.google.de','active'=>1,'target'=>'_blank'),
				),
			// menu 2
			1 => array(
					0 => array('title' =>'2.1','href'=>'www.google.de','active'=>1,'target'=>'_blank'),
					1 => array('title' =>'2.2','href'=>'www.google.de','active'=>0,'target'=>'_blank'),
				),
			2 => array('title' =>'simple','href'=>'www.google.de','active'=>1,'target'=>'_blank'),

		);

	// --------------------------------- messages
	$messages = array(
			'siteNotExist'  => 'the site you are looking for does not exist',
			'routeNotExist' => 'the route you look for does not exist',
		);
 ?>
