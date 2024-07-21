<?php 
require 'lib/utils.php';
include 'partials/top.php';

// Gets the Data
$member = $_POST["uid"];
$event = $_POST['id'];

// Connects to DB
$db = connectToDB();
consoleLog($db);

// Query
$query = 'INSERT INTO `attending` (`event`, `member`) VALUES (?,?)';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$event, $member]);

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}

header('location: list-events.php');

?>



<?php include 'partials/bottom.php'; ?>