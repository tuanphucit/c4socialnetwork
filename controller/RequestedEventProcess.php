<?php
include '../model/Model.php';
  $ownID=$_COOKIE['ownID'];
  $model=new Model();
if($_POST['accept'])
	$process=2;
if($_POST['deny'])
	$process=-1;
$eventID=$_POST['eventID'];
$check=$model->confirmEvent($eventID,$ownID,$process);
$flag=1;
Header("Location: ../controller/eventIntro.php?id=$eventID&flag=$flag");   
?>