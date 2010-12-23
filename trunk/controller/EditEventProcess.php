<?php
include '../model/Model.php';
$ownID=$_COOKIE['ownID'];
$eventID=$_POST['eventID'];
$model=new Model();

//Sua
$eventNameEdited=$_POST['eventName'];
$eventStartDateEdited=$_POST['eventStartDate'];
$eventEndDateEdited=$_POST['eventEndDate'];
$eventStartTimeEdited=$_POST['eventStartTime'];
$eventEndTimeEdited=$_POST['eventEndTime'];
$eventIntroEdited=$_POST['eventIntro'];
$eventType=$_POST['eventType'];
$eventStartEdited=$eventStartDateEdited." ".$eventStartTimeEdited;
$eventEndEdited=$eventEndDateEdited." ".$eventEndTimeEdited;

$eventEdited=new Event($eventID,$eventNameEdited,$ownID,$eventStartEdited,$eventEndEdited,$eventIntroEdited,$eventType,'0','1');
$check=$model->updateEvent($eventEdited);
var_dump($eventEdited);
Header("Location: ../controller/EventIntro.php?id=$eventID&flag=3"); 
//Header("Location: ../controller/home.php?id='$ownID'"); 
?>