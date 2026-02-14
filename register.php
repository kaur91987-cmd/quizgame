<?php

session_start();
require_once 'dbcon.php';
if(isset($_SESSION['loggedInStatus'])){
    header('Location: index.php');
    unset($_SESSION['errors']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form in php mysql with session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
 
</head>
<body>
    <section style="display: flex; flex-direction: row;">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12  justify-items-center">
                <div class="mt-4 card card-body shadow glass-card ">
                    <h4>Register</h4>
                    <hr>
                    <form id="register-form" class="form-inline" action="register-code.php" method="POST">
                        <div class="row">
                            <div class="col mb-6">
                                <label>First Name <span class="req">*</span></label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required />
                                <!-- Clean way to show error -->
                                <span style="color: red;"><?= $_SESSION['errors']['fname'] ?? ''; ?></span>
                            </div>

                            <div class="col mb-6">
                                <label>Last Name <span class="req">*</span></label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required/>
                                <span style="color: red;"><?= $_SESSION['errors']['lname'] ?? ''; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-6">
                                <label>Phone <span class="req">*</span></label>
                                <input type="number" name="contact" class="form-control" placeholder="Enter number" required/>
                                <span style="color: red;"><?= $_SESSION['errors']['contact'] ?? ''; ?></span>
                            </div>
                            <div class="col mb-6">
                                <label>Email <span class="req">*</span></label>
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" required/>
                                <span style="color: red;"><?= $_SESSION['errors']['email'] ?? ''; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-6">
                                <label>Username <span class="req">*</span></label>
                                <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username" required/>
                                <span style="color: red;"><?= $_SESSION['errors']['username'] ?? ''; ?></span>
                            </div>
                            <div class="col mb-6">
                                <label>Password <span class="req">*</span></label>
                                <input type="password" id="passwordShow" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" required/>
                                <input type="checkbox" onclick="showHide()"> Show Password <br>
                                <span style="color: red;"><?= $_SESSION['errors']['password'] ?? ''; ?></span>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" name="registerBtn" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="text-center">
                            <br/>
                            <a id="link_page" href="login.php">Click here to Login</a>
                        </div>
                    </form>
                    <?php 
                    // Clear errors after the form is displayed so they don't show on refresh
                    unset($_SESSION['errors']); 
                    ?>
                </div>
            </div>
        </div>
    </div>     
    </section>
    
    
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