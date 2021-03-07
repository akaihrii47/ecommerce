<?php
 require ('./database/DBConfig.php');
 
 require ('./database/Product.php');
 
 require ('./database/Cart.php');
 
 $db = new DBConfig();

 $product = new Product($db);
 $product_shuffle = $product->getData();

 $cart = new Cart($db);
 
 
?>