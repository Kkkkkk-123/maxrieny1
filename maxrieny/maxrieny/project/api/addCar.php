<?php
    $goods_id = $_POST['goods_id'];
    $username = $_POST['username'];


    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');


    $sql = "SELECT * FROM `car` WHERE `username` = '$username' AND `goods_id` = '$goods_id'";

    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' . myslqi_error($con));
    }

    $row = mysqli_fetch_assoc($res);

    if(!$row){
        $addSql = "INSERT INTO `car` VALUES (null,'$username','$goods_id','1')";

        $addRes =mysqli_query($con,$addSql);
        if(!$addRes){
            die('数据库链接失败' . myslqi_error($con));
        }
        print_r(json_encode(array('code'=>$addRes,"msg"=>"添加成功"),JSON_UNESCAPED_UNICODE));
    }else{
        print_r($row);
        $goods_num = ++$row['goods_num'];
        print_r($row);
        $updata = "UPDATE `car` SET `goods_num` = '$goods_num' AND `username` = '$username'";

        $updataRes = mysqli_query($con,$updata);

        if(!$updataRes){
            die('数据库链接错误' . mysqli_error($con));
        }

        print_r(json_encode(array('code'=>$updataRes,"msg"=>'成功'),JSON_UNESCAPED_UNICODE));
    }
?>