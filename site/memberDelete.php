<?php 
require 'lib/utils.php';
include 'partials/top.php';

$uid = $_GET['id'];

consoleLog($uid);

$db = connectToDB();

$query = 'DELETE FROM members WHERE uid=?';

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