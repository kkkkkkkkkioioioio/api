<?php 
ini_set("max_execution_time", "300");

$data1 = '{"Account":"test1","Password":"test1"}';
// $data_string = json_encode($data);

$ch = curl_init('127.0.0.1/v1/user/create/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data1))
);
$result = curl_exec($ch);
print_r($result);
?>
