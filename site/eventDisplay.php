<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

// This grabs the event ID from the URL, need so the rest of the page works and info is grab for the proper event from the DB

$id = $_GET['id'];

$db = connectToDB(); // Another connect to DB function, need so the we can conect and send querys through (Cheers for this Sir)

// Query is querying the DB on information concerning the event with a certain ID that was grabbed earlier

$query = 'SELECT * FROM events WHERE id=?';

// Try and Catch statement to push through the above query, needed to catch any bugs that arrive during that proccess

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
    $event = $stmt->fetch(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

// Query is a joint table query that is connecting members to the event they are attending with the event ID which was grabbed earlier

$query = 'SELECT members.name
            FROM members 
            JOIN attending ON members.uid = attending.member 
            WHERE attending.event=?';

// Try and Catch statement to push above query through, needed to catch and buys that arrise during this proccess

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
    $attendees = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task 1 Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}


?>
<section id="eventMain">
<h2 style="width: 100%;text-align: center;">Events Information Display</h2>

<!-------- Container to Display Attendees and Event Information --------->

<article class="infoBox">
<h2>‎ </h2> <!----- Another one of these special characters that are invisible for reasons of insantiy, needed so that my html code became valid, this is nto bad code.  ------>
<br><b>Name: </b> <?= $event['name'] ?><br>
<br><b>Email:</b> <?= $event['location'] ?><br>
<br><b>Phone:</b> <?= $event['sDateTime'] ?><br>
<br><b>Boat: </b> <?= $event['fDateTime'] ?><br>
<br><b>Role: </b> <?= $event['description'] ?><br>
<div class="deleteButton">
<a href="eventDelete.php?id=<?=$event['id'] // This button is specific for giving the ID when the person presses Delete. Also used for as a button to delete events?>">Delete</a>
</div>
<div class="boatButton2">
            <a href="admin.php">Go Back</a>
        </div>
</article>
<section class="infoBox">
    <h2>Attendes:</h2>
    <?php
    // This code block below loops attendees and displays them, this one is need so the panel dynamic expands
    foreach($attendees as $attendee){

        echo '<p>'.$attendee['name'].'';
}; 
?>
</section>
</section>

<?php include 'partials/bottom.php'; ?>