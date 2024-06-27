<?php 
require 'lib/utils.php';

// Gets the Data
$name = $_POST["name"];
$location = $_POST["location"];
$sDateTime = $_POST["sDateTime"];
$fDateTime = $_POST["fDateTime"];


// Connects to DB
$db = connectToDB();
consoleLog($db);

// Query
$query = 'INSERT INTO `events` (`name`, `location`, `sDateTime`, `fDateTime`) VALUES (?,?,?,?)';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$name,$location,$sDateTime,$fDateTime]);

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}

header('location: admin.php');

?>