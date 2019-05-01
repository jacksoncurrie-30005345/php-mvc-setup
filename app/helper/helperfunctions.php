<?php

    function getArrayFromURL() {

        if(isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;

        }

    }

    function myTryParse($url) {

        $getURLData = getArrayFromURL($url);

        array_splice($getURLData, 0, 2);
        $isNumber = intval($getURLData[0]);

        if($isNumber) {
            return $getURLData[0]; 
        } else {
            return 0;
        }
    }

?>