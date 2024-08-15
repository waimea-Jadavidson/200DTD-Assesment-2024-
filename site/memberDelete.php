<?php 
require 'lib/utils.php';
include 'partials/top.php';

// The pure uses of this page is to delete members from the DB


// Gets UID of the member being deleted
$uid = $_GET['id'];

// Connects to DB
$db = connectToDB();

// Exists because I need to delete members from the attending table first, due to foriegn key restraints. DO NOT remove this

$query = 'DELETE FROM attending WHERE member=?';

// Pushes above query through, catches any web breaking errors

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$uid]); // Passes in data
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB delete Error', ERROR);
    die("ERROR ERROR ERROR, Error Deleting Member");
}

// After deleting member from the attending table, this query deletes members from member table

$query = 'DELETE FROM members WHERE uid=?';

// Same as the other codeblock above

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$uid]); // Passes in data
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB delete Error', ERROR);
    die("ERROR ERROR ERROR, Error Deleting Member");
}

header("location: admin.php");

?>

<?php include 'partials/bottom.php'; ?>