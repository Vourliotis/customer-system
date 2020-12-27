<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../models/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

$test = file_get_contents("php://input");
var_dump($test);
$data = json_decode($test);
var_dump($data);

// check to see if data is not empty
if (
    !empty($data->fname) &&
    !empty($data->lname) &&
    !empty($data->pnumber) &&
    !empty($data->email) &&
    !empty($data->category)
) {

    $customer->fname = $data->fname;
    $customer->lname = $data->lname;
    $customer->pnumber = $data->pnumber;
    $customer->email = $data->email;
    $customer->category = $data->category;

    // create the customer
    if ($customer->createCustomer()) {

        // set response code - 200 created
        http_response_code(200);

        echo json_encode(array("message" => "Customer was created."));
    }

    // error codes
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        echo json_encode(array("message" => "Unable to create customer."));
    }
}

// incomplete
else {
    // set response code - 400 bad request
    http_response_code(400);

    echo json_encode(array("message" => "Unable to create customer. Data is incomplete."));
}
