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

<h1 id="eventHeader">Events</h1>


<section id="events">
        <?php
            foreach($events as $event){
                echo '<article class="event">';
                    
                    echo '<h2 class=eventName>'.$event['name'].'</h2>';
                    echo '<p>Event Name: '.$event['name'].'</p>';
                    echo '<p>Event Location: '.$event['location'].'</p>';
                    echo '<p>Event Date: '.$event['sDateTime'].' to '.$event['fDateTime'].'</p>';
                    echo '<p>Event Description: '.$event['description'].'</p>';

                    echo '<div id="eventButtons">';
                        echo '<a href="confrimPage.php?id='.$event['id'].'">Confrim</a>';
                    echo '</div>';
                echo '</article>';
            }
        ?>
</section>


<?php include 'partials/bottom.php'; ?>