<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <title>Fantasy Books</title>

    <link href="https://fonts.googleapis.com/css?family=Lobster|Nanum+Gothic" rel="stylesheet">
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <script src='../wireframe.js'></script>

  </head>

  <body>

    <header>
      Fantasy Books
    </header>


    <nav>
		    <ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
		</nav>

    <main>
      <article class="productDetails">
        <div class="bookProduct">
          <img src="../../media/the_name_of_the_wind.jpg" class="imgBook">
        </div>
        <div class="bd">


          <p>The Name of the wind</p>
          <p>by Patrick Rothfuss</p>
          <p>Price: $20.00 </p>

          <br>
          <br>

          <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php"
          method='post' target="_blank"  onsubmit="return sumbitCheck()">


            <input type="hidden" name="id" value="theNameOfTheWind"><br>
              Edition: <select name="option">

              <option value="massMarketPaperback">Mass Market Paperback</option>
              <option value="tradePaperback">Trade Paperback</option>
              <option value="Hardback">Hardback</option>
              <option value="10thAnniversary">10th Anniversary Edition</option>
            </select> <br> <br>
            <span>

                  <button type="button" id="negativeIncrement" class="negativeButton" > -  </button>

                    <input type="number"  name="qty" id="qty" class="increment" value="1" min="0">

                  <button type="button" id="postiveIncrement" class="postiveButton" > + </button>


            </span>
            <br>
            <br>
            <input type="submit" class="buyButton"  , value="Buy">
          </form>
          <br>
          <br>

      </div>
    </article>
  </main>

  <footer>
    <div>&copy;<script>
      document.write(new Date().getFullYear());
      </script> Eleni Cook s3722194.</div>
      <div>Disclaimer: This website is not a real website and is being
            developed as part of a School of Science Web Programming course at
            RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
<script src='product.js'></script>
  </body>
</html>
