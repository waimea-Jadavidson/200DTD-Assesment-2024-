<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$eventID = $_GET['id'];

consoleLog($eventID);

?>

<form method="POST" action="confrimPage.php">

    <label for="">Please enter Phone Number</label>
    <input name="phone" type="text" minlength="1" placeholder="e.g 54" required>
    
    <input name="id" type="hidden" minlength="1" placeholder="e.g 54" required value="<?=$eventID?>">
   

    <input type="submit" value="Submit">

    <div id="boatButton">
            <a href="admin.php">Cancel</a>
        </div>

</form>



<?php include 'partials/bottom.php'; ?>