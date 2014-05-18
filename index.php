<?php

  //ini_set('error_reporting', E_ALL);
  //ini_set('display_errors', ON);


  // --------------------------------------------- header stuff
  include('config.inc.php');
  if ($authState)
  {
    include('auth.php');
  }

  include('functions/functions.inc.php');

  include("include/tpl/head.php");
  include("include/tpl/preContent.php");

  // --------------------------------------------- content stuff
  // check for param
  $open    = '';
  $incFile = '';
  if (isset($_REQUEST["o"]))
  {
    $open = $_REQUEST["o"];
  }

  // check if site is set and if file is there
  if(array_key_exists($open, $routes))
  {
    $incFile = $routeBase . DS . $routes[$open] . $routeEnd;
  }
  else
  {
    $incFile = $routeBase . DS . $routes[''] . $routeEnd;
    setMessage('danger',$messages['routeNotExist']);
  }

  if (!file_exists($incFile))
  {
    $incFile = $routeBase . DS . $routes[''] . $routeEnd;
    setMessage('danger',$messages['siteNotExist']);
  }
  
  include('include/tpl/messages.php');
  include($incFile);

  // --------------------------------------------- footer stuff
  include("include/tpl/foot.php");
  if ($gAnaState)
  {
    include("include/tpl/analytics.php");
  }
  include('include/tpl/postContent.php');
  ?>


