<?php


// deoending if either "d" or "e" is passed through encryptDecrypt the function will decrypt/encrypt the values

function en_decrypt($stringToHandle = "",$encryptDecrypt = 'e', $ip, $api_key){

global $glob_arr;
// Set default output value
$output = null;
// Set secret keys
$secret_key = $ip; // Change this!
$secret_iv = $api_key; // Change this!
$key = hash('sha256', $secret_key) ;
$iv = substr(hash('sha256', $secret_iv ),0,16);
// Check whether encryption or decryption
if($encryptDecrypt == 'e'){
   // We are encrypting
   $output = base64_encode(openssl_encrypt($stringToHandle,"AES-256-CBC",$key,0,$iv));
}else if($encryptDecrypt == 'd'){
   // We are decrypting
   $output = openssl_decrypt(base64_decode($stringToHandle),"AES-256-CBC",$key,0,$iv);
}
// Return the final value
return $output;
}