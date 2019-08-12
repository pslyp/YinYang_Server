<?php

    include 'config.php';

    $email      = $_POST['email_user'];
    $password   = md5($_POST['pass_user'], PASSWORD_DEFAULT);
    $username   = $_POST['name_user'];
    $gender     = $_POST['gender_user'];
    $birthday   = $_POST['Birth_user'];
    $element    = $_POST['element_user'];
    $food_edit  = $_POST['food_user'];
    //  $image_user = @_POST['Pic_user'];
    $body_user  = $_POST['body_user'];
    $num_yhin   = $_POST['num_yhin'];
    $num_yhang  = $_POST['num_yhang'];
    
//    echo json_encode($email);

    $image_user = $_POST['Pic_user'];
    echo $image_user;
    if($image_user != ""){
//        $image_name = uniqid(). ".jpg";
        $image_name = "1.jpg";
        $path = "images/$image_name";
        file_put_contents($path, base64_decode($image_user));
        
        echo "Successfully Uploaded";
    }

    $sql = "SELECT * FROM profile_user WHERE email_user = '$email'";
    $row = mysqli_query($conn, $sql);
    
    $res = array();
    if(mysqli_num_rows($row) == 0) {
        $sql = "INSERT INTO profile_user (email_user, pass_user, name_user, gender_user, Birth_user, element_user, food_user, Pic_user, body_user, num_yhin, num_yhang) VALUES ('$email', '$password', '$username', '$gender', '$birthday', '$element', '$food_edit', '$image_user', '$body_user', '$num_yhin', '$num_yhang')";
      
        $result = mysqli_query($conn, $sql);
        if($result) {
            $res['status'] = true;
            $res['messages'] = "สมัครสมาชิกเสร็จสมบูรณ์";
        }
    } else {
        $res['status'] = false;
        $res['messages'] = "มีอีเมลนี้ในระบบแล้ว";
    }

  echo json_encode($res);

?>
