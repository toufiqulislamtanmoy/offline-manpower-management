<?php
class Test{

    private $conn;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "manpowerbd";
        $this->conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
        if (!$this->conn) {
        } else {
            echo "<script>
                console.log('Connection successful');
            </script>";
        }
    }

    function user_count()
    {
        $query = "SELECT count(*) as user_count FROM usersignup";
        $user_counter = mysqli_query($this->conn, $query);
    
        if ($user_counter) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($user_counter);
    
            // Return the user count as an integer
            return (int) $row['user_count'];
        } else {
            return 0;
        }
    }
    

    function worker_count()
{
    $query = "SELECT count(*) as worker_count FROM workersignup";
    $worker_counter = mysqli_query($this->conn, $query);

    if ($worker_counter) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($worker_counter);

        // Return the user count as an integer
        return (int) $row['worker_count'];
    } else {
        return 0;
    }
}











}


?>