<?php

session_start();

?>
Welcome <?php echo $_SESSION['admin_id'];?><br/>
<a href="adminlogout.php">Logout</a>
