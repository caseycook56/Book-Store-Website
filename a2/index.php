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
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Eleni Cook s3722194.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
    <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
