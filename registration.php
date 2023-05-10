<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <?php require "./config/config.php" ?>

    <?php

    if (isset($_POST["submit"])) {
        if (
            $_POST["email"] == ""
            or $_POST["password"] == ""
        ) {
            echo "All fields are required";
        } else {

            $email = $_POST["email"];
            // $password =$_POST["password"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $insert = $conn->prepare("INSERT INTO register(email, mypassword) VALUES(:email,:mypassword)");

            $insert->execute([
                ":email" => $email,
                ":mypassword" => $password,
            ]);

            Header("location:index.php");
        }
    }
    ?>

    <div class="wrapper">
        <h2>Register</h2>
        <form method="POST" class="register">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <input type="submit" id="submit" name="submit" value="Register">
            </div>

            <a class="btn" href="./index.php">Login to your account</a>

        </form>
    </div>

</body>

</html>