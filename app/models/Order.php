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

  }