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

$query = 'SELECT * FROM boats';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $boats = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

?>

<!-------- Forum to Onboard New Boat for Members -------->

<form method="POST" action="addBoat.php">

    <input name="member" type="hidden" value="<?= $memberID ?>">
    <h2>New Boat</h2>
    <label>Sail Number</label>
    <input name="sailNumber" type="text" minlength="1" placeholder="e.g (Excluding NZL) 99">

    <label>Boat Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g (Excluding NZL) 99">

    <label>Helm</label>
    <select id="helm" name="helm">
        <option>N/A</option>;
        <?php 
            foreach($members as $member){
                echo'<option>'.$member['name'].'</option>';
                
            }
        ?>
    </select>

    <label>Crew</label>
    <select id="crew" name="crew">
        <option>N/A</option>';
        <?php 
            foreach($members as $member){
                echo'<option>'.$member['name'].'</option>';
                
            }
        ?>
    </select>
    <input type="submit" value="Submit" style="margin-top: 10px;">
      
   <section id="seperateBox">
   <h2 style="text-align: center;">Please click here, if no boat</h2>        
    <div id="boatButton">
            <a href="admin.php">No Boat</a> <!------- Navigation Button ------->
        </div>     
   </section>

</form>

<?php include 'partials/bottom.php'; ?>