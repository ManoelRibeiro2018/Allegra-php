<?php



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require('models/Sale.php');

if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $sale = new Sale();
    echo json_encode($sale->insert($_POST));
    return;
  }// insert sale
  
  if(!isset($_GET['action'])) {
     
    $sale = new Sale();
    echo json_encode($sale->report());
  
  }// relatorio de vendas, falta implementar.