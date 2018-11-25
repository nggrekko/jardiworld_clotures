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
 
      $categories = $this->productModel->getCategories();
      $sales = $this->productModel->getProductsBySales(6);
      $consultations = $this->productModel->getProductsByconsultations(6);

      $data = [
        'categories' => $categories,
        'sales' => $sales,
        'consultations' => $consultations
      ];
      
      $this->view('products/index', $data);
    }

    public function catalogue(){

      $categories = $this->productModel->getCategories();
      $products = $this->productModel->getProducts();

      $data = [
        'categories' => $categories,
        'products' => $products
      ];

      $this->view('products/catalogue', $data);
    }

    public function search(){

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $keyword = trim($_POST['search']);
      echo 'keyword : ' . $keyword;

      try {
        $categories = $this->productModel->getCategories();
        $products = $this->productModel->getProductsByKeyword($keyword);
        print_r($products);
        $data = [
          'categories' => $categories,
          'products' => $products,
          'keyword' => $keyword
        ];
  
        $this->view('products/search', $data);
      } 
      catch (Exception $e) {
        echo 'Exception : ' . $e->getMessage();
      }

    }

    public function category($name) {
      echo 'category : ' . $name . '<br>';
      $categories = $this->productModel->getCategories();
      $products = $this->productModel->getProductsByCategoryName($name);
      print_r($products);
      $data = [
        'categories' => $categories,
        'products' => $products
      ];

      $this->view('products/catalogue', $data);
    }


    public function show($id){

      $product = $this->productModel->getProductById($id);

      $data = [
        'product' => $product
      ];

      // update consultations

      try {
        $response = $this->productModel->addProductConsultation($id);
        // echo $response;
      } catch (Exception $e) {
        // echo 'Exception reçue : ',  $e->getMessage(), "\n";
      }
      
      $this->view('products/show', $data);
    }




  }