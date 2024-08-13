<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<?php
$db = connectToDB();
$query = 'SELECT * FROM events';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $events = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}
?>




<section id="events">
<h2 id="eventHeader">Events</h2>
        <?php
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

<div id="boatButton3">
            <a href="index.php">Go Back</a>
        </div>

<?php include 'partials/bottom.php'; ?>