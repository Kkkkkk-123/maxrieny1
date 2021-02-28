<?php


    $username=$_GET['username'];
    $goods_id=$_GET['goods_id'];

    $con = mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

    $sql="SELECT * FROM `car` WHERE `username` = '$username'";

    $res = mysqli_query($con,$sql);

    $arr = array();

    while($row = mysqli_fetch_assoc($res)){
        array_push($arr,$row);
    };

    $arr1=array();

    for($i=0;$i<count($arr);$i++){
    
    $qq =$arr[$i]['goods_id'];

    $sql1="SELECT *FROM `goods` WHERE `goods_id` = '$qq'";

    $res1=mysqli_query($con,$sql1);
    $row1 =mysqli_fetch_assoc($res1);
    array_push($arr1,$row1);

    }
    print_r(json_encode(array('data1'=>$arr,'data2'=>$arr1)));

 



?>