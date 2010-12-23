<html><head></head>
<body>
<?php 
  include '../model/Model.php';
  $ownID=$_COOKIE['ownID'];
  setcookie("ownID",$ownID,time()+3600);
  
  ?>


<?php
	
	
	$model=new Model();
	$visitorID=$ownID;
	$currentUser=$model->getUserAccountByID($visitorID);
	$currentUserName=$currentUser->getUserName();
	setcookie("visitorID",$visitorID,time()+3600);
	if($_GET["id"]!=NULL){
		$desID=$_GET[id];
		
	//echo $desID;   /// Trang cua desID
		setcookie("desID",$desID,time()+3600);
		$ownID=$desID;
	}    // Hien thi thong tin
	else{
		$desID=$ownID;
		setcookie("desID",$desID,time()+3600);
	}
	$user=$model->getUserAccountByID($ownID);
	
// Get basic Info
$time = time();
$curtime=date("y-m-d H:i:s");
$userSchoolYear=$user->getUserSchoolYear();
$userSex=$user->getUserSex();
$year=date("Y");
$userBirthday=$user->getUserBirthday();
$userYear=substr($userBirthday,0,4);
$userAge=$year-$userYear;

	$avatar1=$user->getUserAvatar();
	$userName=$user->getUserName();
	$postList= $model->getPostList($ownID,$curtime); // List Post tren trang $ownID
	$commentList=array();
	$commentListContent=array();
	$commentUserAvatar=array();
	$commentUserName=array();
	$commentTime=array();
	if($postList!=NULL){
		foreach($postList as $post){
			if($post->getPostKind()==0){
			
			                      // List My....
			//$arrPostAuthor[]=
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
				$commentTime[$postID][$i]=$commentList[$postID][$i]->getCommentDate();
				$commentUserAvatar[$postID][$i]=$user->getUserAvatar();
				$commentUserName[$postID][$i]=$user->getUserName();
				
			}
		
	}
		//$arrMyPost[$name]=$post;  
	}
	
	}
	
	//echo $commentUserAvatar[52][0];
	//$checkFriend=-1 ;  // bien trang thai Friend
	$checkFriend=$model->checkFriend($visitorID,$ownID);
	
	if($visitorID == $desID)$checkFriend=0;  // Trung
	$friendList=$model->getFriendList($ownID);
	
	foreach ($friendList as $item)
	{
		$friendName[]= $item->getUserName();
		$friendAvatar[]=$item->getUserAvatar();
		$friendID[]=$item->getUserID();
		//if($item->getUserAvatar()==$visitorID)$checkFriend=1; // Da la ban
		
		
	}
	
	include '../view/Home.php';
	
  	
	
?>
</body>
</html>