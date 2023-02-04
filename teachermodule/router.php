<?php
 
 $request = $_SERVER['REQUEST_URI'];

 switch ($request) {
     case '/':
         require 'login.php';
         break;
     case '':
         require 'login.php';
         break;
     default:
         http_response_code(404);
         require 'login.php';
         break;
 }
?>