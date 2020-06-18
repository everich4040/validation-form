<?php
include("./config/config.php");

$fullname = "";
$email = "";
$username = "";
$password = "";
$errors = [];

//Check if user has click signup button

if (isset($_POST['signup'])) {
    //Collect user inputs
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    //VAlidate user input

    //check if fullname is empty
    if (empty($fullname)) {
        array_push($errors, "fullname required");
    }
    //username validation
    if (empty($username)) {
        array_push($errors, "username required");
    }
    if (strlen($username) < 5) {
        array_push($errors, "Username must be at least 5 characters long");
    }

    //Email validation
    if (empty($email)) {
        array_push($errors, "email required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "wrong email format");
    }
    //Password validation
    if (empty($password)) {
        array_push($errors, "password required");
    }
    if (strlen($password) < 8) {
        array_push($errors, "password must be at least 8 characters");
    }
    if ($password != $password2) {
        array_push($errors, "passwords do not match");
    }

    // Check if username already exists
    $UsernameCheck = "SELECT * FROM users where username = '$username' LIMIT 1";
    $userExistsQUery = $conn->query($UsernameCheck);

    $queryRows = $userExistsQUery->num_rows;

    if ($queryRows > 0) {
        array_push($errors, "username already exists");
    }

    // check if email already exist
    $emailCheck = "SELECT * FROM users where email = '$email' LIMIT 1";
    $emailcheckquery = $conn->query($emailCheck);

    $emailRows = $emailcheckquery->num_rows;
    if ($emailRows > 0) {
        array_push($errors, "email already exists");
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $insertUser = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`)
         VALUES ('$fullname','$username','$email','$password')";
        $query = $conn->query($insertUser);
        $fetchQuery = mysqli_fetch_assoc($query);
        while (!empty($fetchQuery)) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        }
    }
}


// log user out
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
}




//Log user in
if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    if (empty($username)) {
        array_push($errors, "Username can't be empty");
    }
    if (empty($password)) {
        array_push($errors, "Password can't be empty");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $fetchQuery = mysqli_fetch_assoc($query);
        if (mysqli_num_rows($query) > 0) {
            while (!empty($fetchQuery)) {
                $_SESSION["account_type"] = $fetchQuery["account_type"];
                $_SESSION["username"] = $username;
                header("Location: ./index.php");
                exit();
            }
        } else {
            array_push($errors, "Wrong input combination");
        }
    }
}
