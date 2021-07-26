<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$db = 'contactusform';

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

  $FullName = trim($_REQUEST['FullName']);
  $PhoneNumber = trim($_REQUEST['PhoneNumber']);
  $Email = trim($_REQUEST['Email']);


  $conn->query(query:"INSERT INTO Feedback (FullName, PhoneNumber, Email) VALUES ('$FullName', '$PhoneNumber', '$Email')");

  } else {
   $feedback = $conn->query(query:"SELECT * FROM Feedback");


   while($result = mysqli_fetch_array($feedback, MYSQLI_ASSOC)) {
    $users[] = $result;
   }
  


   echo '<pre>';
   print_r($users);
   echo '</pre>';



  }




//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';




require 'index.html';

exit;