<?php
  class Products extends Controller {

    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->productModel = $this->model('Product');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get products
      // $posts = $this->postModel->getProducts();
      $categories = $this->productModel->getCategories();
      $products = $this->productModel->getProducts();

      $data = [
        'categories' => $categories,
        'products' => $products
      ];

      $this->view('products/index', $data);
    }

    
    public function show($id){

      $product = $this->productModel->getProductById($id);

      $data = [
        'product' => $product
      ];

      $this->view('products/show', $data);
    }


  }