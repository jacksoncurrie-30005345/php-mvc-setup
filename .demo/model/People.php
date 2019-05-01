<?php

    class People {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function title() {
            return "Show All People";
        }

        public function getAllPeople() {
            $this->db->query('SELECT * FROM tbl_people');
            return $this->db->resultSet();
        }

        public function getSinglePerson($id) {
            $this->db->query('SELECT * FROM tbl_people WHERE ID = :id');
            $this->db->bind(":id", $id);
            return $this->db->resultSet();
        }

        public function addPerson($fn, $ln, $dob) {

            $this->db->query('INSERT INTO  tbl_people (FNAME, LNAME, DOB) VALUES (:fn, :ln, :dob)');

            //Convert data for db
            $date = date_create($dob);
            $dob = date_format($date,"Y-m-d");

            $this->db->bind(':fn', $fn);
            $this->db->bind(':ln', $ln);
            $this->db->bind(':dob', $dob);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }

        public function updatePerson($id, $fn, $ln, $dob) {

            $this->db->query('UPDATE tbl_people SET FNAME = :fn, LNAME = :ln, DOB = :dob WHERE ID = :id');

            //Convert data for db
            $date = date_create($dob);
            $dob = date_format($date,"Y-m-d");

            $this->db->bind(':id', $id);
            $this->db->bind(':fn', $fn);
            $this->db->bind(':ln', $ln);
            $this->db->bind(':dob', $dob);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function removePerson($id) {

            $this->db->query('DELETE FROM tbl_people WHERE ID = :id');

            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }

?>