<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$id = $_GET['id'];

$db = connectToDB();
$query = 'SELECT * FROM events WHERE id=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Passes in data
    $events = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

?>
<section id="eventMain">
<h2>Events Information Display</h2>

<section id="eventInfo">
<?php echo'<br>'; foreach($events as $event){echo 'Name: '.$event['name'].'</br>';} ;?>
<?php echo'<br>'; foreach($events as $event){echo 'Email: '.$event['location'].'</br>';} ;?>
<?php echo'<br>'; foreach($events as $event){echo 'Phone: '.$event['sDateTime'].'</br>';} ;?>
<?php echo'<br>'; foreach($events as $event){echo 'Boat: '.$event['fDateTime'].'</br>';} ;?>
<?php echo'<br>'; foreach($events as $event){echo 'Role: '.$event['description'].'</br>';} ;?>
<div id="boatButton2">
            <a href="admin.php">Go Back</a>
        </div>
</section>
</section>

<?php include 'partials/bottom.php'; ?>