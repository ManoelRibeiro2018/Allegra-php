<?php

require('core/Database.php');

class ShoppingCart {


    private $connection;

    public function __construct() {

        $this->connection = (new Database())->connect();

        if(!isset($_SESSION['cart'])) {
    
            $_SESSION['cart'] = array();
        }
    }

    public function addProducts($cod, $qtd=1) {

        $indice = sprintf("%s:%S",  (int)$cod);

        $_SESSION['cart'][$ = (int)$qtd;

    }

    public function updateQuantity($indice, $qtd){

        if(isset($_SESSION['cart'][$indice])){

            if($qtd > 0){

                $_SESSION['cart'][$ = (int)$qtd;

            }
        }
    }

    public function removeProducts($indice){

        unset($_SESSION['cart'][$indice]);

    }

    public function listProducts(){

        $return = array();

        foreach($_SESSION['cart' as $indice => $qtd]){

            //explode criar um array a partir de uma string usando um separador

            list($cod, $qtd) = explode(":", $indice);

            $sql = 'select * products where = ?';
            
            $cart = $this->connection->prepare($sql);
            $cart->execute(array($cod));

            $product = $cart->fetch(PDO::FETCH_OBJ);//adicionando um produto na variavel

            //preenchendo retorno

            $return[$indice]['name'] = $product -> name;
            $return[$indice]['photo'] = $product -> photo;
            $return[$indice]['quantity'] = $product -> $qtd;
            $return[$indice]['price'] = $product -> price * $qtd;
            $return[$indice]['genre'] = $product -> genre;
            $return[$indice]['description'] = $product -> description;
           
        }

    }

    public function totalValue(){

        $products = $this->listProducts();

        $total=0;

        foreach($products as $indice => $row){

            $total = $row['price'];

        }

        return $total

    }

}





