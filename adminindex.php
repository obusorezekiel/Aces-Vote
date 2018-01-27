<?php

session_start();

?>
Welcome <?php $_SESSION['admin_id'];?><br/>
<a href="adminlogout.php">Logout</a>
