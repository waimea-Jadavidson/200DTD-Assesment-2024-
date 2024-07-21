<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<form method="POST" action="addMember.php">

    <label for="">Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g Dave Gibb" required>
    
    <label for="">Email</label>
    <input name="email" type="email" placeholder="Jasper75740@gmail.com" required>

    <label for="">Phone</label>
    <input name="phone" type="tel" placeholder="02109102664"  required>

    <label for="">Boat</label>
    <input name="boat" type="text" placeholder= "Sail Number(excluding NZL)"  required>

    <label for="">Role</label>
    <input name="role" type="text" minlength="1" placeholder="Helm or Crew" required>

    <input type="submit" value="Submit New Member">

</form>

<?php include 'partials/bottom.php'; ?>