<?php
session_start();
require_once 'dbcon.php';
if(!isset($_SESSION['loggedInStatus'])){
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['loggedInUser']['user_id'];

if($_SESSION['loggedInUser']['user_id']){
    // Use a prepared statement to fetch all details for THIS user
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($user = $result->fetch_assoc()) {
        // You now have all profile data in the $user array
        $username = $user['username'];
        $email = $user['email'];
        $email = $user['id'];
        $fname = $user['fname'];
        $lname = $user['lname'];
        $contact = $user['contact'];
        // Add any other columns you have, like 'bio', 'profile_pic', etc.
    }
}
?>