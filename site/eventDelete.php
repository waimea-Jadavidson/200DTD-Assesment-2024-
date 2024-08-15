<?php 
require 'lib/utils.php';
include 'partials/top.php';

// Grabs the ID from the event display page, need so I know which event to delete from the DB

$id = $_GET['id'];


$db = connectToDB(); // Mr Copleys goated DB connect function so I can connect to the DB to delete or add things

// This query querys life but also its need to delete events from the event table where the ID is == to the one in the URL which is from the previous page

$query = 'DELETE FROM events WHERE id=?';

// Try and Catch statement to push through above query

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB delete Error', ERROR);
    die("ERROR ERROR ERROR, Error Deleting Member");
}

header("location: admin.php");

?>

<?php include 'partials/bottom.php'; ?>