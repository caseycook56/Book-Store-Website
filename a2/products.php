<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <title>Fantasy Books</title>

    <link href="https://fonts.googleapis.com/css?family=Lobster|Nanum+Gothic" rel="stylesheet">
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <header>
      Fantasy Books
    </header>


      <nav>
					<ul>
						<li class = "navLink"><a href="index.php">Home</a></li>
						<li class = "navLink"><a href="products.php">Products</a></li>
						<li class = "navLink"><a href="login.php">Login</a></li>
					</ul>

				</nav>

        <br>
        <main>
          <article>
            <ul class="products">

              <a href="product.php">
                <li class="book" >

                  <!-- imgae of The Name of the Wind  is from:
                  https://www.amazon.com/Name-Wind-Kingkiller-Chronicle-Chonicles-ebook/dp/B003HV0TN2/ref=tmm_kin_swatch_0?_encoding=UTF8&qid=&sr=
                  -->
                  <img src="../../media/the_name_of_the_wind.jpg" class="imgBook">
                  <p class="bookTitle">The Name of The Wind</p>
                  <p>Patrick Rothfuss</p>
                  <p>$20.00</p>

                </li>
              </a>

              <li class="book">

                <!-- image of The Way Of Kings is from:
                https://www.dymocks.com.au/book/the-way-of-kings-part-one-the-stormlight-archive-book-one-by-brandon-sanderson-9780575097360/#.W5DM2OgzZPY
                -->
                <img src="../../media/the_way_of_kings.jpg" class="imgBook">
                <p class="bookTitle">The Way Of Kings</p>
                <p>Brandon Sanderson</p>
                <p>$20.00</p>
              </li>

              <li class="book">

                <!-- image of A game of thrones is from:
                https://www.dymocks.com.au/book/a-game-of-thrones-by-george-r-r-martin-9780006479888/#.W5DNsugzZPY
                -->
                <img src="../../media/a_game_of_thrones.jpg" class="imgBook">
                <p class="bookTitle">A Game of Thrones</p>
                <p>George RR Martin</p>
                <p>$20.00</p>

              </li>
          </ul>
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
