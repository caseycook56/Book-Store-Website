<?php
session_start();
include_once('tools.php');

if(!isset($_SESSION['cart'])){
  header("Location:index.php");
}
if(count($_POST)!=0){

  displayCheckout(true, $_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['card'], $_POST['expire']);

} else{
  topModule("Checkout");
  displayCheckout(false);
}

endModule();
?>
<script src='checkout.js'></script>
