<?php

$con = mysqli_connect('localhost', 'root', '', 'api');

$select = "SELECT * FROM user";
$select_exe = mysqli_query($con, $select);

$arr = mysqli_fetch_assoc($select_exe);
print_r($arr);

$id = $_POST['id'];
$name = $_POST['name'] ? $_POST['name'] : $arr['name'];
$email = $_POST['email'] ? $_POST['email'] : $arr['email'];
$contact = $_POST['contact'] ? $_POST['contact'] : $arr['contact'];
$gender = $_POST['gender'] ? $_POST['gender'] : $arr['gender  '];

$update = "UPDATE user SET `name`='$name' WHERE `id`='$id'";
$update_exe = mysqli_query($con, $update);

?>

