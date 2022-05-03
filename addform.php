<?php
include 'conn.php';

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];




    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $password = $_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    if (empty($firstname)) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please Enter your First Name.";
        exit;
    }
    if (empty($lastname)) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please Enter your Last Name.";
        exit;
    }
    if (empty($age)) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please Enter your Age.";
        exit;
    }
    if (empty($password)) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please Enter your Password.";
        exit;
    }
    if ($password!=$confirmpassword){
        http_response_code(400);
        echo "Please Enter same Password.";
        exit;

    }
    $new = "INSERT INTO users4 ( firstname, lastname, age, password, created_at)
      VALUES ('$firstname', '$lastname ','$age','$password',now())";

    $result = mysqli_query($conn, $new);
    http_response_code(200);
    echo "Thank You! User added successfully.";
} else {

    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}







