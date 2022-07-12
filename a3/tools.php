<?php

  //session_start();

  function topModule($pageTitle, $onLoad='') {
    $output = <<<"START"
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset="utf-8">
        <title>$pageTitle</title>

        <link href="https://fonts.googleapis.com/css?family=Lobster|Nanum+Gothic" rel="stylesheet">

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
             <li><a href="cart.php">Cart</a></li>
    			</ul>
    		</nav>
        <main>
START;
    echo $output;
  }

  function endModule($onLoad=''){
    $output =<<<"END"
      </main>

      <footer>
        <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> Eleni Cook s3722194.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
      <div>Product Spreedsheet: <a href=products.txt> products.txt</a></div>
        <div>Order Spreedsheet: <a href=orders.txt> orders.txt</a></div>
      </footer>

    </body>
  </html>
END;
  echo $output;

  echo preShow($_POST). preShow($_GET). preShow($_SESSION). printMyCode();
  }

  function preShow( $arr, $returnAsString=false ) {
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';
    if ($returnAsString)
      return $ret;
    else
      echo $ret;
  }

  function printMyCode() {
    $lines = file($_SERVER['SCRIPT_FILENAME']);
    echo "<pre class='mycode'>\n";
    foreach ($lines as $lineNo => $lineOfCode)
       printf("%3u: %1s \n", $lineNo, rtrim(htmlentities($lineOfCode)));
    echo "</pre>";
  }

  function php2js( $arr, $arrName ) {
    $lineEnd="";
    echo "<script>\n";
    echo "  var $arrName = {\n";

    foreach ($arr as $key => $value) {
      echo "$lineEnd    $key : $value";
      $lineEnd = ",\n";
    }

    echo "  \n};\n";
    echo "</script>\n\n";
}

function styleCurrentNavLink( $css ) {
  $here = $_SERVER['SCRIPT_NAME'];
  $bits = explode('/',$here);
  $filename = $bits[count($bits)-1];
  echo "<style>nav a[href$='$filename'] { $css }</style>";
}


function getProducts(){

  $fp = fopen("products.txt", "r");
  flock($fp, LOCK_SH);
  $headings = fgetcsv($fp, 0, "\t");


  while ($aLineOfCells = fgetcsv($fp, 0, "\t")) {

    $id =$aLineOfCells[0];
    $option =$aLineOfCells[1];
    $records[$id.$option] = array(
      $headings[0] =>$aLineOfCells[0],
      $headings[1] =>$aLineOfCells[1],
      $headings[2] =>$aLineOfCells[2],
      $headings[3] =>$aLineOfCells[3],
      $headings[4] =>$aLineOfCells[4],
      $headings[5] =>$aLineOfCells[5],
    );
  }

  flock($fp, LOCK_UN);
  fclose($fp);
  return $records;

}

function doesIdExists($id, $key){
  $records = getProducts();
  $idExist=false;
  foreach ($records as $row)
  {
   if ($row[$key] == $id){
     $idExist = true;
     break;
   }
  }
  return $idExist;
}




