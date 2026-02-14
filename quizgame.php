
<html>
    <head>
        <title>Quiz Game</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        

        <div class="container">
            <div class="glass-card">
                <form method="post">
                    <h1>Quiz Game</h1><br>
                    <table>
                        <tr>
                            <td><label for="fname">First Name: </label><br><input type="text" name="fname"></td>
                            <td><label for="lname">Last Name: </label><br><input type="text" name="lname"></td>
                        </tr>
                        <tr>
                            <td><label for="contact">Contact: </label><br><input type="text" name="contact"></td>
                            <td><label for="email">Email: </label><br><input type ="email" name="email"></td>
                        </tr>
                    </table>
                    <input type="submit" name="sbt">
                </form> 
            </div>
        </div>
    
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'quizgame', 3307);
            if(isset($_POST['sbt'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $sql = "INSERT INTO users (fname, lname, contact, email) VALUES ('$fname', '$lname', '$contact', '$email')";
                $run = mysqli_query($con, $sql);
            }
        ?>
    </body>
</html>