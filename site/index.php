<?php 
require 'lib/utils.php';
include 'partials/top.php'; ?>

<?php
$db = connectToDB();
?>

<homeImage>
    <img src="devImages/nzfda_header.jpg" alt="">
</homeImage>

<eventsList>
    <a id="eventButton"href="list-events.php">Events List</a>
</eventsList>


<?php include 'partials/bottom.php'; ?>