<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../config/database.php';

$db = new Database();

$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$dob = $data['dob'];
$address = $data['address'];
$postcode = $data['postcode'];

// Get postcode_id
$postcode_query = "SELECT postcode_id FROM postcode WHERE postcode = :postcode";
$postcode_statement = $conn->prepare($postcode_query);
$postcode_statement->bindParam(':postcode', $postcode);
$postcode_statement->execute();
$result = $postcode_statement->fetch();
$postcode_id = null;

if ($result) {
    $postcode_id = $result['postcode_id'];
}


// Insert data into customers table
$query = "INSERT INTO customers (name, dob, address, postcode_id) VALUES (:name, :dob, :address, :postcode_id)";


$statement = $conn->prepare($query);

$statement->bindParam(':name', $name);
$statement->bindParam(':dob', $dob);
$statement->bindParam(':address', $address);
$statement->bindParam(':postcode_id', $postcode_id);

if ($statement->execute()) {
    http_response_code(201);
    echo json_encode(["status" => "success", "message" => "SUCCESS: has been added to the database successfully"]);
} else {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Unable to process request"]);
}

?>
