<?php
class Main{
    private $conn;
    function __construct()
    {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="manpowerbd";
        $this->conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
        if(!$this->conn){
            ?>
            <script>
                alart("Conncton Faild") ;
            </script>
            <?php
        }else{
            ?>
            <script>
            
                alart("Connection Successfull") ;
                window.location.replace('ulogin.php');
            </script>
            <?php
            
        }
    }

    function login($data){
        $userEmail = $data['email'];
        $userPassword= $data['password'];
        $query="SELECT * FROM usersignup where  userEmail='$userEmail' AND userPassword='$userPassword'";
        $loginInfo=mysqli_query($this->conn,$query);
        if (!$loginInfo || mysqli_num_rows($loginInfo) == 0) {
            ?>
            <script>
                alert('Enter Valid Username or Password');
            </script>
            <?php
        } else {
            while ($row = mysqli_fetch_assoc($loginInfo)) {
                echo "<script>window.location.replace('user/home.php');</script>";
            }
        }
    }
    
}

?>