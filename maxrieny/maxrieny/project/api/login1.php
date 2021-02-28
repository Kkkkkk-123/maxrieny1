<?php

$dl=$_POST['input1'];
$mima=$_POST['password1'];

$con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

// $sql ="SELECT* FROM `userlist` (`username`, `password`) VALUES ('$dl', '$mima');";
$sql = "SELECT * FROM `userlist` WHERE `username` = '$dl' AND `password` = '$mima'";
// $sql ="INSERT INTO `userlist` (`username`, `password`) VALUES ('$dl', '$mima')";


$res = mysqli_query($con,$sql);

if (!$res) {
    die('error for mysql: ' . mysqli_error());
   }

$arr=array();
$row =mysqli_fetch_assoc($res);
if($row){
    print_r(json_encode($row));
}else{
    print_r('1');
}


// print_r($res);





?>