<?php 
session_start();
require_once 'dbcon.php';

$identifierErr =$passwordErr = '';


if(isset($_POST['loginBtn'])) {
    // This variable captures the single input from your form
    $identifier = mysqli_real_escape_string($conn, $_POST['login_identifier']);
    $password = $_POST['password'];

    // 1. Basic Validation
    if(empty($identifier)){

        $identifierErr = "Email or Username is required";
    }
    if(empty($password)) {
        $passwordErr = "Password is required";
    }

    if(!empty($identifierErr) || !empty($passwordErr)){
        $_SESSION['errors'] = ['login_identifier' => $identifierErr, 'password' => $passwordErr];
        header('Location: login.php');
        exit();
    }

    // 2. Single Query Check
    
    // We bind $identifier twice: once for the email column and once for the username column
    
    // $stmt = "SELECT id, username, email, password FROM users WHERE email = ? OR username = ? LIMIT 1";

    // $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = '$identifier' OR username = '$identifier' LIMIT 1");
    // // $stmt->bind_param("ss", $identifier, $identifier);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // $result = mysqli_query($conn, $stmt);

    $userQuery = "SELECT * FROM users WHERE email='$identifier' OR username = '$identifier' LIMIT 1";
    $result = mysqli_query($conn, $userQuery);

     if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        
             if($password=== $user['password']){
                $_SESSION['loggedInStatus'] = true;
                $_SESSION['loggedInUser'] = [
                'user_id' => $user['id'],
                'email' => $user['email'],
                'username' => $user['username']

                ];

                $_SESSION['message'] = "logged In Successfully!";
                $loginUser = "INSERT INTO login_user(login_email, login_password) VALUES ('$identifier', '$password')";
                mysqli_query($conn, $loginUser);
                //fetch username
                if($password == true){
                    // session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                
                }
                header('Location: dashboard.php');
                exit();
            } else {
                $_SESSION['errors'] = ['password' => "Incorrect Password. Please try again."];
                header('Location: login.php');
                exit();
            }
        } else {
        $_SESSION['errors'] = ['login_identifier' => "No account found with that email or username."];
        header('Location: login.php');
        exit();
    }
}
?>
