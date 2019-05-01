<?php

  class _Api {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /////////////////////////////////////////////////
    //////////////// EXAMPLES ///////////////////////
    /////// YOU SHOULD DELETE THESE AFTER ///////////
    /////////////////////////////////////////////////

    //example: static data
    public function title() {
      return "Show All People";
    }

    //example: db data - select
    public function show() {
      $this->db->query('SELECT * FROM tbl_people');
      return $this->db->resultSet();
    }

    //exaple: db data - insert
    public function add($fn, $ln, $dob) {
      
      //Adding data to database
      $this->db->query('INSERT INTO  tbl_people (FNAME, LNAME, DOB) VALUES (:fn, :ln, :dob)');

      //Binding Variables
      $this->db->bind(':fn', $fn);
      $this->db->bind(':ln', $ln);
      $this->db->bind(':dob', $dob);

      //Return true or false, based on if query is successful or not
      if($this->db->execute()) {
          return true;
      } else {
          return false;
      }
    }
  }
?>