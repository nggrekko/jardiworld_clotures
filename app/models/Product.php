<?php
  class Product {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getCategories()  {
      $this->db->query('SELECT * FROM categories ORDER BY name ASC');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getProducts() {
      $this->db->query('SELECT *, 
                        products.id as productId, 
                        products.name as productName,
                        categories.id as categoryId, 
                        categories.name as categoryName 
                        FROM products 
                        INNER JOIN categories 
                        ON products.category_id = categories.id');

      $results = $this->db->resultSet();
      return $results;
    }

    public function getProductById($id) {
      $this->db->query('SELECT *, 
                        products.id as productId, 
                        products.name as productName,
                        categories.id as categoryId, 
                        categories.name as categoryName 
                        FROM products 
                        INNER JOIN categories 
                        ON products.category_id = categories.id
                        WHERE products.id = :id');

      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
    }

    public function getProductsByIdList($idList) {
      $this->db->query('SELECT *, 
                        products.id as productId, 
                        products.name as productName,
                        categories.id as categoryId, 
                        categories.name as categoryName 
                        FROM products 
                        INNER JOIN categories 
                        ON products.category_id = categories.id
                        WHERE products.id in ('.$idList.');');

      // $this->db->bind(':idList', $idList);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getProductsByCategoryName($categoryName) {
      $this->db->query('SELECT *, 
                        products.id as productId, 
                        products.name as productName,
                        categories.id as categoryId, 
                        categories.name as categoryName 
                        FROM products 
                        INNER JOIN categories 
                        ON products.category_id = categories.id
                        WHERE categories.name in (":categoryName");');
      
      $this->db->bind(':categoryName', $categoryName);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getProductsByCategoryId($categoryId) {
      $this->db->query('SELECT *, 
                        products.id as productId, 
                        products.name as productName,
                        categories.id as categoryId, 
                        categories.name as categoryName 
                        FROM products 
                        INNER JOIN categories 
                        ON products.category_id = categories.id
                        WHERE categories.id in (":categoryId");');
      
      $this->db->bind(':categoryId', $categoryId);
      $results = $this->db->resultSet();
      return $results;
    }

    public function addProductConsultation($id) {
      $this->db->query('UPDATE products 
                        SET consultations = consultations + 1 
                        WHERE products.id = :id');
  
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateStock($id,$quantity) {
      $this->db->query('UPDATE products 
                        SET stock = stock - :quantity
                        WHERE products.id = :id');

      $this->db->bind(':id', $id);
      $this->db->bind(':quantity', $quantity);
      // Execute
      if($this->db->execute()){
      return true;
      } else {
      return false;
      }
    }

    public function updateSales($id,$quantity) {
      $this->db->query('UPDATE products 
                        SET ventes = ventes + :quantity
                        WHERE products.id = :id');

      $this->db->bind(':id', $id);
      $this->db->bind(':quantity', $quantity);
      // Execute
      if($this->db->execute()){
      return true;
      } else {
      return false;
      }
    }

  }