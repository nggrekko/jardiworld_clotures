<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->productModel = $this->model('Product');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      $_SESSION['basket'] =array();
      // redirect('posts');
      redirect('');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['basket']);
      session_destroy();
      redirect('users/login');
    }


    public function basket() {

      if(!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = array();
      }
      $data = $_SESSION['basket'];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $_SESSION['basket'] = $data;

        // Init data
        $newItem = [
          'id' => trim($_POST['id']),
          'quantity' => trim($_POST['quantity']),      
        ];

        print_r($_SESSION['basket']);
        // if (key_exists($data,$newItem['id'])) {
        $found = false;
        $data2 = $data;
        $index = 0;
        foreach ($data as $item) {
          if ($item['id']==$newItem['id']) {
            $found = true;
            break;
          }
          $index++;
        }

        if ($found) {
          $data[$index]['quantity'] = $newItem['quantity'];
        } else {
          array_push($data,$newItem);
        }

        
        $_SESSION['basket'] = $data;
        print_r($_SESSION['basket']);

        // redirect('users/basket');
        // redirect('products/show/' . $newItem['id']);


        // } 
        // else {
        //   echo 'has key';
        //   // redirect('pages/index');
        // }
        redirect('products/show/' . $newItem['id']);
        // $this->view('products/show/'. $newItem['id'], $dataset2);



        
      }
      else {
        
        if (empty($data)) {
          $this->view('users/basket', array());
        } 
        else {

          $idList = array();
          
          foreach ($data as $cartItem) {
            array_push($idList,$cartItem['id']);
          }

          $idList = array_values($idList);
          $idList = implode(",",$idList);

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

            /*
            $stuff = array_merge($item,$qte);
            echo '<br>$stuff : ';
            print_r($stuff); echo '<br>';

            array_push($dataset2,$stuff);
            */
            /*
            foreach ($data as $item2) {
              if ($item['productId'] == $item2['id']) {
                $item += array('quantity' => '99');
                echo '<br>found<br>';
                break;
              }
            }
            */
          }

          echo '<br>$dataset2 trans: ';
          print_r($dataset2); echo '<br>';



          $this->view('users/basket', $dataset2);
        }
      }
    }

    public function remove_all() {

      unset($_SESSION['basket']);
      $_SESSION['basket'] =array();
      $data = $_SESSION['basket'];
      redirect('users/basket');

    }

    public function remove_item_from_cart($id) {
      echo $id . '<br>';
      print_r($_SESSION['basket']); echo '<br>';
      $data = $_SESSION['basket'];
      $index = 0;

      /*
      foreach($data as $item){
        if($item['id'] == $id){
          unset($data[$index]);
        }
        $index++; 
      }
      */

      $data = removeElementWithValue($data, "id", $id);

      // re-index
      // $data = array_values($data);

      $_SESSION['basket'] = $data;

      // unset($_SESSION['basket']['id']->$id);
      // $_SESSION['basket'] = $data;

      print_r($_SESSION['basket']); echo '<br>';
      redirect('users/basket');
      // unset($_SESSION['basket']);
      // $_SESSION['basket'] =array();
      // $data = $_SESSION['basket'];
      // $this->view('users/basket', $data);

    }
  }