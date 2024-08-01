<?php 
require 'lib/utils.php';
include 'partials/top.php';

// Gets the Data
$mobile = $_POST["phone"];
$event = $_POST['id'];

consoleLog($_POST);

$mobile = str_replace(' ', '', $mobile);


// Connects to DB
$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM members WHERE phone='.$mobile.'';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $user = $stmt->fetch(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

if ($user == false) {
    die("BAD");
};

$member = $user['uid'];

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