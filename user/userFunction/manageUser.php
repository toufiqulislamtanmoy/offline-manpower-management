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
        $query1 = "SELECT worker_full_name, worker_photo, present_address, workerType, gender FROM workersignup WHERE worker_id = $workerId";
        $WorkerProfileResult = mysqli_query($this->conn, $query1);

        $query2 = "SELECT AVG(user_rating) AS avg_rating FROM hire_table WHERE worker_id = $workerId";
        $result = mysqli_query($this->conn, $query2);

        if ($WorkerProfileResult) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($WorkerProfileResult);

            // Free the result set
            mysqli_free_result($WorkerProfileResult);

            if ($result) {
                $ratingRow = mysqli_fetch_assoc($result);
                $avgRating = number_format($ratingRow['avg_rating'], 1);

                // Add the average rating to the $row array
                $row['avg_rating'] = $avgRating;
                
            } 
            else {
                // Handle query error and set an alert message
                $errorMessage = "Error executing the query: " . mysqli_error($this->conn);
                echo '<script>alert("' . $errorMessage . '");</script>';
            }

            // Return the retrieved data
            return $row;
        } else {
            // Handle query error and set an alert message
            $errorMessage = "Error executing the query: " . mysqli_error($this->conn);
            echo '<script>alert("' . $errorMessage . '");</script>';

            return null; // or return an appropriate error indicator
        }
    }

    function user_review($workerId) {
        $query = "SELECT ht.user_review, ht.user_rating, ht.review_date, us.UserName, us.profileImage
            FROM hire_table ht
            JOIN usersignup us ON ht.userId = us.userId
            WHERE ht.worker_id = $workerId";
    
        $reviews = mysqli_query($this->conn, $query);
        
        if ($reviews) {
            $result = array();
            while ($row = mysqli_fetch_assoc($reviews)) {
                $result[] = $row;
            }
            return $result;
        } else {
            // Handle query error and set an alert message
            $errorMessage = "Error executing the query: " . mysqli_error($this->conn);
            echo '<script>alert("' . $errorMessage . '");</script>';
            return null;
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
    // find average rating
    function avg_rating($worker_id){
        $query = "SELECT AVG(user_rating) AS avg_rating FROM hire_table WHERE worker_id = $worker_id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $ratingRow = mysqli_fetch_assoc($result);
            $avgRating = number_format($ratingRow['avg_rating'], 1);
            return $avgRating;
        } 
    }
    
    // search the data 
    function searchWorkers($limit, $offset, $searchInput)
    {
        //to do add the limit and offset for pagination
        $query = "SELECT * FROM workersignup WHERE worker_full_name LIKE '%$searchInput%' OR workerType LIKE '%$searchInput%'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // user profile
    function user_details($user_id){
        $query = "SELECT *FROM usersignup WHERE userId = $user_id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return "An Error Occur";
        }
    }
}


?>