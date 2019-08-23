<?php

$result = [];

$result["ip"] = $_SERVER['REMOTE_ADDR'];
$result["method"] = $_SERVER['REQUEST_METHOD'];
$result["uri"] = $_SERVER['REQUEST_URI'];
$result["timestamp"] = time();
$result["time_str"] = date("Y-m-d h:i:sa");

// getallheaders may miss in php-fpm
if (!function_exists('getallheaders')) {
    function getallheaders() {
    $headers = [];
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
    }
}

// get all headers
$result["your_headers"] = [];
foreach (getallheaders() as $key => $value) {
    $result["your_headers"][$key] = $value;
}

// get body
$entityBody = file_get_contents('php://input');
if (array_key_exists("Content-Type", $result["your_headers"]) &&
    $result["your_headers"]["Content-Type"] == "application/json") {
    $result["your_body"] = json_decode($entityBody);
} else {
    $result["your_body"] = $entityBody;
}

header('Content-type: application/json');
echo(json_encode($result));
