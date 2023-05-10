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
            $_POST["myserial"] == ""
            or $_POST["mydescription"] == ""
            or $_POST["unit"] == ""
            or $_POST["price"] == ""
        ) {
            echo "All fields are required";
        } else {

            $myserial      =  $_POST["myserial"];
            $mydescription =  $_POST["mydescription"];
            $unit          =  $_POST["unit"];
            $price         =  $_POST["price"];



            $insert = $conn->prepare("INSERT INTO profoma (myserial,mydescription,unit,price) VALUES (:myserial,:mydescription, :unit, :price)");

            $insert->execute([
                ":myserial"       => $myserial,
                ":mydescription"  => $mydescription,
                ":unit"           => $unit,
                ":price"          => $price,
            ]);

            Header("location:welcome.php");
        }
    }
    ?>

    
    <div class="wrapper">
        <div class="greet">
            <a class="btn" href="./welcome.php">View all items</a>
        </div>

        <h2>Add new item</h2>
        <form method="POST">
            <div>
                <label for="myserial">Serial number</label>
                <input type="number" id="myserial" name="myserial">
            </div>

            <div>
                <label for="mydescription">description</label>
                <input type="text" id="mydescription" name="mydescription">
            </div>

            <div>
                <label for="unit">pack-unit</label>
                <input type="text" id="unit" name="unit">
            </div>

            <div>
                <label for="price">selling pricer</label>
                <input type="number" id="price" name="price">
            </div>

            <div class="main">
                <input type="submit" name="submit" value="submit">
            </div>
        </form>
    </div>


</body>

</html>