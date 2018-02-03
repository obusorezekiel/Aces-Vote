<?php

require 'php/db.php';
session_start();

$conn = new User();

$conn->results();
echo "<p><a href=results.csv>Click Here to download ACES 2017/2018 results</a></p>"; 

?>
Welcome <?php echo $_SESSION['admin_id'];?><br/>
<a href="adminlogout.php">Logout</a><br/><br/>
