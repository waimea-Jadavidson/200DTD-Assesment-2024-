<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<form method="POST" action="addMember.php">

    <label >Name</label>
    <input name="name" type="text" minlength="1" placeholder="e.g Dave Gibb" required>
    
    <label >Email</label>
    <input name="email" type="email" placeholder="Jasper75740@gmail.com" required>

    <label >Phone</label>
    <input name="phone" type="tel" placeholder="02109102664"  required>

    <label >Role</label>
    <input name="role" type="text" minlength="1" placeholder="Helm or Crew" required>

    <input type="submit" value="Submit New Member">

    <div id="boatButton">
            <a href="admin.php">Cancel</a>
        </div>


</form>

<?php include 'partials/bottom.php'; ?>