<?php
    require('./configs/connectDB.php');

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE email = '".$email."';";

    $obj = array();
    if($result = mysqli_query($connect, $sql)) {
        $row = mysqli_fetch_assoc($result);
        if(sizeof($row) > 0) {
            if($row['password'] == $password) {
                $obj['status'] = 200;
                $obj['message'] = "success";
            } else {
                $obj['status'] = 200;
                $obj['message'] = "fail";
            }
        } else {
            $obj['status'] = 200;
            $obj['message'] = "no email";
        }
    } else {
        $obj['status'] = 250;
    }

    echo json_encode($obj);

    mysqli_close($connect);
?>