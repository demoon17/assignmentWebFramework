<?php
    session_start();

    //connect to db
    $db = mysqli_connect("localhost", "root" , "","registration");

    if (isset($_POST['signup_btn'])){
        $firstname =mysql_real_escape_string($_POST['firstname']);
        $lastname =mysql_real_escape_string($_POST['lastname']);
        $email = mysql_real_escape_string($_POST['email']);
        $phone = mysql_real_escape_string($_POST['phone']);
        $password = mysql_real_escape_string($_POST['password']);
        $password2 = mysql_real_escape_string($_POST['password2']);
        if ($password == $password2){
            //create user
            $password = md5($password); //hash password before storing for security purposes
            $sql = "INSERT INTO userdetail (firstname, lastname, email, phone, password) VALUES ('$firstname','$lastname','$email','$phone','$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are now logged in";
            $_SESSION['firstname'] = $firstname;
            header("location: index.php"); //redirect to home page

        }
        else{
            //error
            $_SESSION['message'] = "The two passwords do not match";
        }
    
    }

?>