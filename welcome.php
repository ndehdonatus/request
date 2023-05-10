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

    $login = $conn->query("SELECT * FROM profoma");

    $login->execute();

    $rows = $login->fetchAll(PDO::FETCH_OBJ);

    ?>

    <div class="wrapper">
        <div class="greet">
            <a class="btn" href="./registration.php">Create new account</a>
            <a class="btn" href="./index.php">Log-in to another account</a>
        </div>
        <div class="greet">
            <p>Welcome <?php echo $_SESSION["email"] ?></p>

            <a class="btn" href="./form.php">Create item</a>
        </div>



        <table>
            <tr>
                <th>S/N</th>
                <th span cols="3">Description</th>
                <th>Pack_unit</th>
                <th>Selling_price</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row->myserial ?></td>
                    <td><?php echo $row->mydescription ?></td>
                    <td><?php echo $row->unit ?></td>
                    <td><?php echo $row->price ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>




</body>

</html>