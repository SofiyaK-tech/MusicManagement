<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$genre=$_POST['genre'];

$conn =new mysql('localhost','root','','test');
if($conn->connect_error){
    die('Connection failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(name,email,password,phone,genre) 
    values(?,?,?,?,?)");
    $stmt->bind_param("sssis",$name,$email,$password,$phone,$genre);
    $stmt->execute();
    echo "Registration done successfully...";
    $stmt->close();
    $conn->close();
}

?>