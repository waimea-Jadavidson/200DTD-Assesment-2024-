<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<?php

// Query and connects to DB, need to display all the events to the Class Members (Cheers Mr Copley for the DB Function)

$db = connectToDB();
$query = 'SELECT * FROM events';

// Try and Catch Statement to push query through, catches any web breaking errors

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $events = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}
?>


<!------ Displays all events within Separate Containers ------->

<section id="events">
<h2 id="eventHeader">Events</h2>
        <?php
            // This code block is need to display the all the events in the DB with correct information. Expands dynamicly
            foreach($events as $event){
                echo '<article class="event">';
                    
                    echo '<h2 class=eventName>'.$event['name'].'</h2>';
                    echo '<p><b>Event Location:</b> '.$event['location'].'</p>';
                    echo '<p><b>Event Date:</b> '.$event['sDateTime'].' to '.$event['fDateTime'].'</p>';
                    echo '<p><b>Event Description:</b> '.$event['description'].'</p>';

                    echo '<div class="eventButtons">';
                        echo '<a href="forum-attending.php?id='.$event['id'].'">Confrim</a>';
                    echo '</div>';
                echo '</article>';
            }
        ?>
</section>

<div id="boatButton3"> <!----- Navigation Button ------>
            <a href="index.php">Go Back</a>
        </div>

<?php include 'partials/bottom.php'; ?>