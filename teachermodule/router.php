<?php
 
 $request = $_SERVER['REQUEST_URI'];

 switch ($request) {
     case '/':
         require 'teacherModule.php';
         break;
     case '':
         require 'teacherModule.php';
         break;
     default:
         http_response_code(404);
         require 'teacherModule.php';
         break;
 }
?>