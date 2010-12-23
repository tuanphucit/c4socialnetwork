<?php
include '../model/Model.php';
include '../controller/UserDetail.php';
$eventID=$_GET['id'];
$flag=$_GET['flag'];
$desID=$eventID;
setcookie("desID",$desID,time()+3600);

$model=new Model();
$time = time();
$curtime=date("y-m-d H:i:s");

$event=$model->getEvent($eventID);
$eventCreatorID=$event->getEventCreator();
$eventCreator=$model->getUserAccountByID($eventCreatorID);

$eventCreatorName=$eventCreator->getUserName();
$eventName=$event->getEventName();
$eventStart=$event->getStartTime();
$eventEnd=$event->getEndTime();
$eventIntro=$event->getEventIntro();
$eventJoinList=$model->getEventJoinList($eventID);
if($eventJoinList!=NULL){
	foreach($eventJoinList as $joinUser){
		$userJoin[]=$joinUser->getUserName();
		$userJoinID[]=$joinUser->getUserID();
		$userJoinAvatar[]=$joinUser->getUserAvatar();
	}
}

$postList= $model->getPostList($eventID,$curtime); 
$commentList=array();
$commentListContent=array();
$commentUserAvatar=array();
$commentUserName=array();
if($postList!=NULL){
	foreach($postList as $post){
		    if($post->getPostKind()==0){
			
			                      // List My....
			$postTime[]=$post->getPostDate();
			$postUserName[]=$model->getUserAccountByID($post->getPostCreator())->getUserName();
			$postUserAvatar[]=$model->getUserAccountByID($post->getPostCreator())->getUserAvatar();
			$arrPost[]=$post;                      // List My Status tren Wall,cho len cao
			$postID = $post->getPostID();    
			 $commentList[$postID]=$model->getCommentList($postID);
			 for($i=0;$i<count($commentList[$postID]);$i++){
				$commentListContent[$postID][$i]=$commentList[$postID][$i]->getCommentContent();
				$commentUserID=$commentList[$postID][$i]->getCommentCreator();
				//echo $commentUserID."<br>";
				$user=$model->getUserAccountByID($commentUserID);
				//echo $user->getUserAvatar()."<br>";
				//$commentUserAvatar[$postID][$i]=$model->getUserAccountByID($commentUserID)->getUserName();
				//$commentUserName[$postID][$i]=$model->getUserAccountByID($commentUserID)->getUserAvatar();
				$commentUserAvatar[$postID][$i]=$user->getUserAvatar();
				$commentUserName[$postID][$i]=$user->getUserName();
				
			}
		
	}
		//$arrMyPost[$name]=$post;  
	}
	
	}
include '../view/EventIntro.php';
?>