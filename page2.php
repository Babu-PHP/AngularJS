<?php
ini_set('display_errors', '1');

function rprint($array_data){
    echo '<pre>';
    print_r($array_data);
    echo '</pre>';
} 

function Print_log($nj, $api_called) {

    date_default_timezone_set('Asia/Calcutta');
    $phone = '';
    $date1 = date('F j, Y, g:i a');
    $ip1 = $_SERVER['REMOTE_ADDR'];
    $message = $nj;

    echo $log = $date1 . ', IP: ' . $ip1 . ', API Called: ' . $api_called . PHP_EOL . "Message: " . $nj . PHP_EOL . PHP_EOL;  

    file_put_contents('logs/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);

}

Print_log('Database is Callinggg',"API Initialized");

echo '<br>kk';


        
function get_request_method(){
    $_POST['name'] = 'babu';
    $_POST['email'] = 'babu@gmail.com';
    $_POST['mob'] = '9290034486';
    $_POST['cntry'] = ['IN','USA','UK'];

    return 'POST';//$_SERVER['REQUEST_METHOD'];
}

function inputs(){
    switch(get_request_method()){
        case "POST":
            return cleanInputs($_POST);
            break;
        case "GET":
        case "DELETE":
            return cleanInputs($_GET);
            break;
        case "PUT":
            parse_str(file_get_contents("php://input"),$this->_request);
            return cleanInputs($this->_request);
            break;
        default:
            return 406;
            break;
    }
}

function cleanInputs($data){
    $clean_input = array();
    if(is_array($data)){
        foreach($data as $k => $v){
            $clean_input[$k] = cleanInputs($v);
        }
    }else{
        if(get_magic_quotes_gpc()){
            $data = trim(stripslashes($data));
        }
        $data = strip_tags($data);
        $clean_input = trim($data);
    }
    return $clean_input;
}



$inputs_data = inputs();

rprint($inputs_data);

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    echo '<br>kk4<br>';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

$validateDate = validateDate('2018-02-31 10:49:50');

rprint($validateDate);


$country_array  = array('IN','UK','USA');
$country_array_json = json_encode($country_array);
echo $country_array_json;
$country_array = json_decode($country_array_json);
rprint($country_array);

$today2 = '2020-02-12';
echo $end_month = date("Y-m-t", strtotime($today2));
?>
