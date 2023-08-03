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
        $query1 = "SELECT worker_full_name, worker_photo, present_address, workerType, gender,points,worker_status,worker_phone_number,points FROM workersignup WHERE worker_id = $workerId";
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

    function updateStatus($wID, $status)
    {
        $query = "UPDATE workersignup
        SET worker_status = $status
        WHERE worker_id  = $wID;
        ";

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            if ($status == 0) {
                return "Offline";
            } else {
                return "Online";
            }
        }
    }

    function totalEarnings($wId)
    {
        $query = "SELECT SUM(charge) AS total_charge
        FROM hire_table WHERE worker_id= $wId;
        ";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $amount = mysqli_fetch_assoc($result);
            return $amount;
        }
    }

    function new_notification($wID)
    {
        $query = "SELECT COUNT(*) AS total_notifications
        FROM hire_table
        WHERE worker_id = $wID AND notification_status = 1";

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $count = $row['total_notifications'];
            return $count;
        } else {
            return $count = 0;
        }
    }

    function notification_details($wid)
    {
        $query = "SELECT u.UserName
        FROM hire_table h
        JOIN usersignup u ON h.userId = u.userId
        WHERE h.worker_id = $wid AND h.notification_status = 1";

        $result = mysqli_query($this->conn, $query);
        $userNames = array();

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userNames[] = $row['UserName'];
            }
            $markAsReadNotification = "UPDATE hire_table
            SET notification_status = 0
            WHERE worker_id = $wid;
            ";
            $markAsReadNotificationResult = mysqli_query($this->conn, $markAsReadNotification);
            if ($markAsReadNotificationResult) {
                return $userNames;
            }
        } else {
            return "No Notifications Found";
        }
    }


    function worker_request_list($worker_id)
    {
        $query = "SELECT pwhd.hire_id, pwhd.userId, pwhd.charge, pwhd.payment_status, pwhd.accept, pwhd.working_hour, pwhd.working_method, pwhd.start_date, pwhd.end_date,pwhd.location, us.UserName, us.userAddress, us.profileImage
        FROM pending_worker_hire_details pwhd
        JOIN usersignup us ON pwhd.userId = us.userId
        WHERE pwhd.worker_id = $worker_id AND pwhd.payment_status = 'Pending';
        ";

        $result = mysqli_query($this->conn, $query);

        if ($result) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        }
    }


    function worker_task_management($hire_id, $state)
    {
        if ($state !== "Yes" && $state !== "No") {
            return "Invalid state";
        }

        $query = "UPDATE hire_table
              SET accept = ?
              WHERE hire_id = ?";


        $stmt = mysqli_prepare($this->conn, $query);


        mysqli_stmt_bind_param($stmt, "si", $state, $hire_id);


        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            return $state === "Yes" ? "Accepted" : "Rejected";
        } else {
            return "Failed to update";
        }
    }

    function work_history($wId){
        $query = "SELECT h.*, u.UserName
        FROM hire_table h
        JOIN usersignup u ON h.userId  = u.userId
        WHERE h.worker_id = $wId AND h.payment_status = 'Paid'
        ";

        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
        }
    }
}
?>