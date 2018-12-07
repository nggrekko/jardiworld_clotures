<?php
  class Pages extends Controller {
    public function __construct(){
      
    }
    
    public function index(){
      $data = [
        'title' => 'Jardiword Clotures',
        'description' => 'Ecommerce de pièces de clotures'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'A propos',
        'description' => 'Description de l\'application'
      ];

      $this->view('pages/about', $data);
    }
  }