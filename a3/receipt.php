<?php
session_start();
include_once('tools.php');
if (!(isset($_SESSION['cart']))){
  header("Location:index.php");
}
createReceipt();

echo preShow($_POST). preShow($_GET). preShow($_SESSION). printMyCode();

?>
