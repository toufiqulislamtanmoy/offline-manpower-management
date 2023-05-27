<?php 

class ManageUser{
    private $conn;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "manpowerbd";
        $this->conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
        if (!$this->conn) {
?>
            <script>

            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Connection Successfull");
            </script>
        <?php

        }
    }

    // Display all the worker in to user interface
    
    function displayWorkerInUserInterFace(){
        $query = "SELECT *FROM workersignup";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
        }else{
            return "An Error Occur";
        }
    }
}


?>