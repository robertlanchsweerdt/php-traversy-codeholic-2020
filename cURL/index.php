<?php

// SET URL
$url = 'https://jsonplaceholder.typicode.com/posts';

// INITIATE CONNECTION WITH NETWORK RESOURCE
$resource = curl_init();

// SET OPTIONS
$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => TRUE
];

// SET OPTIONS ON THE RESOURCE
curl_setopt_array($resource, $options);

// EXECUTE THE CONNECTION
// THIS WILL RETURN A RESULT AS AN ARRAY
$result = curl_exec($resource);

// GET MULTIPLE INFO ON THE RESPONSE
$result_info = curl_getinfo($resource);
print_r($result_info);

// GET JUST THE HTTP CODE
$status_code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
echo "HTTP STATUS CODE:" . $status_code . '</br>';

// CLOSE THE CONNECTION
curl_close($resource);

$arr = json_decode($result);

echo $result;

// CREATE POST

$url = "https://jsonplaceholder.typicode.com/users";

$userInfo = [
    'name' => 'Teddy Roosevelt',
    'username' => 'Big Bear',
    'email' => 'tdog@someemail.com'
];

$handle = curl_init();

$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_POST => TRUE,
    CURLOPT_HTTPHEADER => [
        'content-type: application/json'
    ],
    CURLOPT_POSTFIELDS => json_encode($userInfo)
];

curl_setopt_array($handle, $options);

$result = curl_exec($handle);

$status_code = curl_getinfo($handle,CURLINFO_HTTP_CODE );
echo $status_code;

if($status_code !== 200 && $status_code !== 201){
    echo "There was an error";
} else {
    echo "Processing";
    curl_close($handle);
    
    echo $result;

}