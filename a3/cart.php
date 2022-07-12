<?php
session_start();
include_once('tools.php');
if(isset($_POST['id'])){
    if($_POST['id']=='unset') {
    unset($_SESSION['cart']);
    header("Location:products.php");
  } else {
    addPost($_POST['id'], $_POST['qty'], $_POST['option']);
  }
}
topModule("Cart");
displayCart();
endModule();


?>
