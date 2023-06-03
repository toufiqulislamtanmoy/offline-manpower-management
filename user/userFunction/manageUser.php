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

    function viewWorkerProfile($data,$userId)
    {
        $workerId = $data['id'];
        $query1 = "SELECT worker_full_name, worker_photo, present_address, workerType,gender FROM workersignup WHERE worker_id =$workerId";
        $WorkerProfileResult = mysqli_query($this->conn, $query1);

        
        
        
        // to do use this query in next

        // $query = "SELECT w.worker_full_name, w.worker_photo, w.present_address, w.workerType, w.gender, h.user_rating, h.user_review, h.end_date, u.* 
        // FROM workersignup w 
        // LEFT JOIN hire_table h ON w.worker_id = h.worker_id 
        // LEFT JOIN usersignup u ON w.userId = u.userId 
        // WHERE w.worker_id = $workerId";



        if ($WorkerProfileResult) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($WorkerProfileResult);

            // Free the result set
            mysqli_free_result($WorkerProfileResult);

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

    function currentPageData($limit, $offset)
    {
        // Modify your SQL query to include the LIMIT clause
        $query = "SELECT * FROM workersignup LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    // search the data 
    function searchWorkers($limit, $offset, $searchInput)
    {
        //to do add the limit and offset for pagination
        $query = "SELECT * FROM workersignup WHERE worker_full_name LIKE '%$searchInput%' OR workerType LIKE '%$searchInput%'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    
}


?>