<?php


require 'php/db.php';

session_start();
if(isset($_POST['login'])){

    $conn = new User;
    
    
    $userid = $_POST['userid'];
    $tok = $_POST['token'];
    
    $conn->login($userid, $tok);

}
?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    
    <title>Aces Voting SoftWare 2018</title>  
</head>  
<style> 
    body{
        background-image: url("forest.jpg");
    } 
    .login-panel {  
        margin-top: 150px;  
    }
    .header
    {
    background: #4682b4;
    height:70px;
    }
    .logo
    {
    font-family:'typo';
    font-size:35px;
    color:#fff;;
    margin:15px;
    }

    .title1{
    font: 16px "Century Gothic", "Times Roman", sans-serif;
    color: #fff;
    }
    .title2{
    font-family: 'Ubuntu', sans-serif;
    font-size:20px;
}
    center h1{
        font-family: 'Saira Semi Condensed', sans-serif;
    }
</style>  
<body> 
    
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <center><h1><b>ACES | Login</b></h1></center>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" enctype="multipart/form-data" action="index.php">  
                        <fieldset>
             
                            <div class="form-group">  
                                UserID* <br/><input class="form-control" placeholder="UserID" name="userid" type="text" autofocus>
                                <span class="text-danger"></span>  
                            </div> 
                            <div class="form-group">  
                                Token Input<br/><input class="form-control" placeholder="Token" name="token" type="password" autofocus>  
                                <span class="text-danger"></span>
                            </div>
            
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Enter & Vote" name="login" >  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  