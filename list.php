<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db = 'contactusform';

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

$itemsPerPage = 3;

$ofset = ($currentPage * $itemsPerPage) - $itemsPerPage;

$feedback = $conn->query(query: "SELECT * FROM Feedback limit $ofset, $itemsPerPage");

$nextPage = $currentPage + 1;

$prePage = $currentPage - 1;



while ($result = mysqli_fetch_array($feedback, MYSQLI_ASSOC)) {
    $users[] = $result;
}





require 'list.html';

exit;
