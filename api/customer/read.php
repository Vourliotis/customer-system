<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../models/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

// query customers
$stmt = $customer->getCustomers();
$num = $stmt->rowCount();

// check if more than 0 records are found
if ($num > 0) {

    // customers array
    $customers_arr = array();
    $customers_arr["records"] = array();

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // $row['fname'] to $fname
        extract($row);

        $customer_item = array(
            "id" => $id,
            "fname" => $fname,
            "lname" => $lname,
            "pnumber" => $pnumber,
            "email" => $email,
            "category" => $category,
        );

        array_push($customers_arr["records"], $customer_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show customer data in json format
    echo json_encode($customers_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    echo json_encode(
        array("message" => "No customers found.")
    );
}
