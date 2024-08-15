<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$eventID = $_GET['id'];

consoleLog($eventID);

?>

<!-------- Forum to see who is Attending -------->

<form method="POST" action="confrimPage.php">

    <label>Please enter Phone Number</label>
    <input name="phone" type="text"  placeholder="e.g 02109102664" required>
    
    <input name="id" type="hidden" value="<?=$eventID?>">
   

    <input type="submit" value="Submit">

    <div id="boatButton">
            <a href="list-events.php">Cancel</a>
        </div>

</form>



<?php include 'partials/bottom.php'; ?>