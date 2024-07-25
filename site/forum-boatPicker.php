<?php 
require 'lib/utils.php';
include 'partials/top.php';

$memberID = $_GET['member'] ?? null;
if($memberID == null) die('missing member ID');

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

?>

<form method="POST" action="addBoat.php">

    <input name="member" type="hidden" value="<?= $memberID ?>">

    <label for="">Sail Number</label>
    <input name="sailNumber" type="text" minlength="1" placeholder="e.g (Excluding NZL) 99" required>

    <label for="">Boat Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g (Excluding NZL) 99" required>
    
    <label for="">Helm</label>
    <select id="helm" name="helm">
        <?php 
            foreach($members as $member){
                echo'<option value"helm">'.$member['name'].'</option>';
            }
        ?>
    </select>

    <label for="">Crew</label>
    <select id="crew" name="crew">
        <?php 
            foreach($members as $member){
                echo'<option value"crew">'.$member['name'].'</option>';
            }
        ?>
    </select>

    <input type="submit" value="Submit">

</form>

<?php include 'partials/bottom.php'; ?>