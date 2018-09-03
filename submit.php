<?php
 
 
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
 
 
//Here you can write your SQL queries to save the data into databases.
 
//I will just show form values here using echo which we submit using AngularJS
echo "Name : ".$data->name."\n";
echo "Email : ".$data->email."\n";
echo "Username : ".$data->username."\n";
echo "Password : ".$data->password."\n";
 
 
?>