function displayProduct($id){

  $idExist = false;
  $records=getProducts();
  $index=0;
  $numOptions =array();
  $optionInd=0;

  foreach ($records as $key => $row) {
   if ($row['ID'] == $id){
     $idExist = true;
     $numOptions[$optionInd]=$key;
     $optionInd+=1;
   }
  }
  $start="";
  if($idExist){

    $i = $numOptions[0];
    $id=$records[$i]['ID'];
    $name =$records[$i]['Title'];
    $description = $records[$i]['Description'];
    $price = $records[$i]['Price'];

    $start=<<<"START"
    <article class="productDetails">
      <div class="bookProduct">
        <img src="../../media/$id.jpg" class="imgBook">
      </div>
      <div class="bd">


        <p>$name</p>
        <p>by $description</p>
        <p>Price: $$price.00 </p>
        <p>Sub Total: $<span id="price" >$price</span>.00 </p>

        <br>
        <br>

        <form action="cart.php" method='post'  onsubmit="return sumbitCheck()">


          <input type="hidden" name="id" value="$id"><br> Edition: <select name="option">
START;
$middle="";
foreach ($numOptions as $option) {

  $optionType =$records[$option]['OID'];
  $optionName =$records[$option]['Option'];
  $middle= $middle."<option value=\"$optionType\">$optionName</option>";

}

$end=<<<"END"

          </select> <br> <br>
          <span>

                <button type="button" id="negativeIncrement" class="negativeButton" > -  </button>

                  <input type="number"  name="qty" id="qty" class="increment" value="1" min="1">

                <button type="button" id="postiveIncrement" class="postiveButton" > + </button> <span id="displayError"> </span>


          </span>
          <br>
          <br>
          <input type="submit" class="buyButton"  , value="Buy">
        </form>
        <br>
        <br>

    </div>
  </article>
END;
  topModule("$name | Product");
  echo $start.$middle.$end;
} else {
  echo "ERROR";

}
}

function displayCart(){

  $records = getProducts();

  $start= "<article>\n<ul class=\"cart\">";
  $totalPrice =0;
  $cart="";
  $end="";
  if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $item) {


    if(!$item["id"]==""){
        $id =$item['id'];
        $qty =$item['qty'];
        $option =$item['option'];
        $price=$records[$id.$option]['Price'];
        $name = $records[$id.$option]['Title'];
        $author =$records[$id.$option]['Description'];
        $optionName = $records[$id.$option]['Option'];
        $totalPrice+=$price*$qty;

        $cart .= <<<"START"
              <li class="cartBook" >
                <span>
                  <img src="../../media/$id.jpg" class="imgBookCart">
                </sapn>

                <span>
                  <span class="cartDescription">
                    <p>$name by $author <br> Price: $$price.00 <br> Option: $optionName <br> Quanity: $qty</p>
                </span>
              </span>
              </li>
START;
      }
    }
  }
  $end = <<<"END"
      <li class="cartBookButtons">
      <span> Total Price: $$totalPrice.00</span>
      <form action="checkout.php" >

        <input type="submit" value="Checkout" class="checkoutButton"/>
      </form>
      <form action="cart.php" method='post'>
        <input type="hidden" name="id" value="unset" />
        <input type="submit" value="Delete All Items" class="checkoutButton" />
      </form>
      </li>
    </ul>
  </article>
END;

  if(!isset($_SESSION['cart'])){
      $cart =<<<"START"
      <li class="cartBook" >
        <p> You're cart is empty! You can go to the products page and add some items </p>
      </li>
      </ul>
      </article>
START;

  }
  echo $start.$cart.$end;
}

function addPost($id, $qty, $option){
  $existId =doesIdExists($id,"ID");
  $existOption =doesIdExists($option, "OID");
  $qty=htmlspecialchars($qty);
  if($existId && $existOption && $qty>0){
    if(isset($_SESSION['cart'][$id.$option])){
          $_SESSION['cart'][$id.$option]['qty']+=$qty;
    } else {

      $_SESSION['cart'][$id.$option] = array(
      "id" => $id,
      "qty" => $qty,
      "option" => $option,
      );
    }
  }
}


function totalPrice(){
  $records = getProducts();
  $totalPrice =0;
  foreach ($_SESSION['cart'] as $item) {
    $qty =$item['qty'];
    $price=$records[$item['id'].$item['option']]['Price'];
    $totalPrice+=$price*$qty;
  }
  return $totalPrice;
}


