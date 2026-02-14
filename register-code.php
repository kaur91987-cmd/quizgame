<?php
session_start();
require_once "dbcon.php";

$fname = $lname = $contact = $email = $username = $password = "";
$fnameErr = $lnameErr = $contactErr = $emailErr = $usernameErr = $passwordErr = "";

if(isset($_POST['registerBtn']))
{
    // Sanitize input
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Don't escape if you are going to hash it

    // Validation
    if (empty($fname)) {
        $fnameErr = "First Name is required";
    } elseif(!preg_match("/^[a-zA-Z]{4,15}$/", $fname)){
        $fnameErr = "First name must be 4-15 characters (letters only).";
    }

    if (empty($lname)) {
        $lnameErr = "Last name is required";
    } elseif(!preg_match("/^[a-zA-Z]{4,15}$/", $lname)) {
        $lnameErr = "Last name must be 4-15 characters (letters only).";
    }

    if(empty($contact)) {
        $contactErr = "Phone Number is required";
    } elseif(!preg_match("/^[0-9]{10}$/", $contact)) {
        $contactErr = "Phone Number must be exactly 10 digits.";
    }

    // Email Check (FIXED STMT LOGIC)
    if(empty($email)){
            $emailErr = "Email is required";
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Enter valid email address";
        } else {
            $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if(mysqli_num_rows($checkEmail) > 0) {
                $emailErr = "Email already registered";
            }
        }
        
    }

    if (empty($username)) {
        $usernameErr = "Username is required";
    } elseif(!preg_match("/^[a-zA-Z0-9_]{4,15}$/", $username)) {
        $usernameErr = "Username must be 4-15 characters.";
    } else {
        $usernameCheck = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
        if(mysqli_num_rows($usernameCheck) > 0){
            $usernameErr = "Username already taken";
        }
    }

    if(empty($password)) {
        $passwordErr = "Password is required";
    } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $passwordErr = "Password must be 8+ chars with Uppercase, Lowercase, Number and Special character.";
    }

    // CHECK IF ANY ERRORS EXIST
    if($fnameErr || $lnameErr || $contactErr || $emailErr || $usernameErr || $passwordErr){
        // Store error strings in session to show on register.php
        $_SESSION['errors'] = [
        $_SESSION['errors'] =   'fname' => $fnameErr, 
            'lname' => $lnameErr, 
            'contact' => $contactErr, 
            'email' => $emailErr, 
            'username' => $usernameErr, 
            'password' => $passwordErr
        ];
        header('Location: register.php');
        exit();
    }

    // If no errors, proceed to insert
    // Recommended: Use password_hash($password, PASSWORD_DEFAULT) here
    $query = "INSERT INTO users (fname, lname, contact, email, username, password) 
              VALUES ('$fname', '$lname', '$contact', '$email', '$username', '$password')";
    
    $userResult = mysqli_query($conn, $query);

    if($userResult){
        $_SESSION['message'] = "Registered Successfully";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Database Error: " . mysqli_error($conn);
        header('Location: register.php');
        exit();
    }
}
?>