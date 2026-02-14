<?php
session_start();
require_once "dbcon.php";
if(isset($_SESSION['loggedInStatus'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form in php mysql with session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4 card card-body shadow glass-card" >
                    <h4>Login</h4>
                    <hr>
                    <form id="register-form" action="login-code.php" method="POST">
                        <div class="row">
                            <div class="col mb-6">                
                                <label>Username or Email <span class="req">*</span></label>                
                                <input type="text" name="login_identifier" class="form-control" autocomplete="off" required placeholder="username or email@example.com"/>                
                                <span style="color: red;"><?= $_SESSION['errors']['login_identifier'] ?? ''; ?></span>                
                            </div>
                            <div class="col mb-6">
                                <label>Password <span class="req">*</span></label>
                                <input type="password" id="passwordShow" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required/>
                                <input type="checkbox" onclick="showHide()"> Show Password <br>
                                <span style="color: red;"><?= $_SESSION['errors']['password'] ?? ''; ?></span>
                            </div>
                        </div>
                        <!-- <div class="mb-3">
                            <label>Email Id</label>
                            <input type="email" name="email" class="form-control" autocomplete="off"/>
                            <span style="color: red;"><?= $_SESSION['errors']['email'] ?? ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" id="passwordShow" name="password" class="form-control" autocomplete="off" required/>
                            <input type="checkbox" onclick="showHide()"> Show Password <br>
                            <span style="color: red;"><?= $_SESSION['errors']['password'] ?? ''; ?></span>
                        </div> -->
                        <div class="col">
                            <button type="submit" name="loginBtn" class="btn btn-primary" >Login</button>
                        </div>
                        <div class="text-center">
                            <br/>
                            <a id="link_page" href="register.php">Click here to Register</a>
                        </div>
                        <!-- <div class="mb-3">
                            <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login Now</button>
                        </div>
                        <div class="text-center">
                            <br/>
                            <a href="register.php">Click here to Register</a>
                        </div> -->
                    </form>
                    <?php 
                    // Clear errors after the form is displayed so they don't show on refresh
                    unset($_SESSION['errors']); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showHide() {
        var x = document.getElementById("passwordShow");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>