function addOrders(){

  $records=getProducts();

  $filename="orders.txt";
  $fp = fopen($filename,"a");
  flock($fp, LOCK_EX);


  $details=array("name", "email", "phone","address");
  $products= array("id", "option","qty");
  foreach ($_SESSION['cart'] as $key => $value) {
    $data=""
;    $data.=date("d-m-Y")."\t";
    foreach ($details as $customerInfo) {

      $data.=$_SESSION['order'][$customerInfo]."\t";
    }
    foreach ($products as $productInfo) {
      $data.=$_SESSION['cart'][$key][$productInfo]."\t";
    }

    $data.="20\t";
    $data.=20*$value['qty'];
    $data = preg_replace('/\r\n+/', ' ', $data);

    fputcsv($fp, explode("\t",$data),"\t");


  }
  flock($fp, LOCK_UN);
  fclose($fp);
}



function createOrder($name, $email, $address, $phone, $card, $expire){
  $_SESSION['order'] = array(
    'name'=>$name,
    'email'=>$email,
    'address'=>$address,
    'phone'=>$phone,
    'card'=>$card,
    'expire'=>$expire
  );
  foreach ($_SESSION['order'] as $key => $details) {
    $_SESSION['order'][$key]=trim($_SESSION['order'][$key]);
    $_SESSION['order'][$key]=  htmlspecialchars($_SESSION['order'][$key]);
  }
}


function createReceipt(){
    addOrders();

    $name =$_SESSION['order']['name'];
    $email =$_SESSION['order']['email'];
    $address =$_SESSION['order']['address'];
    $phone =$_SESSION['order']['phone'];

    $reciptStart=<<<"START"
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset="utf-8">
        <title>Receipt</title>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Nanum+Gothic" rel="stylesheet">
        <link id='stylecss' type="text/css" rel="stylesheet" href="css/receipt.css">
      </head>
      <body>
        <main>
          <div class="receipt">
            <div class="info">
              <header>Fantasy Books</header>
              <p> Melbourne, Australia <p>
            </div>
            <br>
            <div class=info>
              <p> Customer Name: $name</p>
              <p> Customer Email: $email</p>
              <p> Customer Address: $address</p>
              <p> Customer Mobile Phone: $phone</p>
            </div>
        <div class="productsList">
    					<div>
    						<table>
    							<tr class="tabletitle">
    								<td class="item"> <h2>Products</h2> </td>
                    <td class="item"> <h2>Product Option</h2> </td>
    								<td class="item"> <h2>Quantity</h2> </td>
    								<td class="item"> <h2>Sub Total</h2> </td>
    							</tr>
START;
      $records=getProducts();
      $total=0;
      $middle="";
      foreach ($_SESSION['cart'] as $key => $value) {

        $subtotal=$_SESSION['cart'][$key]['qty']*20;
        $qty=$_SESSION['cart'][$key]['qty'];
        $prodName=$records[$key]['Title'];
        $prodOption=$records[$key]['Option'];
        $total+=$subtotal;

        $middle.=<<<"MID"

        <tr class="products">
          <td class="tableitem"> <p>$prodName</p> </td>
          <td class="tableitem"> <p>$prodOption</p> </td>
          <td class="tableitem"> <p>$qty</p> </td>
          <td class="tableitem">  <p>$$subtotal.00</p>  </td>
        </tr>
MID;
      }

      $end=<<<"END"
            <tr class="tabletitle">
              <td></td>
              <td></td>
              <td > <h2>Total</h2> </td>
              <td > <h2>$$total.00</h2> </td>
            </tr>

          </table>
        </div>

          <div >
              <p ><strong>Thank you for shoping at Fantasy Books!</strong> 
              You will recieve your books soon. Happy Reading!!
            </p>
          </div>

        </div>
    </main>
  </body>
</html
END;
        echo $reciptStart.$middle.$end;
        unset($_SESSION['cart']);
        unset($_SESSION['order']);
}

