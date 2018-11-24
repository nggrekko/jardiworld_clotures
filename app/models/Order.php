<?php
  class Order {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function createOrder($data){
      $this->db->query('INSERT INTO orders (idUser,nbProducts,totalPrice) VALUES(:idUser,:nbProducts,:totalPrice)');

      $this->db->bind(':idUser', $data['idUser']);
      $this->db->bind(':nbProducts', $data['nbProducts']);
      $this->db->bind(':totalPrice', $data['totalPrice']);

      // Execute
      if($this->db->execute()){
        return $this->db->lastInsertedId();
      } else {
        return false;
      }
    }

    // create class association between Order and Product
    public function createOrderProduct($data){
      $this->db->query('INSERT INTO orders_products (idOrder,idProduct,price,quantity) VALUES(:idOrder,:idProduct,:price,:quantity)');

      $this->db->bind(':idOrder', $data['idOrder']);
      $this->db->bind(':idProduct', $data['idProduct']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':quantity', $data['quantity']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    



    // // Regsiter user
    // public function register($data){
    //   $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
    //   // Bind values
    //   $this->db->bind(':name', $data['name']);
    //   $this->db->bind(':email', $data['email']);
    //   $this->db->bind(':password', $data['password']);

    //   // Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // // Login User
    // public function login($email, $password){
    //   $this->db->query('SELECT * FROM users WHERE email = :email');
    //   $this->db->bind(':email', $email);

    //   $row = $this->db->single();

    //   $hashed_password = $row->password;
    //   if(password_verify($password, $hashed_password)){
    //     return $row;
    //   } else {
    //     return false;
    //   }
    // }

    // // Find user by email
    // public function findUserByEmail($email){
    //   $this->db->query('SELECT * FROM users WHERE email = :email');
    //   // Bind value
    //   $this->db->bind(':email', $email);

    //   $row = $this->db->single();

    //   // Check row
    //   if($this->db->rowCount() > 0){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // // Get User by ID
    // public function getUserById($id){
    //   $this->db->query('SELECT * FROM users WHERE id = :id');
    //   // Bind value
    //   $this->db->bind(':id', $id);

    //   $row = $this->db->single();

    //   return $row;
    // }
    
    
  }