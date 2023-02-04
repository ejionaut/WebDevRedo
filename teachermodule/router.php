<?php
 
 $request = $_SERVER['REQUEST_URI'];

 switch ($request) {
     case '/':
         require 'index.php';
         break;
     case '':
         require 'index.php';
         break;
     default:
         http_response_code(404);
         require 'index.php';
         break;
 }
?>