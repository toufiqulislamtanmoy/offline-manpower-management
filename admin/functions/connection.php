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

    function users_joined_this_month()
{
    $currentMonth = date('m'); // Get the current month in numeric format (e.g., '08' for August)
    $query = "SELECT COUNT(*) as joined_this_month FROM usersignup WHERE MONTH(Time) = '$currentMonth'";
    $result = mysqli_query($this->conn, $query);

    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        // Return the count of users who joined this month as an integer
        return (int) $row['joined_this_month'];
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


function work_completed_this_month()
{
    $currentMonth = date('m'); // Get the current month in numeric format (e.g., '08' for August)
    $query = "SELECT COUNT(*) as joined_this_month FROM usersignup WHERE MONTH(Time) = '$currentMonth'";
    $result = mysqli_query($this->conn, $query);

    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        // Return the count of users who joined this month as an integer
        return (int) $row['joined_this_month'];
    } else {
        return 0;
    }
}


function revenue()
{
    $query = "SELECT SUM(charge) AS total_charge FROM hire_table WHERE payment_status = 'paid'";
    $revenue = mysqli_query($this->conn, $query);

    if ($revenue) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($revenue);

        // Return the total charge as an integer
        return (int) $row['total_charge'];
    } else {
        return 0;
    }
}



function total_profit()
{
    $query = "SELECT SUM(charge) AS total_profit FROM hire_table WHERE payment_status = 'paid'";
    $total_profit_result = mysqli_query($this->conn, $query);

    if ($total_profit_result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($total_profit_result);

        // Get the total profit as an integer
        $total_profit = (int) $row['total_profit'];

        // Calculate 10% of the total profit
        $neat_profit = 0.1 * $total_profit;

        // Return 10% of the total profit as an integer
        return (int) $neat_profit;
    } else {
        return 0;
    }
}


}
?>

<!--Hello-->