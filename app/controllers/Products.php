<?php
  class Products extends Controller {

    public function __construct(){
      $this->productModel = $this->model('Product');
      $this->userModel = $this->model('User');
    }

    // display carrousel
    public function index(){
 
      $categories = $this->productModel->getCategories();
      $sales = $this->productModel->getProductsBySales(6); // 6 produits les plus vendus
      $consultations = $this->productModel->getProductsByconsultations(6); // 6 produits les plus consultés

      $data = [
        'categories' => $categories,
        'sales' => $sales,
        'consultations' => $consultations
      ];
      
      $this->view('products/index', $data);
    }

    // display catalogue
    public function catalogue(){

      $categories = $this->productModel->getCategories();
      $products = $this->productModel->getProducts();

      $data = [
        'categories' => $categories,
        'products' => $products
      ];

      $this->view('products/catalogue', $data);
    }

    // display result of search by keyword
    public function search(){

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $keyword = trim($_POST['search']);

      try {
        $categories = $this->productModel->getCategories();
        $products = $this->productModel->getProductsByKeyword($keyword);

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

    // display products by categories
    public function category($id) {

      $categories = $this->productModel->getCategories();
      $products = $this->productModel->getProductsByCategoryId($id);

      $data = [
        'categories' => $categories,
        'products' => $products
      ];

      $this->view('products/catalogue', $data);
    }

    // display 1 product by id
    public function show($id){

      $product = $this->productModel->getProductById($id);

      $data = [
        'product' => $product
      ];

      // increase number of views
      try {
        $response = $this->productModel->addProductConsultation($id);
      } catch (Exception $e) {
        // echo 'Exception reçue : ',  $e->getMessage(), "\n";
      }
      
      $this->view('products/show', $data);
    }
  }