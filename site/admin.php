<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<?php

// Connects to DB and sets up the query to be pushed through

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

<!------- Main Container ------->

<section class="admin">
<h2 id="adminHeader">Admin</h2>
    <article class="eventAdmin">
        <!------ Event Container ------->
        <h2 class="eventName">Events</h2>
        
        <p><b>Number of Upcoming Events: </b> <?=count($events)?></p>
        <p><b>Events:</b> 
            <?php echo'<br>'; foreach($events as $event){echo '<a class="button1" href="eventDisplay.php?id='.$event['id'].'">'. $event['name'] . '</a><br>';} ;?> 
        </p>

        <div class="eventButtons">
            <a href="forum-newEvent.php">New Event</a>
        </div>

    </article>

    <article class="eventAdmin">

        <h2 class="eventName">Members</h2>
        <!------ Member Container ------->
        <p><b>Number of Members:</b> <?=count($members)?></p>
        <p><b>Members:</b> 
             <?php echo'<br id="paddingTest">'; foreach($members as $member){echo '<a class="button1" href="memberDisplay.php?id='.$member['uid'].'">'.$member['name'] . '</a><br>';} ;?>
             
        </p>

        <div class="eventButtons">
            <a href="forum-newMember.php">New Member</a>
        </div>


    </article>


</section>



<?php include 'partials/bottom.php'; ?>