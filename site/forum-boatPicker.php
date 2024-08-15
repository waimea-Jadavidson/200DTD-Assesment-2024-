<?php 
require 'lib/utils.php';
include 'partials/top.php';

// Code Below need for getting members ID so Form will work XD

$memberID = $_GET['member'] ?? null;
if($memberID == null) die('missing member ID');

// Connects to DB and querys the member table so member information can be used for the boat picking form

$db = connectToDB();
$query = 'SELECT * FROM members';

// Try and Catch Statement that pushes the query to the Database, don't screw with this

try{
    $stmt = $db->prepare($query);
    $stmt->execute([]); // Passes in data
    $members = $stmt->fetchAll(); // Fetches only one
} catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Task fetching Error', ERROR);
    die("ERROR ERROR ERROR, Error Fetching Data");
}

// Same as the members query, querys all the boats so they can listed. Also do not mess with this

$query = 'SELECT * FROM boats';

// Pushes query through, try and catch statement to catch errors and not crash the webpage

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

    <input name="member" type="hidden" value="<?= $memberID ?>"> <!----- $memberID grabs the ID so it can be sent as a hidden value through  ------>
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
                // Code above loops through each member to create a dropdown box of all the members and expands dynamicly
            }
        ?>
    </select>

    <label>Crew</label>
    <select id="crew" name="crew">
        <option>N/A</option>';
        <?php 
            foreach($members as $member){
                echo'<option>'.$member['name'].'</option>';
                // Same code block as above, therfore same comment
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