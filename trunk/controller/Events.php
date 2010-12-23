<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
 include '../model/Model.php';
 include '../controller/userDetail.php';
 $ownID=$_COOKIE['ownID'];
 $model=new Model();
 $yourEvent=$model->getYourEvent($ownID);
 if($yourEvent!=NULL){
		foreach($yourEvent as $yourEventList){
			$yourEventID[]=$yourEventList->getEventID();
			$yourEventName[]=$yourEventList->getEventName();
			$yourEventBegin[]=$yourEventList->getStartTime();
		}
 }
 $eventAttended=$model->getEventAttended($ownID);
 if($eventAttended!=NULL){
		foreach($eventAttended as $attendedList){
			$attendedID[]=$attendedList->getEventID();
			$attendedName[]=$attendedList->getEventName();
			$attendedBegin[]=$attendedList->getStartTime();
		}
 }
 $eventRequest=$model->getEventRequest($ownID);
 if($eventRequest!=NULL){
		foreach($eventRequest as $requestList){
			$requestID[]=$requestList->getEventID();
			$requestName[]=$requestList->getEventName();
			$requestBegin[]=$requestList->getStartTime();
		}
 }
 include "../view/Events.php";
?>
</body>
</html>