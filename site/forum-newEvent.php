<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<form method="POST" action="addEvent.php">

    <label for="">Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g Nationals" required>
    
    <label for="">Location</label>
    <input name="location" type="text" placeholder="e.g Nelson Yacht Club" required>

    <label for="">Start Date & Time</label>
    <input name="sDateTime" type="datetime" placeholder="e.g 2025/06/2 10:43:00"  required>

    <label for="">Finish Date & Time</label>
    <input name="fDateTime" type="datetime" placeholder="e.g 2025/06/5 10:00:00"  required>

    <label for="">Description</label>
    <input name="description" type="text" minlength="1" placeholder="e.g this event is sooo cooolio" required>

    <input type="submit" value="Submit New Event">

</form>



<?php include 'partials/bottom.php'; ?>