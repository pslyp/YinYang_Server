<?php
    require('./configs/connectDB.php');

    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $image       = $_POST['image'];

    $image_name = "1";
    $path = "images/profile/1.jpg";
    // $path = "";

    $sql = "INSERT INTO users (username, email, password, picture) VALUES ('".$username."', '".$email."', '".$password."', '".$image_name."')";

    $obj = array();
    if(mysqli_query($connect, $sql)) {
        file_put_contents($path, base64_decode($image));
        
        $obj['status'] = 200;
        $obj['message'] = "success";
    } else {
        $obj['status'] = 200;
        $obj['message'] = "fail";
    }

    echo json_encode($obj);

    mysqli_close($connect);
?>