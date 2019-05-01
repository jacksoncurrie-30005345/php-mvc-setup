<?php

    include(APPROOT . '/helper/helperfunctions.php');

    class Pages extends Controller {

      public function __construct() {
        $this->change_this = $this->model(''); //name your model
      }

      public function index() {

        // variables for data or model functions go here

        // add data or variables to the array using key-value pairs
        $data = [];

        // call your view 
        $this->view('pages/index', $data);
      }
    }
