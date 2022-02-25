<?php
$server= "localhost";
$user= "root";
$password="";
$db="signuppage";

$conn = mysqli_connect($server,$user,$password,$db);
if($conn)
{
    ?>
    <script>
        alert("Processing");
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Registration not successfull");
    </script>
    <?php
}

          if(isset($_POST['submit']))
          {
            $username = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            $emailquery = " select * from login where email ='$email'";
            $query = mysqli_query($conn,$emailquery);

            $emailcount = mysqli_num_rows($query);

            if($emailcount>0)
            {
                ?>
                <script>
                    alert("E-mail already exists");
                    window.location.href="loginhtml.php"
                </script>
                <?php
            }
            else
            {
                if($password === $cpassword)
                {
                    $sql_query = "INSERT INTO login (username,email,mobile,password,cpassword) VALUES ('$username','$email','$mobile','$password','$cpassword')";
                    if(mysqli_query($conn, $sql_query))
                    {
                        ?>
                        <script>
                            alert("Please Log in with your credentials");
                            window.location.href="loginhtml.php";
                        </script>
                        <?php
                    }     
                    else
                    {
                        ?>
                        <script>
                            alert("Something went wrong");
                        </script>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <script>
                        alert("password do not match");
                    </script>
                    <?php
                }
            }
        }