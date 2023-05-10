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
            $password = $_POST["password"];

            $login = $conn->query("SELECT*FROM register WHERE email='$email'");

            $login->execute();

            $row = $login->FETCH(PDO::FETCH_ASSOC);

            if ($login->rowCount() > 0) {

                if (password_verify($password, $row["mypassword"])) {

                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];

                    Header("location:welcome.php");
                } else {
                    echo "Password not correct";
                }
            } else {
                echo "Email not found";
            }
        }
    }

    ?>

    <div class="wrapper">
        <h2>Sign in</h2>
        <form method="POST">

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div>

                <input type="submit" id="submit" name="submit" value="Sign in">
            </div>

            <a class="btn" href="./registration.php">Create a new account</a>

        </form>
    </div>

</body>

</html>