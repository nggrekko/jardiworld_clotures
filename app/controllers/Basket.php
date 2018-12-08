<?php
  class Basket extends Controller {

    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // models
      $this->userModel = $this->model('User');
      $this->productModel = $this->model('Product');
    }

    // Display basket
    public function index() {
      if (isLoggedIn()) {

        $data = array();
        // init empty basket
        if(!empty($_SESSION['basket'])) {

          // get product ids from basket
          $data = $_SESSION['basket'];
          $idList = getListValuesToQuery($data,'id');

          // fetch product by id's
          $dataset = $this->productModel->getProductsByIdList($idList);
          $dataset = convertObjectToArray($dataset);
          $dataset2 = array();
          
          // add quantity field to each product
          foreach($dataset as $item) {
            foreach ($data as $item2) {
              if ($item['productId'] == $item2['id']) {
                $item += array('quantity' => $item2['quantity']);
                array_push($dataset2,$item);
                break;
              }
            }
          }
          $data = $dataset2;
        }
        // print_r($data);
        $this->view('basket/index', $data);
      }
      // not loggedin
      else {
        redirect('users/login');
      }
    }

    // add post item to session basket
    public function addToBasket() {

      if (isLoggedIn()) {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get new product id and quantity
        $newItem = [
          'id' => trim($_POST['id']),
          'quantity' => trim($_POST['quantity']),      
        ];

        // basket is empty
        if (empty($_SESSION['basket'])) {
          // echo 'Basket is empty <br>';
          array_push($_SESSION['basket'],$newItem);
        }
        // basket has products, check if basket already contains the product to update quantity
        else {
          // echo 'Basket is not empty<br>';
          $found = false;
          $index = 0;

          // search if basket contains item's id
          foreach ($_SESSION['basket'] as $item) {
            if ($item['id']==$newItem['id']) {
              $found = true;
              break;
            }
            $index++;
          }

          // id found in basket, update quantity
          if ($found) {
            $_SESSION['basket'][$index]['quantity'] = $newItem['quantity'];
          } 
          else {
            array_push($_SESSION['basket'],$newItem);
          }
        }
        flash('ajout_panier', 'Produit ajouté au panier');
        redirect('products/show/' . $newItem['id']);
      }
      // not loggedin
      else {
        redirect('users/login');
      }
    }

    // update quantity of a product in basket
    public function updateQuantity() {
      if (isLoggedIn()) {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get new product id and quantity
        $newItem = [
          'id' => trim($_POST['id']),
          'quantity' => trim($_POST['quantity']),      
        ];

        $found = false;
        $index = 0;

        // search if basket contains item's id
        foreach ($_SESSION['basket'] as $item) {
          if ($item['id']==$newItem['id']) {
            $found = true;
            break;
          }
          $index++;
        }

        // id found in basket, update quantity
        if ($found) {
          $_SESSION['basket'][$index]['quantity'] = $newItem['quantity'];
        } 
        else {
          array_push($_SESSION['basket'],$newItem);
        }

        flash('update_quantite', 'Quantité du produit mis à jour');
        redirect('basket/index');
      }
      // not loggedin
      else {
        redirect('users/login');
      }
    }


    // Delete all items from basket
    public function removeAll() {
      unset($_SESSION['basket']);
      $_SESSION['basket']=array();
      redirect('basket/index');
    }


    // Delete item from basket
    public function removeItemFromBasket($id) {
      $data = $_SESSION['basket'];
      $index = 0;
      $data = removeElementWithValue($data, "id", $id);
      $_SESSION['basket'] = $data;
      redirect('users/basket');
    }


    // Order the basket
    public function order() {
      if (isLoggedIn()) {

        if (!isEmptyBasket()) {
          print_r($_SESSION['basket']);

          // update stocks
          try {

            foreach($_SESSION['basket'] as $item) {
              $idProduct = $item['id'];
              $quantity = $item['quantity'];

              $this->productModel->updateStock($idProduct,$quantity);
              $this->productModel->updateSales($idProduct,$quantity);
            }
          } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
          }
          // update quantity
          // empty the basket
          cleanBasket();
          flash('new_order','Votre commande est en préparation');
          redirect('basket/index');
        }
        else {
          echo 'basket empty';
          redirect('basket/index');
        }
      }
      // not loggedin
      else {
        redirect('users/login');
      }
    }
    
  }