function displayCheckout($processing =false, $name="", $email="", $address="", $phone="", $card="", $expire=""){

  $isCorrect =true;
  $phoneError="";
  $expireError="";
  $nameError="";
  $emailError="";
  $addressError="";
  $cardError="";

  if($processing){
    createOrder($name,$email,$address,$phone, $card, $expire);
    $expireArr=explode ("-",$_SESSION['order']['expire']);
    if(!(preg_match("#^(\(04\)|04|\+614)([ ]?\d){8}$#",$_SESSION['order']['phone']))){

      $phoneError ="Phone Number is incorrect";
      $isCorrect=false;

    }

    if(checkdate($expireArr[1],$expireArr[2], $expireArr[0])){




        $date=explode("-",date('Y-m-d'));

        $date[2]="01";

        if($date[1]+2 >12){
          $date[0]+=1;
        }
        $date[1]= ($date[1]+2) %12;

        if($date[1]==0){
          $date[1]=12;

        }



        $strDate=implode($date, "-");


      if(!((strtotime($_SESSION['order']['expire']) >= strtotime($strDate))) ){

        $expireError="Expiry Date can't be without a month from now";
        $isCorrect=false;
      }
    } else{

      $expireError ="Expire Date is incorrect";
      $isCorrect=false;

    }

    if(!preg_match("#^[a-z ,.'-]+$#i", $_SESSION['order']['name'] )){
      $nameError = "Name is in a incorrect format, can only contain letters and some punctuation";
      $isCorrect=false;
    }

    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
      $emailError="Email is incorrect";
      $isCorrect=false;
    }
    if(!preg_match("#^[a-z0-9 ,.'-\/\/n\s]+$#", $_SESSION['order']['address'] )){
      $addressError = "Address is incorrect";
      $isCorrect=false;
    }
    if(!preg_match("#^([ ]?\d){12,19}$#", $_SESSION['order']['card'] )){

        $cardError="Credit Card is incorrect";
        $isCorrect=false;
    }


if($isCorrect){
  header("Location:receipt.php");
  return;

    }
  }
  $name="";
  $address="";
  $email="";
  $phone="";
  $card="";
  $expire="";

  if($processing){
    topModule("Checkout");

    $name= $_SESSION['order']['name'];
    $address= $_SESSION['order']['address'];

    $email= $_SESSION['order']['email'];
    $phone= $_SESSION['order']['phone'];
    $card= $_SESSION['order']['card'];
    $expire= $_SESSION['order']['expire'];
  }

  $checkout=<<<"START"
<article class="productDetails">
  <div class="checkout">
    <form action="checkout.php"  method='post' id="checkoutForm">
      <fieldset>
        <div class="checkoutForm">
            <label>Name: </label>
            <input type="text" name="name" value="$name" placeholder="Full Name"  required>
            <span class="error"> $nameError</span>
            <br>


            <label> Email: </label>
             <input type="email" name="email" value="$email" placeholder="sample@example.com" required>
             <span class="error"> $emailError</span>
             <br>

            <label>  Address: </label>
            <textarea rows="3" cols="41" name="address"  placeholder="Address"  form="checkoutForm" required>$address</textarea>
            <span class="error"> $addressError</span>
            <br>


            <label>Mobile Phone:</label>
             <input type="text" name="phone" value="$phone" placeholder="Mobile Phone"  required>
             <span class="error"> $phoneError</span>
             <br>

            <label> Credit Card:</label>
            <input type="text" name="card" value="$card" placeholder="Credit Card"  id="cardInput" required>
            <span id="visa"><img src ="../../media/visa.png" id="visaPic"></span>
            <span class="error"> $cardError</span>
            <br>


            <label>  Expiry Date:</label>
            <input type="date" name="expire" value="$expire" placeholder="Expiry Date" required>
            <span class="error"> $expireError</span>
            <br>

            <br>
            <br>
            <input type="submit" class="buyButton" id="buyCheckout" value="Buy">
            <br>
            <br>
          </div>
        </fieldset>
      </form>
    </div >
  </article>
START;

  echo $checkout;

}


?>
