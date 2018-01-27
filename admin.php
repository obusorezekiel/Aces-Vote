<?php
require 'php/db.php';

session_start();
if(isset($_POST['adminlogin'])){

    $conn = new User;
    
    
    $admin_id = $_POST['admin'];
    $admin_pass = $_POST['pass'];
    
    $conn->admin($admin_id, $admin_pass);

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ADMIN Results</title>
</head>
<body>
<fieldset>
    <form action="admin.php" method="POST">
        Admin ID:<input name="admin" type="text" placeholder="Enter your admin login details"><br/>
        Password:<input name="pass" type="password" placeholder="Enter your password"><br/>
        <input type="submit" value="Admin_Login" name="adminlogin">

    </form>

</fieldset>
