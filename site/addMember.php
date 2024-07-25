<?php 
require 'lib/utils.php';

// Gets the Data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$role = $_POST["role"];


// Connects to DB
$db = connectToDB();
consoleLog($db);

// Query
$query = 'INSERT INTO `members` (`name`, `email`, `phone`, `role`) VALUES (?,?,?,?)';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$name, $email, $phone, $role]);
      $memberID = $db->lastInsertId();

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}

header('location: forum-boatPicker.php?member=' . $memberID);

?>