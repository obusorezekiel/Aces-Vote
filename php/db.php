<?php

class User{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "aces";
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

    public function vote($userid, $president, $vp_acad, $vp_admin, $gen_sec, $fin_sec, $ass_sec, $welfare, $itt, $ret, $mnt, $vybes, $prayer){
        $sql2 = "SELECT * FROM votes WHERE user_id='$userid'";
        $result2 = mysqli_query($this->connection, $sql2);

        if(mysqli_num_rows($result2) > 0){
            echo "<script>alert ('This user has voted already'); </script>";
            header('Location: index.php');
        }
        else{
        $sql3 = "INSERT INTO `votes` (`user_id`, `President`, `VP Acad`, `VP Admin`, `Gen Sec`, `Ass Sec`, `Fin Sec`, `ITT Head`, `RET Head`, `VYBES`, `MNT Head`, `Welfare`, `Prayer`) VALUES ('$userid', '$president', '$vp_acad', '$vp_admin', '$gen_sec', '$ass_sec', '$fin_sec', '$itt', '$ret', '$vybes', '$mnt', '$welfare', '$prayer')";
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
    if(isset($_POST['export'])){
        $fileName = "results";
        $sqlr = "SELECT * FROM votes";
        $resultr = mysqli_query($this->connection ,$sqlr) or die("Error");
        
        $file = fopen($fileName.".csv", 'w');
    
    
        $fdata = "";
    
        while($row = mysqli_fetch_array($resultr)){
            $userid = $row['user_id'];
            $president = $row['President'];
            $vp_acad = $row['Vp Acad'];
            $vp_admin = $row['Vp Admin'];
            $gen_sec = $row['Gen Sec'];
            $ass_sec = $row['Ass Sec'];
            $fin_sec = $row['Fin Sec'];
            $itt = $row['ITT Head'];
            $ret = $row['RET Head'];
            $vybes = $row['VYBES'];
            $mnthead = $row['MNT Head'];
            $welfare = $row['Welfare'];
            $prayer = $row['Prayer'];


            $fdata = $fdata.$userid ."," . $president ."," . $vp_acad ."," . $vp_admin ."," . $gen_sec . "," . $ass_sec . "," . $fin_sec;
    
        } 
            fwrite($file, "Email, Phone, Game, Number " . "\n".$fdata);
            fclose($file);
        
    }
}

}




?>