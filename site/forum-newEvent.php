<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<form method="POST" action="addEvent.php">

    <label>Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g Nationals" required>
    
    <label >Location</label>
    <input name="location" type="text" placeholder="e.g Nelson Yacht Club" required>

    <label >Start Date & Time</label>
    <input name="sDateTime" type="datetime-local"   required>

    <label >Finish Date & Time</label>
    <input name="fDateTime" type="datetime-local"   required>

    <label >Description</label>
    <input name="description" type="text" minlength="1" placeholder="e.g this event is sooo cooolio" required>

    <input type="submit" value="Submit New Event">

    <div id="boatButton">
            <a href="admin.php">Cancel</a>
        </div>


</form>



<?php include 'partials/bottom.php'; ?>