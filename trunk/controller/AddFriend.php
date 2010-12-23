<?php
include '../model/Model.php';
$ownID=$_GET["desID"];
$friendID=$_GET["friendID"];
$responce="hello $ownID "."$friendID";
echo $responce;
$model=new Model();
$model->requestFriend($ownID,$friendID);

//Header("Location: ../controller/home.php?id='1'");  

?>