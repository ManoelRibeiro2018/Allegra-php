<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

//require('models/Users.php');
//require('models/Category.php');
require('models/Products.php');
//require('models/Sale.php');


/*if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $user = new Category();
    echo json_encode($user->insert($_POST));
    return;
}//insert users

if(isset($_POST['action']) && $_POST['action'] == 'update') {

  $user = new Users();

  if($user->update($_POST)){

      echo 'updated';
  }
  return;
}//update users

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['cod'])) {
   
  $user = new Users();
  if($user->delete($_GET['cod'])) {
    echo 'Deleted!';
  }
  
  return;
}//delete users

if(!isset($_GET['action'])) {
   
  $user = new Users();
  echo json_encode($user->findAll());
  
}//findAll users

if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['cod'])) {
  $user = new Users();
  echo json_encode($user->findOne($_GET['cod']));
}//findOne users


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
  $category = new Category();
  echo json_encode($category->insert($_POST));
  return;
}// insert category

if(isset($_POST['action']) && $_POST['action'] == 'update') {

  $category = new Category();

  if($category->update($_POST)){

      echo 'updated';
  }
  return;
}// update category


if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['cod'])) {
   
  $category = new Category();
  if($user->delete($_GET['cod'])) {
    echo 'Deleted!';
  }
  
  return;
}// delete category

if(!isset($_GET['action'])) {
   
  $category = new Category();
  echo json_encode($category->findAll());
  
}// findAll category

if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['cod'])) {
  $category = new Category();
  echo json_encode($category->findOne($_GET['cod']));
}// findOne category

*/
if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
  $products = new Products();
  echo json_encode($products->insert($_POST));
  return;

}// insert products


if(isset($_POST['action']) && $_POST['action'] == 'upload'){
  
  
  echo json_encode(['success' => 'ok']);
  move_uploaded_file($_FILES['arq']['tmp_name'], 'uploads/' . $_FILES['arq']['name']);
  

  //$_FILES;
  //$products = new Products();
  //echo json_encode($products->upload());
 
  //move_uploaded_file($_FILES['arq']['cod'],'upload/'.$_FILES['arq']['cod'] )
}


/*
if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $product = new Products();

    if($product->update($_POST)){

        echo 'updated';
    }
    return;
}// update products

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['cod'])) {
   
  $product = new Products();
  if($product->delete($_GET['cod'])) {
    echo 'Deleted!';
  }
  
  return;
}// delete products

if(!isset($_GET['action'])) {
   
  $product = new Category();
  echo json_encode($product->findAll());
  
}//findAll products
/*

if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['cod'])) {
  $product = new Product();
  echo json_encode($product->findOne($_GET['cod']));
}//findOne products


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
  $sale = new Sale();
  echo json_encode($sale->insert($_POST));
  return;
}// insert sale

if(!isset($_GET['action'])) {
   
  $sale = new Sale();
  echo json_encode($sale->report());

}// relatorio de vendas, falta implementar.
 
*/
//http://localhost/Allegra/index.php?action=delete&cod=1
 