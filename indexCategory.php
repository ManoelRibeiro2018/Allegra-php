<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require('models/Category.php');




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
    if($category->delete($_GET['cod'])) {
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