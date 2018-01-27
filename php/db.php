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
            $_SESSION['admin_id'] = $row['admin_id'];
            header('Location: adminindex.php');
        }
        else{
            echo "<script>alert ('Invalid Admin User'); </script>";
        }
    }



}




?>