<?php
     if (isset($_SESSION['message']))
     {
     	// print message and truncate variable afterwards
        echo $_SESSION['message'];
        unset($_SESSION['message']);
     }
 ?>