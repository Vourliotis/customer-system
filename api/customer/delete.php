<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/customer.php';

// database connection
$database = new Database();
$db = $database->getConnection();

// customer object
$customer = new Customer($db);

// customer id
$data = json_decode(file_get_contents("php://input"));

// set customer id to be deleted
$customer->id = $data->id;

// delete customer
if ($customer->deleteCustomer()) {

    // set response code - 200 ok
    http_response_code(200);

    echo json_encode(array("message" => "Customer was deleted."));
} else {

    // set response code - 503 service unavailable
    http_response_code(503);

    echo json_encode(array("message" => "Unable to delete customer."));
}
