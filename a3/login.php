
<?php
session_start();
include_once('tools.php');
topModule("Login");



?>
          <div class="login">


          <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php"
          target="_blank" method='post'>
            Email:<br> <input type="email" name="email" value="" placeholder="Email" required><br>
            Password:<br> <input type="password" name="password" value="" placeholder="Password" required><br>


            <br>
            <br>
            <input type="submit" class="buyButton" value="Login">
            <br>
            <br>


          </form>
        </div >


<?php

endModule();


?>
