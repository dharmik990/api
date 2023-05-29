<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
$con = mysqli_connect('localhost', 'root', '', 'api');
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$hobby = $_POST['hobby'];
$country = $_POST['country'];
$image = $_POST['image'];
$res = [];

if (empty($name)) {
    $res['name_err'] = "name is required";
}
if (empty($email)) {
    $res['email_err'] = "email is required";
}
if (empty($contact)) {
    $res['contact_err'] = "number is required";
}
if (empty($gender)) {
    $res['gender_err'] = "gender is required";
}
if (empty($hobby)) {
    $res['hobby_err'] = "hobby is required";
}
if (empty($country)) {
    $res['conutry_err'] = "country is required";
}

if (empty($res)) {
//    $hobby = implode(',', $hobby);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = 'img/' . $image;
    $uplod = move_uploaded_file($tmp_name, $folder);

    $insert = "INSERT INTO user(`name`,`email`,`contact`,`gender`,`hobby`,`country`)VALUES('$name','$email','$contact','$gender','$hobby','$country')";
    $insert_exe = mysqli_query($con, $insert);
    if ($insert_exe) {
        $res['success'] = "data successfully inserted";
    } else {
        $res['error'] = "something wentwrong";
    }
} else {
    $res['error'] = "something went wrong";
}
echo json_encode($res);