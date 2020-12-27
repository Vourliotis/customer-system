<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

// get id of customer to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of custp,er to be edited
$customer->id = $_GET['id'];

$customer->fname = $data->fname;
$customer->lname = $data->lname;
$customer->pnumber = $data->pnumber;
$customer->email = $data->email;
$customer->category = $data->category;

// update customer
if ($customer->updateCustomer()) {

    // set response code - 200 ok
    http_response_code(200);

    echo json_encode(array("message" => "Customer was updated."));
} else {

    // set response code - 503 service unavailable
    http_response_code(503);

    echo json_encode(array("message" => "Unable to update customer."));
}
