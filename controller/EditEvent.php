<?php
include '../model/Model.php';
$ownID=$_COOKIE['ownID'];
$eventID=$_POST['eventID'];
$model=new Model();
$event=$model->getEvent($eventID);
$eventCreatorID=$event->getEventCreator();
$eventCreator=$model->getUserAccountByID($eventCreatorID);
//echo event
$eventCreatorName=$eventCreator->getUserName();
$eventName=$event->getEventName();
$eventStart=$event->getStartTime();
$eventEnd=$event->getEndTime();
$eventIntro=$event->getEventIntro();
include '../view/EditEvent.php';
?>