<?php
session_start();

include_once('tools.php');
topModule("Products");
?>
          <article>
            <ul class="products">

              <a href="product.php?id=TNOTW">
                <li class="book" >

                  <!-- imgae of The Name of the Wind  is from:
                  https://www.amazon.com/Name-Wind-Kingkiller-Chronicle-Chonicles
                  -ebook/dp/B003HV0TN2/ref=tmm_kin_swatch_0?_encoding=UTF8&qid=&sr=
                  -->
                  <img src="../../media/TNOTW.jpg" class="imgBook">
                  <p class="bookTitle">The Name of The Wind</p>
                  <p>Patrick Rothfuss</p>
                  <p>$20.00</p>

                </li>
              </a>

              <a href="product.php?id=TWOK">
                <li class="book">

                  <!-- image of The Way Of Kings is from:
                  https://www.dymocks.com.au/book/the-way-of-kings-part-one-the-
                  stormlight-archive-book-one-by-brandon-sanderson-9780575097360/#.W5DM2OgzZPY
                  -->
                  <img src="../../media/TWOK.jpg" class="imgBook">
                  <p class="bookTitle">The Way Of Kings</p>
                  <p>Brandon Sanderson</p>
                  <p>$20.00</p>
                </li>
              </a>

              <a href="product.php?id=AGOT">
                <li class="book">

                  <!-- image of A game of thrones is from:
                  https://www.dymocks.com.au/book/a-game-of-thrones-by-george-r-
                  r-martin-9780006479888/#.W5DNsugzZPY
                  -->
                  <img src="../../media/AGOT.jpg" class="imgBook">
                  <p class="bookTitle">A Game of Thrones</p>
                  <p>George RR Martin</p>
                  <p>$20.00</p>

                </li>
              </a>
          </ul>
        </article>
<?php
endModule();

      ?>
