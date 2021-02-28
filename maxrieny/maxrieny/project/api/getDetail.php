<?php

    

    $id = $_GET['id'];

    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

    

    $sql = "SELECT * FROM `goods` WHERE `goods_id` = '$id'";
    // $sql ="INSERT INTO `goods` (`username`, `password`) VALUES ('$dl', '$mima')";

    $res = mysqli_query($con,$sql);


    if(!$res){
        die('error for mysql:' . mysqli_error());
    }

    $row = mysqli_fetch_assoc($res);

    echo json_encode(array(
        "code" =>1,
        "massage" =>"获取商品信息成功",
        "detail"=>$row
    ))

    

?>