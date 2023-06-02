<?php
class Main
{
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
                echo("Connection Successfull");
                window.location.replace('ulogin.php');
            </script>
        <?php

        }
    }

    function user_login($data)
    {
        $userEmail = $data['email'];
        $userPassword = $data['password'];
        $query = "SELECT * FROM usersignup where  userEmail='$userEmail' AND userPassword='$userPassword'";
        $loginInfo = mysqli_query($this->conn, $query);
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
    // Thus is user signup function
    function user_signup($data)
    {
        $userFullName = $data['userFullname'];
        $userNid = $data['userNID'];
        $userPhoneNumber = $data['userPhoneNumber'];
        $userAddress = $data['userAddress'];
        
        $userEmail = $data['userEmail'];
        $userPassword = $data['userPassword'];
        $userConfrimPassword = $data['userConfrimPassword'];
        $prof_img_name = $_FILES['userProfile']['name'];
        $prof_img_temp_name = $_FILES['userProfile']['tmp_name'];
        $img_extention = pathinfo($prof_img_name, PATHINFO_EXTENSION);

        echo $prof_img_name;
        echo $prof_img_temp_name;
        echo $img_extention;

        // Validate all fields
        if (empty($userFullName)) {
            // userFullName field is empty
            return "Please enter your full name.";
        }

        if (empty($userNid)) {
            // userNid field is empty
            return "Please enter your NID.";
        }



        if (empty($userPhoneNumber)) {
            // userPhoneNumber field is empty
            return "Please enter your phone number.";
        }

        if (empty($userAddress)) {
            // userAddress field is empty
            return "Please enter your address.";
        }

        if (empty($userEmail)) {
            // userEmail field is empty
            return "Please enter your email.";
        }

        if (empty($userPassword)) {
            // userPassword field is empty
            return "Please enter your password.";
        }

        if (empty($userConfrimPassword)) {
            // userConfrimPassword field is empty
            return "Please confirm your password.";
        }

        // Validate password format
        $uppercase = preg_match('@[A-Z]@', $userPassword);
        $numeric = preg_match('@[0-9]@', $userPassword);
        $special_chars = preg_match('@[^\w]@', $userPassword); // matches any non-alphanumeric character

        if (!$uppercase) {
            return "Password must contain at least one uppercase letter.";
        } else if (!$numeric) {
            return "Password must contain at least one numeric value.";
        } else if (!$special_chars) {
            return "Password must contain at least one special symbol.";
        } else if (strlen($userPassword) < 8) {
            return "Password must be at least 8 characters long.";
        } else if ($userPassword != $userConfrimPassword) {
            return "Password and Confirm Password do not match.";
        } else {
            //create user account
            if ($img_extention == "jpg" || $img_extention == "jepg" || $img_extention == "png") {
                $query = "INSERT INTO usersignup(UserName,UserNID,userPhone,userAddress,userEmail,userPassword,profileImage) VALUES('$userFullName','$userNid','$userPhoneNumber','$userAddress','$userEmail','$userPassword','$prof_img_name')";
                $insert_data = mysqli_query($this->conn, $query);
                if ($insert_data) {
                    move_uploaded_file($prof_img_temp_name, 'user/upload/' . $prof_img_name);
            ?>
                    <script>
                        alert("Account Created Successfully");
                        window.location.replace('ulogin.php');
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("An error occur please try again later");
                    </script>
                <?php
                }
            }
        }
    }
    // Thus is worker signup function
    function worker_signup($data)
    {
        $workerFullname = $data['workerFullname'];
        $fatherName = $data['fatherName'];
        $dob = $data['dob'];
        $gender = $data['gender'];
        $workerNid = $data['workerNid'];
        $workerType = $data['workerType'];
        $workerPhone = $data['workerPhoneNumber'];
        $workerAddrss = $data['workerAddrss'];
        $workerPAddrss = $data['workerPAddrss'];
        $workerEmail = $data['workerEmail'];
        $workerPassword = $data['workerPassword'];
        $workerConfrimPassword = $data['workerConfrimPassword'];
        $prof_img_name = $_FILES['workerProfile']['name'];
        $prof_img_temp_name = $_FILES['workerProfile']['tmp_name'];
        $img_extention = pathinfo($prof_img_name, PATHINFO_EXTENSION);


        $checkQuery = "SELECT * FROM workersignup WHERE nid_number = '$workerNid' OR worker_email = '$workerEmail'";

        $searchResult =  mysqli_query($this->conn, $checkQuery);

        if (mysqli_num_rows($searchResult) > 0) {
            // NID or email is already used
            return 'NID or Email is already used';
        }

        // Validate all fields
        // Validate all fields
        $errors = array(
            'workerFullname' => 'Please enter your full name.',
            'workerNid' => 'Please enter your NID.',
            'workerPhone' => 'Please enter your phone number.',
            'workerAddrss' => 'Please enter your address.',
            'workerEmail' => 'Please enter your email.',
            'workerPassword' => 'Please enter your password.',
            'workerConfrimPassword' => 'Please confirm your password.',
            'workerFaterName' => 'Please Enter your father name',
            'dob' => 'Please Enter your Date of Birth',
            'wParmanentAddress' => 'Please Enter your Parmanent Address',
            'wprofile_pic' => 'Please Add your profile image',
        );



        if (empty($workerFullname)) {
            $fieldErrors = $errors['workerFullname'];
            return $fieldErrors;
        }
        if (empty($fatherName)) {
            $fieldErrors = $errors['workerFaterName'];
            return $fieldErrors;
        }
        if (empty($dob)) {
            $fieldErrors = $errors['dob'];
            return $fieldErrors;
        }
        if (empty($prof_img_name)) {
            $fieldErrors = $errors['wprofile_pic'];
            return $fieldErrors;
        }


        if (empty($workerNid)) {
            $fieldErrors = $errors['workerNid'];
            return $fieldErrors;
        }

        if (empty($workerPhone)) {
            $fieldErrors = $errors['workerPhone'];
            return $fieldErrors;
        }

        if (empty($workerAddrss)) {
            $fieldErrors = $errors['workerAddrss'];
            return $fieldErrors;
        }
        if (empty($workerPAddrss)) {
            $fieldErrors = $errors['wParmanentAddress'];
            return $fieldErrors;
        }
        if (empty($workerEmail)) {
            $fieldErrors = $errors['workerEmail'];
            return $fieldErrors;
        }

        if (empty($workerPassword)) {
            $fieldErrors = $errors['workerPassword'];
            return $fieldErrors;
        }

        if (empty($workerConfrimPassword)) {
            $fieldErrors = $errors['workerConfrimPassword'];
            return $fieldErrors;
        }



        // Validate password format
        $uppercase = preg_match('@[A-Z]@', $workerPassword);
        $numeric = preg_match('@[0-9]@', $workerPassword);
        $special_chars = preg_match('@[^\w]@', $workerPassword); // matches any non-alphanumeric character

        if (!$uppercase) {
            return "Password must contain at least one uppercase letter.";
        } else if (!$numeric) {
            return "Password must contain at least one numeric value.";
        } else if (!$special_chars) {
            return "Password must contain at least one special symbol.";
        } else if (strlen($workerPassword) < 8) {
            return "Password must be at least 8 characters long.";
        } else if ($workerPassword != $workerConfrimPassword) {
            return "Password and Confirm Password do not match.";
        } else {
            if ($img_extention == "jpg" || $img_extention == "jepg" || $img_extention == "png") {
                $query = "INSERT INTO workersignup(worker_full_name,father_name,date_of_birth,worker_photo,nid_number,worker_phone_number,present_address,parmanennt_address,worker_password,worker_status,worker_email,workerType,gender) VALUES('$workerFullname','$fatherName','$dob','$prof_img_name','$workerNid','$workerPhone','$workerAddrss','$workerPAddrss','$workerPassword',1,'$workerEmail','$workerType','$gender')";

                $insert_data = mysqli_query($this->conn, $query);

                if ($insert_data) {
                    move_uploaded_file($prof_img_temp_name, 'worker/upload/' . $prof_img_name);
                ?>
                    <script>
                        alert("Account Created Successfully");
                        window.location.replace('wlogin.php');
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("An error occur please try again later");
                    </script>
<?php
                }
            }
        }
    }

    // worker login

    function worker_login($data)
    {
        $workerEmail = $data['workerEmail'];
        $workerPassword = $data['workerPassword'];

        $query = "SELECT * FROM workersignup where  worker_email='$workerEmail' AND worker_password='$workerPassword'";
        $loginInfo = mysqli_query($this->conn, $query);

        if (!$loginInfo || mysqli_num_rows($loginInfo) == 0) {
            return 'Invalid Password or Email';
        } else {
            while ($row = mysqli_fetch_assoc($loginInfo)) {
                echo "<script>window.location.replace('worker/index.html');</script>";
            }
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