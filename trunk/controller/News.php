<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include '../model/Model.php';
$ownID = $_COOKIE ['ownID'];
date_default_timezone_set ( " Asia/Ho_Chi_Minh" );
?>


<?php
$time = date ( "Y-m-d H:i:s" );
$model = new Model ();
$user = $model->getUserAccountByID ( $ownID );
$avatar1 = $user->getUserAvatar ();
$userName = $user->getUserName ();
$postList = $model->getNews ( $ownID, $time ); // List Post tren trang $ownID
$commentList = array ();
$commentListContent = array ();
$commentUserAvatar = array ();
$commentUserName = array ();
if ($postList != NULL) {
	foreach ( $postList as $post ) {
		if ($post->getPostKind () == 0) {
			$postPosition = $post->getPostPosition ();
			$postCreator = $post->getPostCreator ();
			if ($postPosition == $ownID){
				$check[]=1; //duoc post tren wall thsng dang nhap
				$postedName[]='wall minh';
				$postedID[]='wall minh';
			}
			//else $check[]=1;
			else{
				//id cua thang post dc len
				if ($postCreator != $postPosition) {
					$postedUser = $model->getUserAccountByID ( $postPosition );
					//$postedEvent = $model->getEvent ( $postPosition );
					if ($postedUser != NULL) {
						$postedName[] = $postedUser->getUserName ();
						$postedID[]=$postedUser->getUserID();
						$check[]=2;  //post len wall thang khac
					}
					else {
						$postedEvent = $model->getEvent ( $postPosition );
						if ($postedEvent != NULL) {
						$postedName[] = $postedEvent->getEventName ();
						$postedID[]=$postedEvent->getEventID();
						$check[]=3; //post len Event
						}
					}
					//else if($model->getEvent( $postPosition ) != NULL){
						
					//}
					/*if ($postedEvent != NULL) {
						$postedName[] = $postedEvent->getEventName ();
						$postedID[]=$postedEvent->getEventID();
						//$check[]=3; //post len Event
					}*/
					//$check[]=2; //Post len wall thang khac hoac event
				} else{
					$postedName[] = 'wall no'; // List My....
					$check[]=4; //Tu post len wall chinh no
					$postedID[]='wall no';
				}
			}
			//$arrPostAuthor[]=
			$postTime[]=$post->getPostDate();
			$postCreatorID[]=$post->getPostCreator ();
			$postUserName [] = $model->getUserAccountByID ( $post->getPostCreator () )->getUserName ();
			$postUserAvatar [] = $model->getUserAccountByID ( $post->getPostCreator () )->getUserAvatar ();
			$arrPost [] = $post; // List My Status tren Wall,cho len cao
			$postID = $post->getPostID ();
			$commentList [$postID] = $model->getCommentList ( $postID );
			for($i = 0; $i < count ( $commentList [$postID] ); $i ++) {
				$commentListContent [$postID] [$i] = $commentList [$postID] [$i]->getCommentContent ();
				$commentUserID = $commentList [$postID] [$i]->getCommentCreator ();
				//echo $commentUserID."<br>";
				$user = $model->getUserAccountByID ( $commentUserID );
				//echo $user->getUserAvatar()."<br>";
				//$commentUserAvatar[$postID][$i]=$model->getUserAccountByID($commentUserID)->getUserName();
				//$commentUserName[$postID][$i]=$model->getUserAccountByID($commentUserID)->getUserAvatar();
				$commentUserAvatar [$postID] [$i] = $user->getUserAvatar ();
				$commentUserName [$postID] [$i] = $user->getUserName ();
				
			}
		
		}
		//$arrMyPost[$name]=$post;  
	}

}

//echo $commentUserAvatar[52][0];
$friendList = $model->getFriendList ( $ownID );

foreach ( $friendList as $item ) {
	$friendName [] = $item->getUserName ();
	$friendAvatar [] = $item->getUserAvatar ();
	$friendID [] = $item->getUserID ();

}
//Requesting FriendList
$requestFriendList = $model->getRequestingFriendList ( $ownID );
if ($requestFriendList != NULL) {
	foreach ( $requestFriendList as $item ) {
		$requestFriendName [] = $item->getUserName ();
		$requestFriendID [] = $item->getUserID ();
		$requestFriendAvatar [] = $item->getUserAvatar ();
	
	}
}

// Suggestion Friend List
$randomFriendList=$model->suggestFriendList($ownID);  //Mang doi tuong user
if ($randomFriendList != NULL)
{
foreach($randomFriendList as $item)
{
$randomFriendID[]=$item->getUserID();
$randomFriendAvatar[]=$item->getUserAvatar();
$randomFriendName[]=$item->getUserName();
}
}
include '../view/News.php';

?>
</body>
</html>