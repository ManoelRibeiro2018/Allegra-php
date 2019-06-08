<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require('models/Users.php');




if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $user = new Users();
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


if(isset($_POST['action']) && $_POST['action']=='login'){
  $user = new Users();

  if($user->login($_POST)){
    
    echo 'loading';
  
  }

}

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


 

//http://localhost/Allegra/index.php?action=delete&cod=1
 