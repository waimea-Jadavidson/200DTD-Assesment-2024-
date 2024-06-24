<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<?php
$db = connectToDB();
$query = 'SELECT * FROM members';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $members = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

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

<h1 id="adminHeader">Admin</h1>

<section class="admin">

    <article class="eventAdmin">

        <h2 class="eventName">Events</h2>
        
        <p>Number of Upcoming Events: <?=count($events)?></p>
        <p>Events: <?php echo'<br>'; foreach($events as $event){echo $event['name'] . '<br>';} ;?></p>

        <div id="eventButtons">
            <a href="forum-newEvent.php">New Event</a>
        </div>

    </article>

    <articles class="eventAdmin">

        <h2 class="eventName">Members</h2>

        <p>Number of Members: <?=count($members)?></p>
        <p>Members: <?php echo'<br>'; foreach($members as $member){echo $member['name'] . '<br>';} ;?></p>

        <div id="eventButtons">
            <a href="forum-newMember.php">New Member</a>
        </div>


    </article>


</section>



<?php include 'partials/bottom.php'; ?>