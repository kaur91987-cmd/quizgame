<?php
include('authentication.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="card card-body shadow glass-card ">
            <div class="row justify-self-center">
                <div class="col-md-12 text-center justify-self-center"></div>
                    <!-- <h4>Welcome to Dashboard<?php echo $username; ?></h4> -->
                    <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
                    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                    <!-- Example of other data -->
                    <p>User Id: <?php echo $user['id']; ?></p>
                    <p>First Name: <?php echo $user['fname']; ?></p>
                    <p>Last Name: <?php echo $user['lname']; ?></p>
                    <p>Phone : <?php echo $user['contact']; ?></p> 

                    <?php
                        if(isset($_SESSION['message'])){
                            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                            unset($_SESSION['message']);
                        }
                    ?>

                    <!-- <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stmt as $row): ?>
                            <tr>
                                <td>Email: <?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> -->
                    <div style="display:flex;">
                        <a class="dsbtn" href="index.php" class="btn btn-primary">Home Page</a>
                        <a class="dsbtn" href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>