<?php

    include(APPROOT . '/helper/helperfunctions.php');

    class Pages extends Controller {

        public function __construct() {
            $this->people = $this->model('People');
        }

        public function index() {

            $people = $this->people->getAllPeople();
            $title = $this->people->title();

            $data = [
                'title' => $title,
                'people' => $people
            ];

            $this->view('pages/index', $data);

        }

        public function addperson() {

            $data = [];

            if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['dob'])) {
                if($this->people->addperson($_POST['fname'], $_POST['lname'], $_POST['dob'])) {
                    $data = [
                        'title' => "Person add successfully"
                    ];
                }
            } else {
                $data = [
                    'title' => "Please add a person"
                ];
            }

            $this->view('pages/addperson', $data);

        }

        public function updatePerson() {

            $id = myTryParse($_GET['url']);

            if($id > 0) {
                $singlePerson = $this->people->getSinglePerson($id);

                $data = [];
    
                if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['dob'])) {
                    if($this->people->updatePerson($id, $_POST['fname'], $_POST['lname'], $_POST['dob'])) {

                        //Redirect to home page
                        header("Location: ".URLROOT."pages/index");
                        exit;
                    }
                } else {
                    $data = [
                        'title' => "Please update this person",
                        'fname' => $singlePerson[0]["FNAME"],
                        'lname' => $singlePerson[0]["LNAME"],
                        'dob' => $singlePerson[0]["DOB"],
                        'uid' => $id
                    ];

                    $this->view('pages/updatePerson', $data);
                }
            }

        }

        public function removePerson() {

            $id = myTryParse($_GET['url']);

            if($id > 0) {

                if($this->people->removePerson($id)) {

                    //Redirect to home page
                    header("Location: ".URLROOT."pages/index");
                    exit;
                }
            }

        }

    }

?>