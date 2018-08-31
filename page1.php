<?php

//print_r($_SERVER);

function getheaderData(){
	foreach($_SERVER as $name => $value) 
    { 
        if (substr($name, 0, 5) == 'HTTP_') 
        { 
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
        } 
    } 
    return $headers; 
}
function rprint($array_data){
	echo '<pre>';
	print_r($array_data);
	echo '</pre>';
} 


$headers_data = getheaderData();

rprint($headers_data);


/* function getallheaders() 
{ 
    $headers = ''; 
    foreach ($_SERVER as $name => $value) 
    { 
        if (substr($name, 0, 5) == 'HTTP_') 
        { 
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
        } 
    } 
    return $headers; 
} 

 function rprint($array_data){
	echo '<pre>';
	print_r($array_data);
	echo '</pre>';
} 
//$headers_data = getallheaders();

//rprint($headers_data);

echo '<pre>';
print_r($headers_data);
echo '</pre>'; */
?>
