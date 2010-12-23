<?php
include '../model/Model.php';
$ownID=$_COOKIE['ownID'];
$model=new Model();
$eventID=$model->getID();
$eventName=$_POST['eventName'];
$eventStartDate=$_POST['eventStartDate'];
$eventEndDate=$_POST['eventEndDate'];
$eventStartTime=$_POST['eventStartTime'];
$eventEndTime=$_POST['eventEndTime'];
$eventIntro=$_POST['eventIntro'];
$eventPermit=$_POST['eventType'];
$eventStart=$eventStartDate." ".$eventStartTime;
$eventEnd=$eventEndDate." ".$eventEndTime;
$event=new Event($eventID,$eventName,$ownID,$eventStart,$eventEnd,$eventIntro,$eventPermit,'0','1');
$check=$model->setNewEvent($event);
$inviteFriends=$_POST['invite'];
if($check==0){
	echo $eventID;
if ($inviteFriends!=NULL){
	 foreach ($inviteFriends as $friend){
	 	//echo $friend;
	 	//echo $eventID."<br>";
	 	$result=$model->inviteToEvent($eventID,$friend);
	 }
}

}
else 
 echo "loi o phan setNewEvent";
Header("Location: ../controller/EventIntro.php?id=$eventID&flag=3"); 
?>