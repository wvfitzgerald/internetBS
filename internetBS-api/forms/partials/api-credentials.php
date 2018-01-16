<?php
/**
 * Checking api credentials and setting defaults if needed
 */

$check_api_key = get_option('internet_api_key');
if($check_api_key == ''){
    $api_key = "testapi";
    $api_pass = "testpass";
    $api_url = "https://testapi.internet.bs";
}else{
    $api_key = $check_api_key;
    $api_pass = get_option('internet_pass');
    $api_url = "https://api.internet.bs";
}
?>