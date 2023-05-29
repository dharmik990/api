<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
$con = mysqli_connect('localhost', 'root', '', 'api');


$email = $_POST['email'];
$password = $_POST['password'];
$res = [];

if (empty($email)) {
    $res['email_err'] = "email is required";
}
if (empty($password)) {
    $res['password_err'] = "password is required";
}


if (empty($res)) {
    
    $select = "SELECT * FROM admin WHERE `email`='$email' AND `password`='$password'";
    $select_exe = mysqli_query($con, $select);
   
    if (mysqli_num_rows($select_exe) > 0) {
        echo "hello";
        $arr = mysqli_fetch_assoc($select_exe);
        $res['success'] = "login successfully";

    } else {
        $res['err'] = "email  or password are invalid";
    }
} else {
    $res['error'] = "something went wrong";
}

echo json_encode($res);




?>