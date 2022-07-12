<?php
session_start();
include_once('tools.php');
topModule("Welcome to Fantasy Books!");

?>


      <article class=homePage>
        <h1> Welcome to Fantasy books! </h1>
        <p>This is an online book store mainly focused on fantasy,
           both old and new. Some of the authors that are sold on this store are
           Patrick Rothfuss, Brandon Sanderson, and George R.R. Martin. </p>
        <div>

          <!-- image is from https://themillions.com/2016/01/worlds-upon-worlds-on-growing-up-book-rich.html -->
          <img src="../../media/bookshelf.jpg"class="imgBook">
        </div>
      </article>
<?php
endModule();

      ?>
