<?php if($navbarState){ ?><!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php"><?php echo _siteTitle ?></a>
          </div>
          <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                    <?php
                         $urlBase = 'http://';
                         foreach ($navLeft as $key => $n)
                         {
                              if(!array_key_exists('title', $n))
                              {
                                   echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <i class="fa fa-globe"></i> --> First Nav <b class="caret"></b></a>';
                                   echo '<ul class="dropdown-menu">';
                                   foreach ($n as $key => $link)
                                   {
                                        if ($link['active'] === 1)
                                        {
                                             echo '<li><a href="'.$urlBase.$link['href'].'" target="'.$link['target'].'">'.$link['title'].'</a></li>';
                                        }
                                   }
                                   echo '</ul>';
                                   echo '</li>';
                              }
                              else{
                                   if ($n['active'] === 1)
                                   {
                                        echo '<li><a href="'.$urlBase.$n['href'].'" target="'.$link['target'].'">'.$n['title'].'</a></li>';
                                   }
                              }
                         }
                    ?>

               </ul>
               <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="index.php?open=">right item 1</a></li>
                    <?php
                    if($authState)
                    {
                         echo '<li><a href="logout.php">Log out</a></li>';
                         echo '<li class="active"><a href="#">Logged in as '.$_SESSION['username'].'</a>';
                    }
                    ?>
               </ul>
          </div><!--/.nav-collapse -->
     </div>
</div>
<?php } ?>
<!-- opening the container for content -->
<div id="content" class="container">




    