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
<h2>Members Information Display</h2>

<section id="memberInfo">
<?php echo'<br>'; foreach($members as $member){echo 'Name: '.$member['name'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo 'Email: '.$member['email'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo 'Phone: '.$member['phone'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo 'Boat: '.$member['boat'].'</br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo 'Role: '.$member['role'].'</br>';} ;?>
<div class="boatButton2">
            <a href="admin.php">Go Back</a>
        </div>
<div class="boatButton2">
    <a href="memberDelete.php?id=<?=$member['uid']?>">Delete</a>
</div>
</section>
</section>
<?php include 'partials/bottom.php'; ?>