<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "maindatabase";

    $connection = new mysqli ($servername, $username, $password, $dbname);

    if ($connection -> connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>