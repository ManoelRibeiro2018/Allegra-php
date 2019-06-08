<?php
require('core/Database.php');

class Users {

    private $connection;


    public function __construct() {

       
        $this->connection = (new Database())->connect();
    }
 
    public function insert($data){
        $sql = 'INSERT INTO users ';
        $sql .= '(name,  cpf, address, phone, email,  password, genre ) ';
        $sql .= 'VALUES (:name,  :cpf, :address, :phone, :email,  :password, :genre) ';

        $user = $this->connection->prepare($sql);

        $user->BindValue(':name', $data['name'],PDO::PARAM_STR);
        $user->BindValue(':cpf', $data['cpf'],PDO::PARAM_STR);
        $user->BindValue(':address', $data['address'],PDO::PARAM_STR);
        $user->BindValue(':phone', $data['phone'],PDO::PARAM_STR);
        $user->BindValue(':email', $data['email'],PDO::PARAM_STR);
        $user->BindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT),PDO::PARAM_STR);
        $user->BindValue(':genre', $data['genre'],PDO::PARAM_STR);
  
      

        $user->execute();
        return $this->connection->lastInsertId();

    }


    public function update($data)  {

        $sql = 'UPDATE users ';
        $sql .= 'SET name=:name, cpf=:cpf, address=:address, phone=:phone, email=:email, ';
        $sql .= 'password=:password, genre =:genre  WHERE cod = :cod';

        $user = $this->connection->prepare($sql);

        $user->bindValue(':cod', $data['cod'], PDO :: PARAM_INT);
        $user->BindValue(':name', $data['name'],PDO::PARAM_STR);
        $user->BindValue(':cpf', $data['cpf'],PDO::PARAM_STR);
        $user->BindValue(':address', $data['address'],PDO::PARAM_STR);
        $user->BindValue(':phone', $data['phone'],PDO::PARAM_STR);
        $user->BindValue(':email', $data['email'],PDO::PARAM_STR);
        $user->BindValue(':password', $data['password'],PDO::PARAM_STR);
        $user->BindValue(':genre', $data['genre'],PDO::PARAM_STR);  
        return $user->execute();

    }

    public function delete($cod) {

        $sql = 'DELETE from users where cod = :cod';
        $user = $this->connection->prepare($sql);
        $user->bindValue(':cod',$cod,PDO::PARAM_INT);
        return $user->execute();

    }

    public function findAll() {

        $sql= 'SELECT * FROM users';
        $user= $this->connection->prepare($sql);
        $user->execute();
        return $user->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function findOne($cod) {

        $sql = 'SELECT * FROM users ';
        $sql .= 'WHERE cod = :cod';
        $user = $this->connection->prepare($sql);
        $user->bindValue(':cod', $cod,PDO::PARAM_INT);
        $user->execute();
        return $user->fetch(PDO::FETCH_OBJ);
     }

    public function login($data){
        $sql = "SELECT cod From users where email = :email AND password = :password ";
        $stmt = $this->connection->prepare($sql);
        $stmt->BindValue(":email", $data['email'],PDO::PARAM_STR);
        $stmt->BindValue(":password", $data['password'],PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){

            $dado = $stmt->fetch();
            
            return true;
        }else{
            return false;
        }



}
}