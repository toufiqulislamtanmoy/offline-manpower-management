<?php
class WorkerFunction
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

           

<?php
        } else {
            echo "<script>
            console.log('Connection successful');
        </script>";
        }
    }



    function WorkerProfile($wId)
    {
        $workerId = $wId['id'];
        $query1 = "SELECT worker_full_name, worker_photo, present_address, workerType, gender,points,worker_status,worker_phone_number FROM workersignup WHERE worker_id = $workerId";
        $WorkerProfileResult = mysqli_query($this->conn, $query1);

        $query = "SELECT AVG(user_rating) AS avg_rating FROM hire_table WHERE worker_id = $workerId AND user_rating > 0";
        $result = mysqli_query($this->conn, $query);

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
            WHERE ht.worker_id = $workerId AND ht.payment_status = 'paid'";
    
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

    function updateStatus($wID, $status){
        $query = "UPDATE workersignup
        SET worker_status = $status
        WHERE worker_id  = $wID;
        ";

        $result = mysqli_query($this->conn,$query);
        if($result){
            if($status == 0){
                return "Offline";
            }else{
                return "Online";
            }
        }
    }

    function totalEarnings($wId){
        $query = "SELECT SUM(charge) AS total_charge
        FROM hire_table WHERE worker_id= $wId;
        ";
        $result = mysqli_query($this->conn, $query);
        if($result){
            $amount = mysqli_fetch_assoc($result);
            return $amount;
        }
    }

}
?>