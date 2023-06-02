<?php

class ManageUser
{
    public $conn;
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

    function displayWorkerInUserInterFace()
    {
        $query = "SELECT *FROM workersignup";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result;
        } else {
            return "An Error Occur";
        }
    }

    //Display a single worker profile to the user

    function viewWorkerProfile($data)
    {
        $workerId = $data['id'];
        $query = "SELECT worker_full_name, worker_photo, present_address, workerType,gender FROM workersignup WHERE worker_id =$workerId";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($result);

            // Free the result set
            mysqli_free_result($result);

            // Return the retrieved data
            return $row;
        } else {
            // Handle query error and set an alert message
            $errorMessage = "Error executing the query: " . mysqli_error($this->conn);
            echo '<script>alert("' . $errorMessage . '");</script>';

            return null; // or return an appropriate error indicator
        }
    }

    // pagination 

    function pagination()
    {
        $query = "SELECT *FROM workersignup";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $total_record = mysqli_num_rows($result);
            $limit = 8;
            $totalPage = ceil($total_record / $limit);
            return $totalPage;
        }
    }

    function currentPageData($limit,$offset)
    {
        // Modify your SQL query to include the LIMIT clause
        $query = "SELECT * FROM workersignup LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}


?>