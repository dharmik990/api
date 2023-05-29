<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$con=mysqli_connect('localhost','root','','api');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['conform'];

$res=[];

if(empty($name)){
    $res['name_err']="name is required";
}if(empty($email)){
    $res['email_err']="email is required";
}if(empty($password)){
    $res['password_err']="password is required";
}if(empty($cpassword)){
    $res['conform_err']="plese repet your  password";
}
if($password != $cpassword){
    $res['match_err']="password does not match";
}
if(empty($res)){
   
    // $password=md5($password);
   $insert="INSERT INTO admin(`name`,`email`,`password`)VALUES('$name','$email','$password')";
   $insert_exe=mysqli_query($con,$insert);       


}else{
    $res['error']="something went wrong";
}


echo json_encode($res);


?>