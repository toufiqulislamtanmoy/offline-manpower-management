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
                alart("Conncton Faild");
            </script>
        <?php
        } else {
        ?>
            <script>
                alart("Connection Successfull");
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
        ?>
            <script>
                alert("Please enter your full name.");
            </script>
        <?php
            return;
        }

        if (empty($userNid)) {
            // userNid field is empty
        ?>
            <script>
                alert("Please enter your NID.");
            </script>
        <?php
            return;
        }



        if (empty($userPhoneNumber)) {
            // userPhoneNumber field is empty
        ?>
            <script>
                alert("Please enter your phone number.");
            </script>
        <?php
            return;
        }

        if (empty($userAddress)) {
            // userAddress field is empty
        ?>
            <script>
                alert("Please enter your address.");
            </script>
        <?php
            return;
        }

        if (empty($userEmail)) {
            // userEmail field is empty
        ?>
            <script>
                alert("Please enter your email.");
            </script>
        <?php
            return;
        }

        if (empty($userPassword)) {
            // userPassword field is empty
        ?>
            <script>
                alert("Please enter your password.");
            </script>
        <?php
            return;
        }

        if (empty($userConfrimPassword)) {
            // userConfrimPassword field is empty
        ?>
            <script>
                alert("Please confirm your password.");
            </script>
        <?php
            return;
        }

        // Validate password format
        $uppercase = preg_match('@[A-Z]@', $userPassword);
        $numeric = preg_match('@[0-9]@', $userPassword);
        $special_chars = preg_match('@[^\w]@', $userPassword); // matches any non-alphanumeric character

        if (!$uppercase || !$numeric || !$special_chars || strlen($userPassword) < 8) {
        ?>
            <script>
                alert("Password must contain minimum 8 characters with at least 1 uppercase letter, 1 numeric value, and 1 special symbol.");
            </script>
        <?php
        } else if ($userPassword != $userConfrimPassword) {
        ?>
            <script>
                alert("Password and Confirm Password do not match");
            </script>

            <?php
        } else {
            //create user account
            if ($img_extention == "jpg" || $img_extention == "jepg" || $img_extention == "png") {
                $query = "INSERT INTO usersignup(UserName,UserNID,userPhone,userAddress,userEmail,userPassword,profileImage) VALUES('$userFullName','$userNid','$userPhoneNumber','$userAddress','$userEmail','$userPassword','$prof_img_name')";
                $insert_data = mysqli_query($this->conn, $query);
                if ($insert_data) {
                    move_uploaded_file($prof_img_temp_name, 'user/upload/'.$prof_img_name);
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
}

?>