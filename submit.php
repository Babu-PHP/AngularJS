<?php
 
 include "includes/pdodbconnection.php";

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
 
 
//Here you can write your SQL queries to save the data into databases.
 
//I will just show form values here using echo which we submit using AngularJS
//echo "Name : ".$data->name."\n";
//echo "Email : ".$data->email."\n";
//echo "Username : ".$data->username."\n";
//echo "Password : ".$data->password."\n";
 
$status = 'A';
 /* $sql_insert = $db->prepare("INSERT INTO users(name, emailid, username, password, status) VALUES (:name, :emailid, :username, :password, :status)");
        $sql_insert->bindParam(':name',$data->name);
        $sql_insert->bindParam(':emailid',$data->email);
        $sql_insert->bindParam(':username',$data->username);
        $sql_insert->bindParam(':username',$data->password);
        $sql_insert->bindParam(':status',$status); */

        $sql_insert = $db->prepare("INSERT INTO users(name, emailid, username, password) VALUES (:name, :emailid, :username, :password)");
        $sql_insert->bindParam(':name',$data->name);
        $sql_insert->bindParam(':emailid',$data->email);
        $sql_insert->bindParam(':username',$data->username);
        $sql_insert->bindParam(':password',$data->password);

//print_r($sql_insert); 
//$sq = $sql_insert->debugDumpParams();
//$sq = $sql_insert->getSQL() . PHP_EOL;

$json_sql_insert = json_encode($sq);//json_encode($sql_insert);
       //$this->Print_log("sql insert: ".$json_sql_insert, "Reserve Api");
//print_r($sql_insert);
        $return_msg=0;
    try {
        if($sql_insert->execute()){
        	$return_msg=1;
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }

        echo $return_msg;//$data->name;//$json_sql_insert;
 
?>