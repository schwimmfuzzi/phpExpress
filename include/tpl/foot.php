

    </div><!--/.fluid-container-->
<hr>

      <footer>
        <div class="text-center">
          <p>&copy; <?php echo _siteInstitution ?> - <?php echo _siteAuthor ?></p>
        <p> 
           Having problems displaying this site? Feel free to email 
         <a href="mailto:<?php echo _siteContact ?>">me</a>.
        </p>
        <?php 
        if ($gAnaState)
        {
          echo '<p>';
          echo '\tThis site uses <a target="_blank" href="https://www.google.com/analytics/">Google Analytics</a>';
          echo '</p>';
        }
        ?>
        </div>
      </footer>