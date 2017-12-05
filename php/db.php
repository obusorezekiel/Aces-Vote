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
        $sql2 = "INSERT INTO `votes` (`user_id`, `President`, `VP Acad`, `VP Admin`, `Gen Sec`, `Ass Sec`, `Fin Sec`, `ITT Head`, `RET Head`, `VYBES`, `MNT Head`, `Welfare`, `Prayer`) VALUES ('$userid', '$president', '$vp_acad', '$vp_admin', '$gen_sec', '$ass_sec', '$fin_sec', '$itt', '$ret', '$vybes', '$mnt', '$welfare', '$prayer')";
        $result2 = mysqli_query($this->connection, $sql2);
        header('Location: thankyou.php');
        return true;

    }



}




?>