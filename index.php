<?php

  //ini_set('error_reporting', E_ALL);
  //ini_set('display_errors', ON);

  include('config.inc.php');
  if ($authState)
  {
    include('auth.php');
  }
  include('functions/functions.inc.php');

  include("include/tpl/head.php");
  include("include/tpl/preContent.php");

// check for param
$open = "";
if (isset($_REQUEST["open"]))
{
     $open = $_REQUEST["open"];
}

//content includes
//----------------------------------------------------- 
  if ($open == "")
  {
   include("include/content/welcome.php");
  }
  elseif ($open == "param")
  {
    include("include/content/param.php");
  }
//-----------------------------------------------------
  include("include/tpl/foot.php");
  if ($gAnaState)
  {
    include("include/tpl/analytics.php");
  }
  include('include/tpl/postContent.php');
  ?>


