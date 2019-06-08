<?php

require('core/DataBase.php');


class Category {

    private $connection;

   public function __construct(){

        $this->connection = (new Database())->connect();

   }


   public function insert($data){

        $sql = 'INSERT INTO category ';
        $sql .= '(name) VALUES (:name)';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':name', $data['name'], PDO::PARAM_STR);

        $category->execute();

        return $this->connection->lastInsertId();
   }

   public function update($data) {

        $sql = 'UPDATE  category SET ';
        $sql .= 'name=:name ';
        $sql .= 'WHERE cod = :cod';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':cod', $data['cod'], PDO::PARAM_INT);
        $category->bindValue(':name', $data['name'], PDO::PARAM_STR);
        return $category->execute();

   }

   public function delete($cod){

        $sql = 'DELETE FROM category where cod = :cod';
        $category = $this->connection->prepare($sql);
        $category->bindValue(':cod', $cod, PDO::PARAM_INT);
        return $category->execute();
   }
   public function findAll(){
        $sql = 'Select * from category';
        $category=$this->connection->prepare($sql);
        $category->execute();
        return $category->fetchAll(PDO::FETCH_OBJ);

   }

   public function findOne($cod) {

        $sql = 'SELECT * FROM category WHERE cod=:cod ';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':cod',$cod, PDO::PARAM_INT);

        $category->execute();

        return $category->fetch(PDO::FETCH_OBJ);
   }



}