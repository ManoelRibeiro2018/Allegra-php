<?php



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require('models/Products.php');




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
     
    $product = new products();
    echo json_encode($product->findAll());
    
  }//findAll products
  
  if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['cod'])) {
    $product = new Products();
    echo json_encode($product->findOne($_GET['cod']));
  }//findOne products
  