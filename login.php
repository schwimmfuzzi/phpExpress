<?php
include ('config.inc.php');
include ('functions/functions.inc.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  session_start();
  $username = $_POST['username'];
  $passwort = $_POST['passwort'];
  $hostname = $_SERVER['HTTP_HOST'];
  $path     = dirname($_SERVER['PHP_SELF']);


  $hashed_pass = crypt($passwort, _salt);
  $dbConn = db_connect($dbUser, $dbPass, $db);

  $validated = validateUser($dbConn, $username, $hashed_pass);
  if ($validated != false)
  {
    if ($validated['id'] != '')
    {
      $_SESSION['angemeldet'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['prename'] = $validated['prename'];
      $_SESSION['userIp'] = $userIP;
      $_SESSION['userId'] = $validated['id'];
      $_SESSION['lat'] = $lat;
      $_SESSION['lng'] = $lng;

      $updated = updateUserState($dbConn, $validated['id'], 1, $userIP, $lat, $lng);

      // Weiterleitung zur geschützten Startseite
      if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1')
      {
        if (php_sapi_name() == 'cgi')
        {
          header('Status: 303 See Other');
        }
        else
        {
          header('HTTP/1.1 303 See Other');
        }
        header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/index.php');
        exit;
      }
    }
  }
  else
  {
    echo "connection was not build without failure";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo _siteTitle ?></title>
  <!-- Style -->
  <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <div class="container">

   <div class="row">
     <div class="col-lg-4 col-lg-offset-4">
       <div class="well">
         <form role="form" class="form-signin" action="login.php" method="post">
          <h2 class="form-signin-heading">Please enter your credentials</h2>
          <div class="form-group">
           <input class="form-control input-block-level" type="text"  name="username" placeholder="user">
           <input class="form-control input-block-level" type="password" name="passwort" placeholder="pass">
           <button class="btn btn-large btn-primary" type="submit">Log in</button>
         </div>
       </form>
       </div>
     </div>
   </div>

</div>
</body>
</html>