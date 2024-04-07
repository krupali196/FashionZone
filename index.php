<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $usename = "root";
        $password = "Tanvi@0408";
        $database = "loginpage";

        $conn = new mysqli($servername, $usename , $password , $database);
        
        session_start();
    
        #for login box
        if(isset($_POST['login'])){

            $query = "SELECT * FROM `signinpage` WHERE `username`= '$_POST[loginusername]' OR `email`='$_POST[loginusername]' ";
            $result = mysqli_query($conn, $query);

            if($result){
                if(mysqli_num_rows($result) == 1){

                    $result_fetch = mysqli_fetch_assoc($result);

                    if($_POST['password'] == $result_fetch['password']){
                        
                        #if password match
                        
                        $_SERVER['logged_in'] = true;
                        $_SESSION['email'] = $result_fetch['email'];
                        header("location: index.html");
                    }
                    else{
                        #if password not matched
                        echo
                            "<script>
                                alert('Incorrect password');
                                window.location.href='index.html';
                            </script>";
                    }
                }
                else{
                    echo
                        "<script>
                            alert('Email not registered');
                            window.location.href='index.html';
                        </script>";
                }
            }
            else{
                echo
                "<script>
                    alert('Can not run query');
                    window.location.href='index.html';
                </script>";
            }
        }


        #for sign-in box
        if (isset($_POST['register'])) {
            $user_exist_query = "SELECT * FROM `signinpage` WHERE  `username` = '$_POST[username]' OR `email` = '$_POST[email]'";
            $result = mysqli_query($conn, $user_exist_query);

            if ($result) {
                
                if(mysqli_num_rows($result) > 0){ #it will be executed if username or email is already taken

                    $result_fetch = mysqli_fetch_assoc($result);
                    if ($result_fetch['username'] == $_POST['username']) {

                        #error for username already registered
                        echo
                        "<script>
                            alert('$result_fetch[username] - Username already taken');
                            window.location.href='index.html';
                        </script>";
                    }
                    else{
                        #error for email already registered
                        echo
                        "<script>
                            alert('$result_fetch[email] - Email already registered');
                            window.location.href='index.html';
                        </script>";
                    }
                }
                else{ #it will be executed if no one has taken username or email before
                    
                    #$password = password_hash($_POST['password'] , PASSWORD_BCRYPT);
                    $query= "INSERT INTO `signinpage`(`username`, `email`, `password`) VALUES ('$_POST[username]','$_POST[email]','$_POST[password]')";
                    if(mysqli_query($conn, $query)){
                        #if data inserted successfully 
                        echo
                        "<script>
                            alert('Registration Successfully');
                            window.location.href='index.html';
                        </script>";
                    }
                    else{
                        #if data cannot be inserted
                        echo
                        "<script>
                            alert('Can not run query');
                            window.location.href='index.html';
                        </script>";
                    }
                }
            }
            else{
                echo
                "<script>
                    alert('Can not run query');
                    window.location.href='index.html';
                </script>";
            }
        }
    ?>
</body>
</html>