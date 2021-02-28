<?php
    $id = $_GET['goods_id'];
    $num = $_GET['goods_num'];
    $username = $_GET['username'];

    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

    $sql = "UPDATE `car` SET `goods_num` = '$num' WHERE `username` = 'username' AND `goods_id` = '$id'";

    $res = mysqli_query($con,$sql);


    if(!$res){
        die('数据库链接失败' . myslqi_error($con));
    }

    print_r(json_encode(array('code'=>$res,'msg'=>'修改成功'),JSON_UNESCAPED_UNICODE));





?>