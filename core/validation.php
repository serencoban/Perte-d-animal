<?php
die(__DIR__);

$message = require '../lang/fr/validation.php';
function check_required(string $field_name) : bool
{
    global $message;
    if (!array_key_exists($field_name,$_REQUEST)) {
        $_SESSION['errors'][$field_name] = sprintf ($message['required'], $field_name);
    return false;
}
    return true;
}

if (trim($_REQUEST[$field_name]) == '') {
    $_SESSION['errors'][$field_name] = sprintf ($message['required'], $field_name);
    return false;
}
return true;

function check_email(string $field_name) : bool
{
    if (check_required($field_name)) {
        global $message;
        if (!filter_var($_REQUEST[$field_name], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$field_name] = sprintf ($message['email'], $field_name);
        }
    }
}
function check_phone(string $field_name) : bool
{
    if (!isset($_REQUEST[$field_name])|| trim($_REQUEST[$field_name])===''){
        return false;
    }

    global $message;
    if (strlen($_REQUEST[$field_name])< 9){
        $_SESSION['errors'][$field_name] = sprintf($message['phone'],$field_name);
        return false;
    }

    if (is_numeric()
}
if(!function_exists('check_same')){
    function check_same(string $verification_field_name, string $original_field_name):bool
    {


    }

}

if (!function_exists('check_in_collection')){
    function check_in_collection(string $item_field_name, string $original_field_name, array $collection):bool
    {

    }
}
