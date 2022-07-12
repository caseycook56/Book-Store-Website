<?php
session_start();
include_once('tools.php');

$idExist = doesIdExists($_GET['id'], "ID");
if(!($idExist) ){
  header("Location: products.php");
}

displayProduct($_GET['id']);

endModule();

    ?>

<script src='product.js'></script>
