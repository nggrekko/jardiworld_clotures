<?php
  class Basket extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->productModel = $this->model('Product');
    }

    

    public function index() {
      if (isLoggedIn()) {
        echo 'basket <br>';

        // init empty basket
        if(empty($_SESSION['basket'])) {
          echo 'empty basket<br>';
          $this->view('basket/index', $_SESSION['basket']);
        }

        else {
          echo 'else <br>';
          print_r($_SESSION['basket']);
          $data = $_SESSION['basket'];

          $idList = getListValuesToQuery($data,'id');

          $dataset = $this->productModel->getProductsByIdList($idList);
          
          echo '<br>$data : ';
          print_r($data); echo '<br>';
          
          echo '<br>$dataset : ';
          print_r($dataset); echo '<br>';

          // convert object to array
          // $dataset = json_decode(json_encode($dataset), true);
          $dataset = convertObjectToArray($dataset);

          echo '<br>$dataset array : ';
          print_r($dataset); echo '<br>';

          $dataset2 = array();
          
          foreach($dataset as $item) {
            foreach ($data as $item2) {
              if ($item['productId'] == $item2['id']) {
                $item += array('quantity' => $item2['quantity']);
                echo '<br>found<br>';
                array_push($dataset2,$item);
                break;
              }
            }
          }
          echo '<br>$dataset2 trans: ';
          print_r($dataset2); echo '<br>';
          $this->view('basket/index', $dataset2);
        }
      }
      else {
        redirect('users/login');
      }
    }

    // Add POST item to basket
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

          array_push($_SESSION['basket'],$newItem);
          print_r($_SESSION['basket']);
          
          // redirect('products/show/'.$newItem['id']);
          redirect('basket/index');
        }

        // basket has products, check if basket already contains the product to update quantity
        else {
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

          // redirect('users/basket');
          redirect('products/show/' . $newItem['id']);
        }
      }
      // not loggedin
      else {
        redirect('user/login');
      }
    }

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

        // redirect('users/basket');
        redirect('basket/index');
        
      }
      // not loggedin
      else {
        redirect('user/login');
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
      echo $id . '<br>';
      print_r($_SESSION['basket']); echo '<br>';
      $data = $_SESSION['basket'];
      $index = 0;

      $data = removeElementWithValue($data, "id", $id);

      $_SESSION['basket'] = $data;

      print_r($_SESSION['basket']); echo '<br>';
      redirect('users/basket');
    }

    
  }


  
      
