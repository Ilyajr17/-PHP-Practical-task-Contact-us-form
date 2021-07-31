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
  $commethod = $_REQUEST['commethod'];
  $Message = $_REQUEST['Message'];
  $file = $_REQUEST['file'];
  $mes = $_REQUEST['mes'];
  //$adult = $_REQUEST['adult'];
  if (array_key_exists('adult', $_REQUEST)) {
    $adult = true;
  } else {
    $adult = false;
  }



  $conn->query(query: "INSERT INTO Feedback (FullName, PhoneNumber, Email, commethod, Message, file, mes, adult) VALUES ('$FullName', '$PhoneNumber', '$Email', '$commethod', '$Message', '$file', '$mes', '$adult')");
}
$feedback = $conn->query(query: "SELECT * FROM Feedback");







while ($result = mysqli_fetch_array($feedback, MYSQLI_ASSOC)) {
  $users[] = $result;
}






$mode = isset($_REQUEST['mode']) ?  $_REQUEST['mode'] : false;

if ($mode === 'list') {
  require 'list.html';
} else {
  require 'index.html';
}


exit;
