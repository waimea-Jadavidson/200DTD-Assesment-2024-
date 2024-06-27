<?php 
require 'lib/utils.php';

// Gets the Data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$time = $_POST["time"];
$service = $_POST["service"];

// Connects to DB
$db = connectToDB();
consoleLog($db);

// Query
$query = 'INSERT INTO `bookings` (`name`, `email`, `phone`, `date`, `time`, `service`) VALUES (?,?,?,?,?,?)';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$name, $email, $phone, $date, $time, $service]);

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}

header('location: index.php');

?>