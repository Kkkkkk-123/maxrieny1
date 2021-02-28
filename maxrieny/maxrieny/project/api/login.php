<?php

// $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

// $username = $_POST['username'];
// $password = $_POST['password'];

// $sql = "SELECT * FROM `userlist` WHERE `username` = '$username' AND `password` = '$password'";

// $res = mysqli_query($con,$sql);

// if(!$res){
//     die('error for mysqli:' .mysqli_error());
// }

// $row = mysqli_fetech_assoc($res);

// if(!$row){
//     echo json_encode(array(
//         "code" => 0,
//         "massage" => "登录失败"
//     ))；
// }else{
//     echo json_encode(array(
//         "code" => 1,
//         "massage" => "登录成功"
//     ));
// }

    $dl=$_POST['input'];
    $mima=$_POST['password'];

    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

    // $sql ="SELECT* FROM `userlist` (`username`, `password`) VALUES ('$dl', '$mima');";
    // $sql = "SELECT * FROM `userlist` WHERE `username` = '$dl' AND `password` = '$mima'";
    $sql ="INSERT INTO `userlist` (`username`, `password`) VALUES ('$dl', '$mima')";

    $res = mysqli_query($con,$sql);

    print_r($res);
    if(!$res){
        die('数据库连接错误' . mysqli_error($con));
    }
    
    // $arr=array();
    // $row =mysqli_fetch_assoc($res);
    // if(!$row){
    //     array_push($arr,$row)
    //     $row =mysqli_fetch_assoc($res);
        
    // }
    // print_r(json_encode($row));
    // print_r(json_encode(array('code'=>$res,'msg'=>'登录成功'),JSON_UNESCAPED_UNICODE));







?>