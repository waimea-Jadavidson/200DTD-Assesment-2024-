<?php 
require 'lib/utils.php';
include 'partials/top.php';

// Gets the Data
$sailNumber = $_POST['sailNumber'];
$name = $_POST['name'];
$helm = $_POST['helm'];
$crew = $_POST['crew'];
$uid = $_POST['member'];


// Connects to DB
$db = connectToDB();
consoleLog($db);

$query = 'UPDATE `members` SET `boat`=? WHERE id=?';

// Error Catching and sending and requesting Data
try {
      $stmt = $db->prepare($query);
      $stmt->execute([$boat, $uid]);

} catch (PDOException $e) {
    consoleLog($_POST, 'POST Data');
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die("ERROR ERROR ERROR, can you spot the difference?");
}


header('location: admin.php');
?>



<?php include 'partials/bottom.php'; ?>