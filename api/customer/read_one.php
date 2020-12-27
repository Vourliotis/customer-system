<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

// set ID property of record to read
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of customer to be edited
$customer->getSingleCustomer();

if ($customer->fname != null) {
    // create array
    $customer_arr = array(
        "id" => $customer->id,
        "fname" => $customer->fname,
        "lname" => $customer->lname,
        "pnumber" => $customer->pnumber,
        "email" => $customer->email,
        "category" => $customer->category,

    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($customer_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    echo json_encode(array("message" => "Customer does not exist."));
}
