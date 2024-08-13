<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$uid = $_GET['id'];

$db = connectToDB();
$query = 'SELECT * FROM members WHERE uid=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$uid]); // Passes in data
    $members = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

?>
<section id="memberMain">
<h2 style="width: 100%;text-align: center;">Members Information Display</h2>

<section id="memberInfo">
<?php echo'<br>'; foreach($members as $member){echo '<b>Name:  </b>'.$member['name'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Email: </b> '.$member['email'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Phone: </b> '.$member['phone'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Boat:  </b>'.$member['boat'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Role:  </b>'.$member['role'].'</br>';} ;?>
<div class="deleteButton">
    <a href="memberDelete.php?id=<?=$member['uid']?>">Delete</a>
</div>
<div class="boatButton2">
            <a href="admin.php">Go Back</a>
        </div>
</section>
</section>
<?php include 'partials/bottom.php'; ?>