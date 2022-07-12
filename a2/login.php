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
					<ul class="navBar">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>

				</nav>
        <main >
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
