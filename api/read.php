<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';

$database = new Database();

$conn = $database->getConnection();

$query = "SELECT customers.name AS name, TIMESTAMPDIFF(YEAR, customers.dob, CURDATE()) AS age, customers.address AS address, postcode.postcode AS postcode, postcode.state AS state
FROM customers
JOIN postcode ON customers.postcode_id = postcode.postcode_id";

$statement = $conn->prepare($query);

$statement->execute();

$customer_arr = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement->closeCursor();

echo json_encode($customer_arr);

?>