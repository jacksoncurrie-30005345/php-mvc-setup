<?php
  //option, but easy: classname same as controller with leading underbar
  class _Pages {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Any model functions go here
    // Can return DB data or static

    /////////////////////////////////////////////////
    //////////////// EXAMPLES ///////////////////////
    /////// YOU SHOULD DELETE THESE AFTER ///////////
    /////////////////////////////////////////////////

    //example: static data
    public function title() {
      return "Show All People";
    }

    //example: db data - select
    public function getAllPeople() {
      $this->db->query('SELECT * FROM tbl_people');
      return $this->db->resultSet();
    }

    //exaple: db data - insert
    public function addPerson($fn, $ln, $dob) {
      
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