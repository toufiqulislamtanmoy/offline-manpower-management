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
        } else {
            echo "<script>
                console.log('Connection successful');
            </script>";
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
        $query1 = "SELECT worker_full_name, worker_photo, present_address, workerType, gender,points FROM workersignup WHERE worker_id = $workerId";
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
            } else {
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

    function user_review($workerId)
    {
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
    function avg_rating($worker_id)
    {
        $query = "SELECT AVG(user_rating) AS avg_rating FROM hire_table WHERE worker_id = $worker_id AND user_rating > 0";
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
        $query = "SELECT * FROM workersignup WHERE worker_full_name LIKE '%$searchInput%' OR workerType LIKE '%$searchInput%' OR present_address LIKE '%$searchInput%'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // user profile
    function user_details($user_id)
    {
        $query = "SELECT *FROM usersignup WHERE userId = $user_id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return "An Error Occur";
        }
    }

    function hiring($data, $uId, $wId)
    {
        $hiringDate = date('Y-m-d'); // Use 'Y-m-d' format for MySQL date
        $startDate = $data['working_date'];
        $charge = $data['salary'];
        $payment_status = "Pending";
        $notification_status = 1;
        $workingType = $data['hiringType'];
        $workingHour = isset($data['hour']) && is_numeric($data['hour']) ? $data['hour'] : 'N/A';

        $query = "INSERT INTO hire_table (userId, worker_id, hire_date, start_date, charge, payment_status, notification_status, working_method, working_hour,accept)
                  VALUES ($uId, $wId, '$hiringDate', '$startDate', $charge, '$payment_status', $notification_status, '$workingType', '$workingHour','Pending');";

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return "Success";
        } else {
            return "An error occurred";
        }
    }


    function pendingList()
    {
        $uid = $_SESSION['user_id'];
        $query = "SELECT * FROM pending_worker_hire_details WHERE (accept = 'Pending' OR payment_status = 'Pending') AND userId = $uid;
        ";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    function cancel_hire_request($hireID)
    {
        $query = "DELETE FROM hire_table WHERE hire_id = $hireID";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return "Success";
        } else {
            return "Error";
        }
    }

    function payment_success($hire_id, $tranId, $tranDate)
    {

        $query = "UPDATE hire_table
              SET payment_status = 'Paid',
                  transactionId = '$tranId',
                  end_date = '$tranDate'
              WHERE hire_id = $hire_id";

        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return "success";
        } else {
            return "Error updating payment: " . mysqli_error($this->conn);
        }
    }
}
