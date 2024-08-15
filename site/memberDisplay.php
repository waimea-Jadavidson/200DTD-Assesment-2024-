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
<section id="memberMain"> <!------- This box Display member information from the database ------->
<h2 style="width: 100%;text-align: center;">Members Information Display</h2>

<section id="memberInfo">
<h2>‎ </h2> <!---- Special Character ;) :), you might have to google what it is (Hint, its in invisble character as a workaround for stupid HTML Validation. Could remove but then html is not valid because the section would not have a h2-h6 tag as a header) ------->

<!----- Code block below is not needed and unessecary but does the JOB. IT displays the memebrs info like once so I don't know why its in a for each loop. Very inefficent but hell it works ------>

<?php echo'<br>'; foreach($members as $member){echo '<b>Name:  </b>'.$member['name'].'<br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Email: </b> '.$member['email'].'<br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Phone: </b> '.$member['phone'].'<br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Boat:  </b>'.$member['boat'].'<br>';} ;?>
<?php echo'<br>'; foreach($members as $member){echo '<b>Role:  </b>'.$member['role'].'<br>';} ;?>
<div class="deleteButton">
    <a href="memberDelete.php?id=<?=$member['uid'] // This executes the code needed to delete members, its a button as well :)?>">Delete</a>
</div>
<div class="boatButton2"> <!---- Navigation Button ----->
            <a href="admin.php">Go Back</a>
        </div>
</section>
</section>
<?php include 'partials/bottom.php'; ?>