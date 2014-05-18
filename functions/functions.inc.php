<?php

  function db_connect($user, $pass, $database)
  {
       $link = mysqli_connect('127.0.0.1', $user, $pass, $database) or die("Error while getting conenction: db_connect");
       return $link;
  }

  function d($content)
  {
       echo '<pre>';
       var_dump($content);
       echo '</pre>';
  }

  function crypt_code($code)
  {
      // return crypt(base64_encode($code), _salt);
        return sha1(base64_encode($code));
  }


  function setMessage($type, $content)
  {
    $htmlContent = '
    <div class="alert alert-%s alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p>%s</p>
    </div>';

    $_SESSION['message'] = sprintf($htmlContent, $type, $content);
  }

  function is_url_exist($url)
  {
    // taken from
    // http://stackoverflow.com/questions/7684771/how-check-if-file-exists-from-web-address-url-in-php
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}
/*
  setting user state for ip logging in db. user for de- and activating
 */
function updateUserState($dbConn, $userId, $state, $ip = NULL, $lat = NULL, $lng = NULL)
{
  $activeState = 1;
  if($state == false)
  {
    $activeState = 0;
  }
  $res = false;
  if (mysqli_connect_errno() ==   0)
  {
    $sql = "UPDATE user SET active=?, ip=?, lat=?, lng=? WHERE id = ?";
    $stmt = $dbConn->prepare($sql);
    $_SESSION['stmt'] = print_r($stmt->error);
    if($stmt != false)
    {
      $stmt->bind_param('isddi',$activeState, $ip, $lat, $lng, $userId);

      if ($stmt == FALSE)
      {
        die($mysqli->error);
      }
      $res = $stmt->execute();
      $stmt->close();
    }
  }
  return $res;
}

/*
    validating a user against the db table
 */
function validateUser($dbConn, $username, $hashed_pass)
{
  $user = false;
  if (mysqli_connect_errno() ==   0)
  {
    $sql = 'SELECT id, prename, surname FROM `user` WHERE user = ? AND pass = ?';

    if ($ergebnis = $dbConn->prepare($sql))
    {
      $ergebnis->bind_param('ss', $username, $hashed_pass);
      $ergebnis->execute();
      $ergebnis->bind_result($id, $prename, $surname);
    }
    while($ergebnis->fetch())
    {
      $user = array();
      $user['id'] = $id;
      $user['prename'] = $prename;
      $user['surname'] = $surname;
    }
    $ergebnis->close();
  }
  return $user;
}

/*
    returning the first key of an (associative) array
 */
function getFirstKey($array)
{
  reset($array);
  return key($array);
}


function setLastAction($dbConn, $userId){
  $now = time();

  if (mysqli_connect_errno() == 0)
  {
    $sql = "UPDATE user
        SET lastaction = FROM_UNIXTIME('$now')
        WHERE id = '$userId';";

    if ($ergebnis = $dbConn->prepare($sql))
    {
      $ergebnis->execute();
    }
    $ergebnis->close();
  }

  $ip  = $_SESSION['userIp'];
  $lat = $_SESSION['lat'];
  $lng = $_SESSION['lng'];
 
  updateUserState($dbConn, $userId, 1, $ip, $lat, $lng);
}

function logoutInactive($dbConn, $minutes){

  $sql = "UPDATE  user 
          SET     active=0 
          WHERE   lastaction <= DATE_ADD(NOW(), INTERVAL -$minutes MINUTE)";

    if ($result = $dbConn->prepare($sql))
    {
      $result->execute();
    }
    $result->close();
}

?>
