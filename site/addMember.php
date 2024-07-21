<?php 
require 'lib/utils.php';

// Gets the Data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$boat = $_POST["boat"];
$role = $_POST["role"];


// Connects to DB
$db = connectToDB();
consoleLog($db);

// Query
$query = 'INSERT INTO `members` (`name`, `email`, `phone`, `boat`, `role`) VALUES (?,?,?,?,?)';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$name, $email, $phone, $boat, $role]);

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}

header('location: admin.php');

?>