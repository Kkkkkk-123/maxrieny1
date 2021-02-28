<?php

$con=mysqli_connect('qianfeng.io','qf','123456','qianfeng_io');

$sql ="SELECT * FROM `goods` ";

$res = mysqli_query($con,$sql);


$row = mysqli_fetch_assoc($res);



$arr = array();
while($row){
    array_push($arr,$row);
    $row = mysqli_fetch_assoc($res);

}
print_r(json_encode($arr));


?>