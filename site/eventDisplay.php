<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$id = $_GET['id'];

$db = connectToDB();
$query = 'SELECT * FROM events WHERE id=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
    $event = $stmt->fetch(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

consoleLog($event);

$query = 'SELECT members.name
            FROM members 
            JOIN attending ON members.uid = attending.member 
            WHERE attending.event=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
    $attendees = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task 1 Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

consoleLog($attendees);

?>
<section id="eventMain">
<h2 style="width: 100%;text-align: center;">Events Information Display</h2>

<!-------- Container to Display Attendees and Event Information --------->

<article class="infoBox">
<h2>‎ </h2>
<br><b>Name: </b> <?= $event['name'] ?><br>
<br><b>Email:</b> <?= $event['location'] ?><br>
<br><b>Phone:</b> <?= $event['sDateTime'] ?><br>
<br><b>Boat: </b> <?= $event['fDateTime'] ?><br>
<br><b>Role: </b> <?= $event['description'] ?><br>
<div class="deleteButton">
<a href="eventDelete.php?id=<?=$event['id']?>">Delete</a>
</div>
<div class="boatButton2">
            <a href="admin.php">Go Back</a>
        </div>
</article>
<section class="infoBox">
    <h2>Attendes:</h2>
    <?php

    foreach($attendees as $attendee){

        echo '<p>'.$attendee['name'].'';
}; 
?>
</section>
</section>

<?php include 'partials/bottom.php'; ?>