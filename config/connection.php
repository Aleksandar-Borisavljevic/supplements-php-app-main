<?php
    define('SITEURL', 'http://localhost/absolute-supplements/');
    function OpenCon(){
        $dbServerName = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "aleksandar_borisavljevic_its_6_21";

        return $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    }
    