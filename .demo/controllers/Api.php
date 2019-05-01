<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include(APPROOT . '/helper/helperfunctions.php');

    class Api extends Controller {

        public function __construct() {
            $this->rest = $this->model('Api_');
        }

        public function index() {

            $data = [
                'title' => "No param given..."
            ];

            $this->view('api/index', $data);
        }

        public function show() {

            echo $this->rest->displayAllPeople();
        }

        public function single() {

            $data = json_decode(file_get_contents("php://input"), true);

            $id = myTryParse($_GET['url']);

            echo $this->rest->displaySinglePeople($id);
        }

        public function add() {

            $data = json_decode(file_get_contents("php://input"), true);

            if($this->rest->addPerson($data['fname'], $data['lname'], $data['dob'])) {
                echo json_encode(array("Message" => "Person added Successfully"));
            } else {
                echo json_encode(array("Message" => "No Data"));
            }
        }

        public function update() {

            $data = json_decode(file_get_contents("php://input"), true);

            if($this->rest->updatePerson($data['id'], $data['fname'], $data['lname'], $data['dob'])) {
                echo json_encode(array("Message" => "Person updated Successfully"));
            } else {
                echo json_encode(array("Message" => "No Changes"));
            }
        }

        public function delete() {

            $data = json_decode(file_get_contents("php://input"), true);

            if($this->rest->removePerson($data['id'])) {
                echo json_encode(array("Message" => "Person removed Successfully"));
            } else {
                echo json_encode(array("Message" => "No Changes"));
            }
        }
    }

?>