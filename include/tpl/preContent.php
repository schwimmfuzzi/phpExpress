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
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <i class="fa fa-globe"></i> --> First Nav <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                              <li><a href="index.php?open=">Link</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?open=">Link2</a></li>
                         </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <i class="fa fa-signal"></i> --> 2nd Nav <b class="caret"></b></a>
                         <ul class="dropdown-menu">

                              <li class="divider"></li>
                              <li role="presentation" class="dropdown-header">header</li>

                              <li class=""><a href="index.php?open=">sublink 1</a></li>
                              <li><a href="index.php?open=">sublink 2</a></li>

                         </ul>
                    </li>

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