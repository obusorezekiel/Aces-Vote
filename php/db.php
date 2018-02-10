<?php

class User{

    private $host = "";
    private $username = "";
    private $password = "";
    private $database = "";
    public $connection;

    public function __construct(){

        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_error()){
            trigger_error("Failed to connect to MYSQL " . mysqli_connect_error($connection));
        }
    }
    public function getConnection(){
        return $this->connection;
    }


    public function login($userid, $token){
        $sql = "SELECT * FROM voter WHERE user_id= '$userid' AND token = '$token'";
        $result = mysqli_query($this->connection, $sql);
        $count_row = $result->num_rows;

        if($count_row == 1){
            while($row = $result->fetch_array()){
            $_SESSION['user_id'] = $row['user_id'];
            header('Location: vote.php');
        }
    }
        else{
            return false;
        }
    }

    public function vote($userid, $president, $incoming, $vp_acad, $vp_admin, $gen_sec, $fin_sec, $ass_sec, $welfare, $itt, $ret, $mnt, $vybes, $prayer){
        $sql2 = "SELECT * FROM votes WHERE user_id='$userid'";
        $result2 = mysqli_query($this->connection, $sql2);

        if(mysqli_num_rows($result2) > 0){
            echo "<script>alert ('This user has voted already'); </script>";
            header('Location: index.php');
        }
        else{
        $sql3 = "INSERT INTO `votes` (`user_id`, `President`, `Incoming_President`,`VP_Acad`, `VP_Admin`, `Gen_Sec`, `Ass_Sec`, `Fin_Sec`, `ITT_Head`, `RET_Head`, `VYBES`, `MNT_Head`, `Welfare`, `Prayer`) VALUES ('$userid', '$president', '$incoming', '$vp_acad', '$vp_admin', '$gen_sec', '$ass_sec', '$fin_sec', '$itt', '$ret', '$vybes', '$mnt', '$welfare', '$prayer')";
        $result3 = mysqli_query($this->connection, $sql3);
        header('Location: thankyou.php');
        return true;
        }
    }

    public function admin($admin_id, $admin_pass){
        $sql_ = "SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_pass='$admin_pass'";
        $result_ = mysqli_query($this->connection, $sql_);
        
        if(mysqli_num_rows($result_) > 0){
            while($row = $result_->fetch_array()){
            $_SESSION['admin_id'] = $row['admin_id'];
            header('Location: adminindex.php');
            }
        }
        else{
            echo "<script>alert ('Invalid Admin User'); </script>";
        }
    }

    public function results(){
        $fileName = "results";
        $sqlr = "SELECT * FROM votes";
        $resultr = mysqli_query($this->connection ,$sqlr) or die("Error");
        
        $file = fopen($fileName.".csv", 'w');
    
    
        $fdata = "";
    
        while($row = mysqli_fetch_array($resultr)){
            $userid = $row['user_id'];
            $president = $row['President'];
            $incoming = $row['Incoming_President'];
            $vp_acad = $row['VP_Acad'];
            $vp_admin = $row['VP_Admin'];
            $gen_sec = $row['Gen_Sec'];
            $ass_sec = $row['Ass_Sec'];
            $fin_sec = $row['Fin_Sec'];
            $itt = $row['ITT_Head'];
            $ret = $row['RET_Head'];
            $vybes = $row['VYBES'];
            $mnthead = $row['MNT_Head'];
            $welfare = $row['Welfare'];
            $prayer = $row['Prayer'];


            $fdata = $fdata.$userid ."," . $president ."," . $incoming . ",". $vp_acad ."," . $vp_admin ."," . $gen_sec . "," . $ass_sec . "," . $fin_sec. "," . $itt. "," . $ret. "," . $vybes. "," . $mnthead. "," . $welfare. "," . $prayer."\n";
    
        } 
            fwrite($file, "S/N, President, Incoming President, Vp_Acad, Vp_Admin, Gen_Sec, Ass_Sec, Fin_Sec, ITT, RET, VYBES , MNTHead , Welfare , Prayer Cord " . "\n".$fdata);
            fclose($file);
        }

    
 
    

}




?>