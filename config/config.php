<?php

try {

    $host="localhost";
    $dbname="request_form";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(Exception $e){
    echo $E->getMessage();
}


// if($conn==true){
//     echo "connection working";

// } else {
// echo "connection error";

// }

?>