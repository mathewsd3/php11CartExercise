

<?php

//begin the session_cache_expire
session_start();
var_dump($_SESSION);

//Add one item 
function addone($cart ,$name){
	if(isset($cart[$name]))
		$cart[$name]+=1;
	else
		$cart[$name]=1;
	$_SESSION['cart']=$cart;
}

//Remove one item
function removeone($cart ,$name){
	if(isset($cart[$name]))
		if($cart[$name]!=0)
		$cart[$name]-=1;
		$_SESSION['cart']=$cart;
}

//Remove all the items from the cart
function removeall($cart ,$name){
	if(isset($cart[$name]))
		$cart[$name]=0;
		$_SESSION['cart']=$cart;
}

//Empty the cart
function emptycart(){
	unset($_SESSION['cart']);
}

if(isset($_GET["key"])&&isset($_GET["action"])){

	$name=$_GET["key"];
	$action=$_GET["action"];
	
	if(isset($_SESSION['cart']))
		$cart=$_SESSION['cart'];
	else
		$cart=array();
	
	if($action=='add1'){
		addone($cart, $name);
	}
	else if($action=='remove1'){
		removeone($cart, $name);
	}
	else if($action=='removeall'){
		removeall($cart, $name);
	}
}else if(isset($_GET["action"])){ //Empty all the cart
	if($_GET["action"]=='emptyall'){
		emptycart();
	}	
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<style>
table, tr, td, th{
	border: 1px solid black;
	border-collapse:collapse;
	margin:auto;
}


</style>
<meta charset="UTF-8">
<title>Exercise - abc</title>
</head>

<body>

<table style="width:80%">
  <tr>
    <th>Add to cart</th>
    <th>Remove from cart</th>
    <th>Remove</th>
    <th>Number</th>
  </tr>
  <tr>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=apple&action=add1" >An apple</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=apple&action=remove1" >An apple</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=apple&action=removeall" >All the apples</a></td>
    <td>Apples:<?php echo (isset($_SESSION['cart']['apple'])? $_SESSION['cart']['apple'] : 0 );?></td>
  </tr>
  <tr>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=pear&action=add1" >A Pear</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=pear&action=remove1" >A Pear</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=pear&action=removeall" >All the Pears</a></td>
    <td>Pears: <?php echo (isset($_SESSION['cart']['pear'])? $_SESSION['cart']['pear'] : 0 );?></td>
  </tr>
    <tr>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=banana&action=add1" >A Banana</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=banana&action=remove1" >A Banana</a></td>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?key=banana&action=removeall" >All the Bananas</a></td>
    <td>Bananas: <?php echo (isset($_SESSION['cart']['banana'])? $_SESSION['cart']['banana'] : 0 );?></td>
  </tr>
  <tr>
    <td><a href="<?php echo $_SERVER["PHP_SELF"] ;?>?action=emptyall" >Empty the basket</a></td>
  </tr>
  
</table>

</body>

</html>
