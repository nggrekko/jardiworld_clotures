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

    /*
    public function show($id){
      $post = $this->productModel->getProductById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post,
        'user' => $user
      ];

      $this->view('products/show', $data);
    }
    */

  }