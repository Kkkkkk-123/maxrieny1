
<?php
    $username = $_GET['username'];
    $id = $_GET['goods_id'];


    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

    $sql ="DELETE FROM `car` WHERE `username` = '$username' AND `goods_id` = '$id'";

    $res = mysqli_query($con,$sql);


    if(!$res){
        die('数据库链接失败' . myslqi_error($con));
    }

    print_r(json_encode(array('code'=>'$res','msg'=>'删除成功'),JSON_UNESCAPED_UNICODE));



?>  