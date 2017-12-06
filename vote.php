<?php
require 'php/db.php';

session_start();

if(isset($_POST['vote'])){
    
    $cxn = new User;
    $president = $_POST['president'];
    $vp_admin = $_POST['vp_admin'];
    $vp_acad = $_POST['vp_acad'];
    $gen_sec = $_POST['gen_sec'];
    $ass_sec = $_POST['ass_sec'];
    $fin_sec = $_POST['fin_sec'];
    $welfare = $_POST['welfare'];
    $itt = $_POST['itt'];
    $ret = $_POST['ret'];
    $mnt = $_POST['mnt'];
    $vybes = $_POST['vybes'];
    $prayer = $_POST['prayer'];

    if(empty($president)){
        echo "<script> alert ('President Vote is required'); </script>";
    }
    elseif(empty($vp_admin)){
        echo "<script> alert ('VP Admin Vote is required'); </script>";
    }
    elseif(empty($vp_acad)){
        echo "<script> alert ('VP Acad Vote is required'); </script>";
    }
    elseif(empty($gen_sec)){
        echo "<script> alert ('General Secretary Vote is required'); </script>";
    }
    elseif(empty($ass_sec)){
        echo "<script> alert ('Assistant Secretary Vote is required'); </script>";
    }
    elseif(empty($fin_sec)){
        echo "<script> alert ('Fin Secretary Vote is required'); </script>";
    }
    elseif(empty($welfare)){
        echo "<script> alert ('Welfare Vote is required'); </script>";
    }
    elseif(empty($itt)){
        echo "<script> alert ('ITT Head Vote is required'); </script>";
    }
    elseif(empty($ret)){
        echo "<script> alert ('RET Head Vote is required'); </script>";
    }
    elseif(empty($vybes)){
        echo "<script> alert ('VYBES Head Vote is required'); </script>";
    }
    elseif(empty($mnt)){
        echo "<script> alert ('Maintenance Head Vote is required'); </script>";
    }
    elseif(empty($prayer)){
        echo "<script> alert ('Prayer Cordinator Vote is required'); </script>";
    }

    else {
        $cxn->vote($_SESSION['user_id'], $president, $vp_acad, $vp_admin, $gen_sec, $fin_sec, $ass_sec, $welfare, $itt, $ret, $mnt, $vybes, $prayer);        
    }

    }

?>





<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"><!--online fonts-->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"><!--online fonts-->
    
    <title>Aces Voting SoftWare 2018</title>  
</head>  
<style> 
    body{
        background-image: url("desert.jpg");
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
    center h2{
        font-family: 'Saira Semi Condensed', sans-serif;
    }
</style>  
<body> 
    
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <center><h2><b>Number <?php echo $_SESSION['user_id']; ?></b></h2></center>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="vote.php">
                        <fieldset>
             
                        <div class="form-group">  
                        President* <br/><select class="form-control" placeholder="Employment status" name="president" type="" autofocus>
                            <option value="">Select...</option>
                            <option value="Student">Student</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Worker">Worker</option>
                        </select>  
                    </div> 
                    <div class="form-group">  
                        Vice President Administration* <br/><select class="form-control" placeholder="Marital Status" name="vp_admin" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>   
                    <div class="form-group">  
                        Vice President Academics* <br/><select class="form-control" placeholder="Employment status" name="vp_acad" type="" autofocus>
                            <option value="">Select...</option>
                            <option value="Student">Student</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Worker">Worker</option>
                        </select>  
                     </div> 
                    <div class="form-group">  
                        General Secretary* <br/><select class="form-control" placeholder="Marital Status" name="gen_sec" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                     </div>  
                     <div class="form-group">  
                        Assistant Secretary/Treasurer* <br/><select class="form-control" placeholder="Employment status" name="ass_sec" type="" autofocus>
                            <option value="">Select...</option>
                            <option value="Student">Student</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Worker">Worker</option>
                        </select>  
                    </div> 
                    <div class="form-group">  
                        Financial Secretary* <br/><select class="form-control" placeholder="Marital Status" name="fin_sec" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>    
                    <div class="form-group">  
                        Director of Welfare* <br/><select class="form-control" placeholder="Employment status" name="welfare" type="" autofocus>
                            <option value="">Select...</option>
                            <option value="Student">Student</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Worker">Worker</option>
                        </select>  
                    </div> 
                    <div class="form-group">  
                        ITT Head* <br/><select class="form-control" placeholder="Marital Status" name="itt" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>   
                    <div class="form-group">  
                        RET Head* <br/><select class="form-control" placeholder="Employment status" name="ret" type="" autofocus>
                            <option value="">Select...</option>
                            <option value="Student">Student</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Worker">Worker</option>
                        </select>  
                    </div> 
                    <div class="form-group">  
                        Maintenance Head* <br/><select class="form-control" placeholder="Marital Status" name="mnt" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>   
                    <div class="form-group">  
                        VYBES Head* <br/><select class="form-control" placeholder="Marital Status" name="vybes" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>   
                    <div class="form-group">  
                        Prayer Cordinator* <br/><select class="form-control" placeholder="Marital Status" name="prayer" type="email" autofocus> 
                            <option value="">Select...</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select> 
                    </div>   
            
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Enter" name="vote" >  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  