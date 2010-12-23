<?php
include '../config/Config.php';
include 'UserInfo.php';
include 'UserAccount.php';
include 'Post.php';
include 'Event.php';
include 'Comment.php';
include 'CommentNotification.php';
include 'Group.php';
/*define ( 'DB_NAME', 'c4socialnet' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', 'sinhvien89' );
define ( 'DB_HOST', 'localhost' );
*/

class Model {
	private $DB_NAME;
	private $DB_USER;
	private $DB_PASSWORD;
	private $DB_HOST;
	/* Bien connect voi DB dung de dong va mo ket noi*/
	private $mysqli;
	/*Phuong thuc khoi tao lop Model dong thoi tao ket noi */
	function __construct() {
		$this->DB_NAME = DB_NAME;
		$this->DB_USER = DB_USER;
		$this->DB_PASSWORD = DB_PASSWORD;
		$this->DB_HOST = DB_HOST;
		$this->mysqli = new mysqli ( $this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME );
		//$mysqli = new mysqli ( 'localhost', 'root', 'sinhvien89', 'c4socialnet' );
		if (mysqli_connect_errno ()) {
			printf ( "Connect failed: %s\n", mysqli_connect_error () );
			exit ();
		}
		$this->mysqli->set_charset ( "utf8" );
	}
	/*Phuong thuc ngat ket noi, khi lay xong thi goi phuong thuc nay dong lai
	 * ket noi den DB */
	public function closeConnect() {
		$this->mysqli->close ();
	}
	/* Phuong thuc lay ID cho Event va User tu dong tu DB 
	 * */
	public function getID() {
		$getID = $this->mysqli->prepare ( 'SELECT max(c4_id) from c4_parent' );
		$getID->execute ();
		$getID->bind_result ( $userID );
		$getID->fetch ();
		if ($userID == 0) {
			$userID = 1;
		}
		return ($userID + 1);
	}
	public function getGroupID(){
		$getID=$this->mysqli->prepare('SELECT max(group_id)FROM c4_group');
		$getID->execute();
		$getID->bind_result($groupID);
		$getID->fetch();
		if($groupID==0) $groupID==1;
		return $groupID+1;
	}
	public function getGroupInfo($groupID){
		$getID=$this->mysqli->prepare('SELECT * FROM c4_group WHERE group_id=?');
		if($getID){
		$getID->bind_param('i',$groupID);
		$getID->execute();
		$getID->bind_result($groupID,$groupName,$groupLeader);
		$getID->fetch();
		$groupInfo= new Group ($groupID,$groupName,$groupLeader);
		$getID->close();
		return $groupInfo;
		}
    		
	}
	public function setGroupInfo($group){
		$result=$this->mysqli->prepare('INSERT INTO c4_group 
		(group_id,group_name,group_leader) VALUES (?,?,?)');
		if($result){
			$result->bind_param('isi',$group->getGroupID(),$group->getGroupName(),$group->getGroupLeader());
			$result->execute();
		//$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new group fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
			
		}
		return 0;
	}
	public function setNewMemberToGroup($groupID,$userID){
		$result=$this->mysqli->prepare('INSERT INTO c4_grouplist 
		(group_id,user_id) VALUES (?,?)');
		if($result){
			$result->bind_param('ii',$groupID,$userID);
			$result->execute();
		//$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo "add new member to  group $groupID fail";
				$result->close ();
				return - 1;
			}
			$result->close ();
			
		}
		return 0;	
	}
	public function removeMemberFromGroup($groupID,$userID){
		$result=$this->mysqli->prepare('DELETE FROM  c4_grouplist 
		WHERE group_id=? AND user_id=?');
		if($result){
			$result->bind_param('ii',$groupID,$userID);
			$result->execute();
		//$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo "remove member from group $groupID fail";
				$result->close ();
				return - 1;
			}
			$result->close ();
			
		}
		return 0;	
	}
public function getGroupMemberList($groupID){
		$getID=$this->mysqli->prepare('SELECT user_id FROM c4_grouplist WHERE group_id=?');
		if($getID){
		$getID->bind_param('i',$groupID);
		$getID->execute();
		$getID->bind_result($userID);
		while($getID->fetch()){
		$userIDList [] = $userID;
		}
		$getID->close();
		foreach($userIDList as $userID){
			$userList []= $this->getUserAccountByID($userID);
		}
		return $userList;
		}
    		
	}
	public function updateGroupInfo($group){
			$result=$this->mysqli->prepare('UPDATE c4_group SET group_name=?,group_leader=? 
			WHERE group_id=?' );
		if($result){
			$result->bind_param('sii',$group->getGroupName(),$group->getGroupLeader(),$group->getGroupID());
			$result->execute();
		//$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update group fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
			
		}
		return 0;
	}
	public function getPostID() {
		$getID = $this->mysqli->prepare ( 'SELECT max(post_id) from c4_post' );
		if ($getID) {
			$getID->execute ();
			$getID->bind_result ( $postID );
			$getID->fetch ();
			if ($postID == 0) {
				$postID = 0;
			}
		} else {
			echo 'query to C4_post fail';
			return - 1;
		}
		return ($postID + 1);
	}
	
	public function getCommentID() {
		$getID = $this->mysqli->prepare ( 'SELECT max(comment_id) from c4_comment' );
		if ($getID) {
			$getID->execute ();
			$getID->bind_result ( $commentID );
			$getID->fetch ();
			if ($commentID == 0) {
				//echo 'get numbers of id fail';
				//return -1;
				$commentID = 0;
			}
		} else {
			echo 'query to C4_comment fail';
			return - 1;
		}
		return ($commentID + 1);
	}
	/*Phuong thuc lay ra toan bo thong tin cua account de  hien thi +
	 *  dung khi login vao he thong */
	public function getUserAccount($userLogin) {
		$result = $this->mysqli->prepare ( 'SELECT user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,
		user_status,user_birthday,user_sex FROM c4_user where user_login =?' );
		if ($result) {
			$result->bind_param ( 's', $userLogin );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			//printf("\n %s \n",$userID);
			$result->fetch ();
			$user = new UserAccount ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			$result->close;
		}
		return $user;
	
	}
	/* dua ra list nguoi dung bi banned co truong user_role=0
	 * */
	public function getBannedUserAccount(){
			$result = $this->mysqli->prepare ( 'SELECT user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,
		user_status,user_birthday,user_sex FROM c4_user where user_role=0' );
		if ($result) {
			//$result->bind_param ( 's', $userLogin );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			//printf("\n %s \n",$userID);
			while($result->fetch ())
			$user []  = new UserAccount ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			$result->close;
		}
		return $user;
	}
	public function getUserAccountByID($userID) {
		$result = $this->mysqli->prepare ( 'SELECT user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,
		user_status,user_birthday,user_sex FROM c4_user where user_id =?' );
		if ($result) {
			$result->bind_param ( 'i', $userID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			//printf("\n %s \n",$userID);
			$result->fetch ();
			$user = new UserAccount ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			$result->close;
			return $user;
		}
	
	}
	public function getUserInfo($userID) {
		$result = $this->mysqli->prepare ( 'SELECT user_url,user_ym,user_skype,user_mobile,user_resident,
		user_nativeVillage,user_favoriteQuote,user_bio,user_book,user_music,user_interested 
		FROM c4_user where user_id =?' );
		
		if ($result) {
			$result->bind_param ( 'i', $userID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $userUrl, $userYM, $userSkype, $userMobile, $userResident, $userNativeVillage, $userFavoriteQuote, $userBio, $userBook, $userMusic, $userInterested );
			//printf("\n %s \n",$userID);
			$result->fetch ();
			$user = new UserInfo ( $userUrl, $userYM, $userSkype, $userMobile, $userResident, $userNativeVillage, $userFavoriteQuote, $userBio, $userBook, $userMusic, $userInterested );
			
			$result->close;
		}
		return $user;
	
	}
	public function getYourEvent($userID) {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_event where event_creatorID= ? order by event_starttime DESC' );
		if ($result) {
			$result->bind_param ( 'i', $userID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $eventID, $eventName, $eventCreator, $eventStartTime, $eventEndTime, $eventIntro );
			//printf("\n %s \n",$userID);
			while ( $result->fetch () ) {
				$event [] = new Event ( $eventID, $eventName, $eventCreator, $eventStartTime, $eventEndTime, $eventIntro );
			}
			$result->close;
			return $event;
		}
	
	}
	
	/*Phuong thuc getEvent bang UserID*/
	public function getEventAttended($userID) {
		date_default_timezone_set ( " Asia/Ho_Chi_Minh" );
		$curtime = date ( "y-m-d H:i" );
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_event where event_starttime > ? and event_id IN(Select event_id
		  FROM c4_eventattend WHERE user_ID=? AND eventattend_status >=1) order by event_starttime ASC' );
		if ($result) {
			$result->bind_param ( 'si', $curtime, $userID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			//printf("\n %s \n",$userID);
			while ( $result->fetch () ) {
				$event [] = new Event ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			}
			$result->close ();
			return $event;
		}
	
	}
	public function getEventRequest($userID) {
		date_default_timezone_set ( " Asia/Ho_Chi_Minh" );
		$curtime = date ( "y-m-d H:i" );
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_event where event_starttime > ? and event_id IN(Select event_id
		  FROM c4_eventattend WHERE user_ID=? AND eventattend_status=0) order by event_starttime ASC' );
		if ($result) {
			$result->bind_param ( 'si', $curtime, $userID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			//printf("\n %s \n",$userID);
			while ( $result->fetch () ) {
				$event [] = new Event ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			}
			$result->close ();
			return $event;
		}
	
	}
	
	//public function getEvent
	/*Phuong thuc lay ra toan bo tin tuc cua ban be tren wall */
	public function getEvent($eventID) {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_event where event_id =?' );
		if ($result) {
			$result->bind_param ( 'i', $eventID );
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			//printf("\n %s \n",$userID);
			$result->fetch ();
			$event = new Event ($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved);
			$result->close ();
			return $event;
		
		}
	}
	/* Dua ra danh sach ID user tham gia su kien bang eventID*/
	public function getEventJoinList($eventID) {
		$result = $this->mysqli->prepare ( 'SELECT user_id FROM c4_eventattend WHERE event_ID=? 
	 AND eventattend_status= 2' );
		if ($result) {
			$result->bind_param ( 'i', $eventID );
			$result->execute ();
			$result->bind_result ( $userID );
			
			while ( $result->fetch () ) {
				// var_dump($userID);
				// echo "<br>";
				$userIDList [] = $userID;
			
			}
			$result->close ();
			foreach ( $userIDList as $userID ) {
				$userList [] = $this->getUserAccountByID ( $userID );
			}
			return $userList;
		}
	}
	/*Dua ra mang UserAccount danh sach friend chua tham gia Event*/
	public function getEventHaventInvitedFriendList($eventID, $userID) {
		//$friendList= $this->getFriendList($userID);
		$result = $this->mysqli->prepare ( '(SELECT c4_friend.friend_id FROM c4_friend
			WHERE c4_friend.user_id =?
			AND c4_friend.friend_status =1
			AND c4_friend.friend_id NOT IN (SELECT user_id FROM c4_eventattend WHERE event_ID=?
	 		AND eventattend_status= 2)
			)	
		UNION (
		SELECT c4_friend.user_id
		FROM c4_friend
		WHERE c4_friend.friend_id =?
		AND c4_friend.friend_status =1
		AND c4_friend.user_id NOT IN (SELECT user_id FROM c4_eventattend WHERE event_ID=?
	 AND eventattend_status= 2))' );
		if ($result) {
			$result->bind_param ( 'iiii', $userID, $eventID, $userID, $eventID );
			$result->execute ();
			$result->bind_result ( $userID );
			while ( $result->fetch () ) {
				// var_dump($userID);
				// echo "<br>";
				$userIDList [] = $userID;
			
			}
			$result->close ();
			foreach ( $userIDList as $userID ) {
				$userList [] = $this->getUserAccountByID ( $userID );
			}
			return $userList;
		
		}
	}
	public function getNews($userID, $time) {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_post where post_position != ? AND post_date <=? AND post_approved=1 AND post_creator 
		IN( SELECT user_id FROM c4_friend WHERE friend_id=? and friend_status=1) 
		UNION(
			SELECT * FROM c4_post WHERE post_position !=? AND post_date<=? AND post_approved=1 AND post_creator IN(
 				SELECT friend_id FROM c4_friend WHERE user_id=? and friend_status=1
			)
		)
		order by post_Date DESC LIMIT 10' );
		if ($result) {
			$result->bind_param ( "isiisi", $userID, $time, $userID, $userID, $time, $userID );
			$result->execute ();
			$count = $result->num_rows;
			//var_dump($count);
			//var_dump ( $result );
			$result->bind_result ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
			//var_dump($count);
			while ( $result->fetch () ) {
				$postList [] = new Post ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
				//$i ++;
			}
			$result->close;
		}
		//	$this->mysqli->close();
		return $postList;
	}
	public function getPostList($postPosition, $time) {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_post where post_position=? AND post_date <=? and post_approved=1 order by post_Date DESC LIMIT 10' );
		if ($result) {
			$result->bind_param ( "is", $postPosition, $time );
			$result->execute ();
			$count = $result->num_rows;
			//var_dump($count);
			//var_dump ( $result );
			$result->bind_result ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
			//var_dump($count);
			while ( $result->fetch () ) {
				$postList [] = new Post ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
				//$i ++;
			}
			$result->close;
			return $postList;
		}
		//	$this->mysqli->close();
	

	}
	public function getDerogationPostList() {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_post where post_flag=1 AND post_approved=1 order by post_Date DESC' );
		if ($result) {
			//$result->bind_param ( "i", $postFlag );
			$result->execute ();
			$count = $result->num_rows;
			//var_dump($count);
			//var_dump ( $result );
			$result->bind_result ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
			//var_dump($count);
			while ( $result->fetch () ) {
				$postList [] = new Post ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
				//$i ++;
			}
			$result->close;
			return $postList;
		}
		//	$this->mysqli->close();
	

	}
	/*
	 * Cho thao luan
	 * */
	public function getPostListOnWall() {
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_post where post_position=? order by post_Date DESC' );
		if ($result) {
			$result->bind_param ( "i", $postPosition );
			$result->execute ();
			$count = $result->num_rows;
			//var_dump($count);
			//var_dump ( $result );
			$result->bind_result ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
			//var_dump($count);
			while ( $result->fetch () ) {
				$postList [] = new Post ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink, $postFlag, $postApproved );
				//$i ++;
			}
			$result->close;
		}
		//	$this->mysqli->close();
		return $postList;
	}
	/*Phuong thuc lay ra toan bo comment cho 1 post xac dinh */
	public function getCommentList($commentPosition) {
		
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_comment where comment_position=? and comment_approved=1 order by comment_Date DESC' );
		if ($result) {
			$result->bind_param ( "i", $commentPosition );
			$result->execute ();
			$count = $result->num_rows;
			$result->bind_result ( $commentID, $commentCreator, $commentPosition, $commentDate, $commentContent, $commentFlag, $commentApproved );
			while ( $result->fetch () ) {
				$commentList [] = new Comment ( $commentID, $commentCreator, $commentPosition, $commentDate, $commentContent, $commentFlag, $commentApproved );
			
			}
			$result->close;
		}
		return $commentList;
	}
	public function getDerogationCommentList() {
		
		$result = $this->mysqli->prepare ( 'SELECT * FROM c4_comment where comment_flag=1 order by comment_Date ASC' );
		if ($result) {
			//$result->bind_param ( "i", $commentPosition );
			$result->execute ();
			$count = $result->num_rows;
			$result->bind_result ( $commentID, $commentCreator, $commentPosition, $commentDate, $commentContent, $commentFlag, $commentApproved );
			while ( $result->fetch () ) {
				$commentList [] = new Comment ( $commentID, $commentCreator, $commentPosition, $commentDate, $commentContent, $commentFlag, $commentApproved );
			
			}
			$result->close;
		}
		return $commentList;
	}
	/* Phuong thuc lay ra mang danh sach ban be
   * Input : Doi tuong User Account
   * Output : mang doi tuong User Account
   * */
	public function getFriendList($userID) {
		//$userAccount= new UserAccount();
		$result = $this->mysqli->prepare ( 'SELECT user_id, user_password, user_login, user_name,
		  user_seniorID, user_avatar, user_role, user_email, user_schoolyear, user_status,
		   user_birthday, user_sex FROM c4_user WHERE c4_user.user_id IN (
			SELECT c4_friend.friend_id FROM c4_friend
			WHERE c4_friend.user_id =?
			AND c4_friend.friend_status =1
			)
		UNION (
		SELECT user_id, user_password, user_login, user_name, user_seniorID, user_avatar,
		 user_role, user_email, user_schoolyear, user_status, user_birthday, user_sex
			FROM c4_user
		WHERE c4_user.user_id
		IN(
		SELECT c4_friend.user_id
		FROM c4_friend
		WHERE c4_friend.friend_id =?
		AND c4_friend.friend_status =1))' );
		if ($result) {
			$result->bind_param ( 'ii', $userID, $userID );
			$result->execute ();
			$result->bind_result ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			while ( $result->fetch () ) {
				$friendList [] = new UserAccount ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			}
			$result->close ();
		}
		return $friendList;
	}
	/* Phuong thuc lay ra mang danh sach ban be da moi
   * Input : Doi tuong User Account
   * Output : mang doi tuong User Account
   * */
	public function getRequestingFriendList($userID1) {
		//$userAccount= new UserAccount();
		$result = $this->mysqli->prepare ( 'SELECT user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,user_status,user_birthday,user_sex FROM c4_user
		WHERE c4_user.user_id IN 
		(SELECT c4_friend.user_id  FROM c4_friend 
		WHERE c4_friend.friend_id=? AND c4_friend.friend_status=0)' );
		if ($result) {
			$result->bind_param ( 'i', $userID1 );
			$result->execute ();
			$result->bind_result ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			while ( $result->fetch () ) {
				$requestedFriendList [] = new UserAccount ( $userID, $userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, $userRole, $userEmail, $userSchoolYear, $userStatus, $userBirthday, $userSex );
			}
			$result->close ();
		}
		return $requestedFriendList;
	}
	
	public function getCommentNotification($userID) {
		$result = $this->mysqli->prepare ( 'SELECT * FROM comment_notification WHERE user_id=?' );
		if ($result) {
			$result->bind_param ( 'i', $userID );
			$result->execute ();
			$result->bind_result ( $commentID, $commentCreatorID, $commentPositionID, $userID, $postPositionID, $postKind, $commentDate );
			//$commentQuery= $this->mysqli->prepare("SELECT user_name FROM c4_user where user_id= ?");
			while ( $result->fetch () ) {
				$commentNotification = new CommentNotification ( $commentID, $commentCreatorID, $postPositionID, $commentPositionID, $postKind, $commentDate );
			
			}
			//$commentQuery->close();
			$result->close ();
			return $commentNotification;
		}
	}
	/*public function getPostNotification($userID){
		$result=$this->mysqli->prepare("SELECT * FROM post_notification WHERE user_id=?");
		if($result){
			$result->bind_param('i',$userID);
			$result->execute();
			$result->bind_result($postID,$postPositionID,$postCreatorID,$userID,$postDate);
		    while($result->fetch()){
		    	$postNotification = new PostNotification($postID,$postPositionID,$postCreatorID,$postDate);
		    }
		    $result->close();
		    return $postNotification;
		}
	}
	*/
	public function setNewUser($newUser) {
		//$newUser=new UserAccount();
		$getID = $this->mysqli->prepare ( 'INSERT INTO c4_parent (c4_approved) VALUES (?)' );
		if ($getID) {
			$unapproved = 0;
			$getID->bind_param ( 'i', $unapproved );
			$getID->execute ();
		} else {
			echo 'add new user fail when add id to parent';
			$getID->close ();
			return - 1;
		}
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_user ( user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,
		user_status,user_birthday,user_sex) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)' );
		//$userID, $userLogin, $userName, $userSeniorID, $userEmail, $userSchoolYear, $userBirthday, $userSex 
		if ($result) {
			$result->bind_param ( 'isssisisiiss', $newUser->getUserID (), $newUser->getUserPassword (), $newUser->getUserLogin (), $newUser->getUserName (), $newUser->getUserSeniorID (), $newUser->getUserAvatar (), $newUser->getUserRole (), $newUser->getUserEmail (), $newUser->getUserSchoolYear (), $newUser->getUserStatus (), $newUser->getUserBirthday (), $newUser->getUserSex () );
			//var_dump($result);
			$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new user fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	
	public function setNewEvent($newEvent) {
		//$newEvent= new Event();
		$getID = $this->mysqli->prepare ( 'INSERT INTO c4_parent (c4_approved) VALUES (?)' );
		if ($getID) {
			$unapproved = 0;
			$getID->bind_param ( 'i', $unapproved );
			$getID->execute ();
		} else {
			echo 'add new event fail when add id to parent';
			$getID->close ();
			return - 1;
		}
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_event ( event_ID,event_Name,event_CreatorID,event_StartTime,
		event_EndTime,event_Intro,event_public,event_flag,event_approved) VALUES (?,?,?,?,?,?,?,?,?)' );
		//$userID, $userLogin, $userName, $userSeniorID, $userEmail, $userSchoolYear, $userBirthday, $userSex 
		if ($result) {
			$result->bind_param ( 'isisssiii',$newEvent->getEventID (), $newEvent->getEventName (), $newEvent->getEventCreator(),$newEvent->getStartTime (),
			 $newEvent->getEndTime (), $newEvent->getEventIntro (), $newEvent->getEventPublic(),$newEvent->getEventFlag(),$newEvent->getEventApproved() );
			//var_dump($result);
			$result->execute ();
			$result->bind_param ( $check );
			$flag = $result->affected_rows;
			
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new event fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	/* Moi ban tham du vao Event bang UserID va EventID*/
	public function inviteToEvent($eventID, $userID) {
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_eventattend (event_id,user_id,eventattend_status) VALUES (?,?,0)' );
		if ($result) {
			$result->bind_param ( 'ii', $eventID, $userID );
			$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'invite to event fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	/* Tra loi khi nhan duoc loi moi:
     * set
     * 		$attend=2: Chac chan tham gia 
     * 		$attend=1 : co the tham gia
     *     $attend=-1 : khong tham gia 
     *    
     * 
     * */
	public function confirmEvent($eventID, $userID, $attend) {
		$result = $this->mysqli->prepare ( 'UPDATE C4_eventattend  SET eventattend_status=? 
		      WHERE event_id=? and user_id=? ' );
		if ($result) {
			$result->bind_param ( 'iii', $attend, $eventID, $userID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'join to event fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	/*Them post voi vao DB , da check*/
	public function setNewPost($newPost) {
		//$newPost= new Post();
		//echo $this->mysqli->character_set_name();
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_Post ( post_ID,post_Position,
		post_Creator,post_Kind,post_Date,post_Content,post_Link,post_Flag,post_approved) VALUES (?,?,?,?,?,?,?,?,?)' );
		//$userID, $userLogin, $userName, $userSeniorID, $userEmail, $userSchoolYear, $userBirthday, $userSex 
		if ($result) {
			$result->bind_param ( 'iiiisssii', $newPost->getPostID (), $newPost->getPostPosition (), $newPost->getPostCreator (), $newPost->getPostKind (), $newPost->getPostDate (), $newPost->getPostContent (), $newPost->getPostLink (), $newPost->getPostFlag (), $newPost->getPostApproved () );
			//var_dump($result);
			$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new user fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	public function setNewComment($newComment) {
		//$newComment= new Comment();
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_Comment ( comment_ID,comment_Creator,
		comment_Position,comment_Date,comment_Content,comment_flag,comment_Approved) VALUES (?,?,?,?,?,?,?)' );
		
		if ($result) {
			$result->bind_param ( 'iiissii', $newComment->getCommentID (), $newComment->getCommentCreator (), $newComment->getCommentPosition (), $newComment->getCommentDate (), $newComment->getCommentContent (), $newComment->getCommentFlag (), $newComment->getCommentApproved () );
			//var_dump($result);
			$result->execute ();
			//	var_dump($result);
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new comment fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	
	}
	public function setNewCommentNotification($commentID, $userID) {
		$result = $this->mysqli->prepare ( 'INSERT INTO c4_commentno
	 (comment_id,user_id) VALUES (?,?)' );
		if ($result) {
			$result->bind_param ( 'ii', $commentID, $userID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'add new comment Notification fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		
		}
		return 0;
	}
	public function setNewPostNotification($postID, $userID) {
		$result = $this->mysqli->prepare ( 'INSERT INTO c4_postno (post_id,user_id ) VALUES (?,?)' );
		if ($result) {
			$result->bind_param ( 'ii', $postID, $userID );
			$result->execute ();
			$flag = $result->affected_rows;
			if ($flag == 0 || $flag == - 1) {
				echo 'add new post notification fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	/* Cap nhat thong tin cua nguoi su dung.
 * Khi nguoi su dung vao trang cap nhat thong tin 
 * tu userID -> lay duoc doi tuong userInfo de hien thi va sua lai
 * error return -1;
 * ok return 0;
 * */
	public function updatePostFlag($postID, $flag) {
		$result = $this->mysqli->prepare ( 'UPDATE c4_post SET post_flag=? WHERE post_id=?' );
		if ($result) {
			$result->bind_param ( 'ii', $flag, $postID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update post Flag fail ';
				$result->close ();
				return - 1;
			}
			$result->close ();
		
		}
		return 0;
	}
	
	/* post $approved =1 -> duoc hien thi post
	 *      $approved=0 -> khong duoc hien thi post*/
	public function updatePostApproved($postID, $approved) {
		$result = $this->mysqli->prepare ( 'UPDATE c4_post SET post_approved=? WHERE post_id=?' );
		if ($result) {
			$result->bind_param ( 'ii', $approved, $postID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update post Flag fail ';
				$result->close ();
				return - 1;
			}
			$result->close ();
		
		}
		return 0;
	}
	public function updateCommentFlag($commentID, $flag) {
		$result = $this->mysqli->prepare ( 'UPDATE c4_comment SET comment_flag=? WHERE comment_id=?' );
		if ($result) {
			$result->bind_param ( 'ii', $flag, $commentID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update comment Flag fail ';
				$result->close ();
				return - 1;
			}
			$result->close ();
		
		}
		return 0;
	}
	public function updateCommentApproved($commentID, $approved) {
		$result = $this->mysqli->prepare ( 'UPDATE c4_comment SET comment_approved=? WHERE comment_id=?' );
		if ($result) {
			$result->bind_param ( 'ii', $approved, $commentID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update comment approved fail ';
				$result->close ();
				return - 1;
			}
			$result->close ();
		
		}
		return 0;
	}
	public function updateUserInfo($userID, $userInfo) {
		//$userInfo=new UserInfo();
		$result = $this->mysqli->prepare ( 'UPDATE c4_user SET user_url=?,user_ym=?,
		user_skype=?,user_mobile=?,user_resident=?,user_nativeVillage=?,
		user_favoriteQuote=?,user_bio=?,user_book=?,user_music=?,
		user_interested=?
        WHERE user_id=?' );
		if ($result) {
			$result->bind_param ( 'sssssssssssi', $userInfo->getUserUrl (), $userInfo->getUserYM (),
			 $userInfo->getUserSkype (), $userInfo->getUserMobile (), $userInfo->getUserResident (),
			  $userInfo->getUserNativeVillage (), $userInfo->getUserFavoriteQuote (),
			   $userInfo->getUserBio (), $userInfo->getUserBook (), $userInfo->getUserMusic (), 
			   $userInfo->getUserInterested (), $userID );
			//echo "<br>";
			//var_dump($result);
			

			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update info fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		
		return 0;
	}
	/*Update Name */
	public function updateUserAccount($userAccount) {
		
		/*private $userPassword;
		private $userName;
		private $userAvatar;
		private $userSchoolYear;
		private $userBirthday;
		private $userSex;
		*/
		$result = $this->mysqli->prepare ( 'UPDATE C4_user SET user_password=?,user_name=?,
user_avatar=?,user_schoolyear=?,user_birthday=?,user_sex=?,user_role=? WHERE user_id=?' );
		//$userID, $userLogin, $userName, $userSeniorID, $userEmail, $userSchoolYear, $userBirthday, $userSex 
		if ($result) {
			$result->bind_param ( 'sssissii', $userAccount->getUserPassword (), $userAccount->getUserName (), 
			$userAccount->getUserAvatar (), $userAccount->getUserSchoolYear (), $userAccount->getUserBirthday (),
			 $userAccount->getUserSex (),$userAccount->getUserRole(), $userAccount->getUserID () );
			//var_dump($result);
			$result->execute ();
			$flag = $result->affected_rows;
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update user account  fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	/*
 * Phuong thuc UpdateEvent : 
 * Input: Doi tuong Event da duoc sua o view
 * */
	public function updateEvent($newEvent) {
		//$newEvent= new Event();
		$result = $this->mysqli->prepare ( 'UPDATE C4_event SET event_Name=?, event_StartTime=?,
		event_EndTime=?,event_Intro=?,event_public=?,event_flag=?,event_approved=? WHERE event_ID=?' );
		//$userID, $userLogin, $userName, $userSeniorID, $userEmail, $userSchoolYear, $userBirthday, $userSex 
		if ($result) {
			$result->bind_param ( 'ssssiiii', $newEvent->getEventName (), $newEvent->getStartTime (), $newEvent->getEndTime (), $newEvent->getEventIntro (), $newEvent->getEventPublic(),$newEvent->getEventFlag(),$newEvent->getEventApproved(),$newEvent->getEventID () );
			//var_dump($result);
			$result->execute ();
			$result->bind_param ( $check );
			$flag = $result->affected_rows;
			
			if (($flag == 0) || ($flag == - 1)) {
				echo 'update event fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	public function requestFriend($userID, $friendID) {
		// $userAccount= new UserAccount();
		//$friendAccount= new UserAccount();
		$result = $this->mysqli->prepare ( 'INSERT INTO C4_friend 
			(user_ID,friend_ID,friend_status) 	VALUES (?,?,0)' );
		if ($result) {
			$result->bind_param ( 'ii', $userID, $friendID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'request friend fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	public function confirmFriend($userID, $friendID) {
		$result = $this->mysqli->prepare ( 'UPDATE c4_friend SET friend_Status=1 
		      WHERE user_id=? and friend_id=? ' );
		if ($result) {
			$result->bind_param ( 'ii', $userID, $friendID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'confirm friend fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	public function refuseFriend($userID, $friendID) {
		$result = $this->mysqli->prepare ( 'DELETE FROM c4_friend where user_id=? and friend_id=?' );
		if ($result) {
			$result->bind_param ( 'ii', $userID, $friendID );
			$result->execute ();
			$flag = $result->affected_rows;
			//var_dump($flag);
			if (($flag == 0) || ($flag == - 1)) {
				echo 'refuse friend fail';
				$result->close ();
				return - 1;
			}
			$result->close ();
		}
		return 0;
	}
	
	/* Phuong thuc goi y ket ban : Goi y ban cung diem chung, khong co trong friendlist
	 * Input: userID
	 * Output: mang doi tuong friend suggest
	 * Do uu tien : 1
	 * */
	public function suggestFriendList($userID) {
		//$friendList=$this->getFriendList($userID);
		$result = $this->mysqli->prepare ( 'SELECT user_id FROM `c4_user` WHERE user_id != ? AND user_id NOT IN(
  			SELECT friend_id FROM c4_friend WHERE user_id=?
 			UNION(
 			SELECT user_id FROM c4_friend WHERE friend_id=?
				)
				) 
			ORDER BY rand() LIMIT 5' );
		if ($result) {
			$result->bind_param('iii',$userID,$userID,$userID);
			$result->execute ();
			$result->bind_result ( $ID );
			$i = 0;
			while ( $result->fetch () ) {
				$suggestList[]=$ID;

			}
			$result->close ();
			foreach($suggestList as $userID){
			$suggestUserList []= $this->getUserAccountByID($userID);
		}
		return $suggestUserList;
		}
	//	return $suggestList;
	}
	/*Phuong thuc hien thi ban chung khi vao wall cua friend
	 * INput : 2 account cua User co friend chung
	 * Output: danh sach friend chung
	 * */
	public function mutualFriendList($userID,$friendID){
		$result1 =$this->getFriendList($userID);
		$result2 = $this->getFriendList($friendID);
		foreach ($result1 as $items){
			foreach ($result2 as $value) {
				if(($items->getUserID())==($value->getUserID()))
					$result3[]= $items;
			}
		} 
		return $result3;
	}
	/* Phuong thuc check Friend
	 * Tra ve -1 neu userID1 va userID2 khong la ban
	 * Tra ve 1 neu userID1 dang request userID2
	 * Tra ve 2 neu userID2 dang request userID1
	 * Tra ve 3 neu 3 user da la ban cua nhau
	 * */
	public function checkFriend($userID1,$userID2){
		$check=$this->friendOneWay($userID1,$userID2);
		if($check==-1){
			$check=$this->friendOneWay($userID2,$userID1);
			if($check==1) $check=2;
		}
		return $check;
	}
	public function friendOneWay($userID1,$userID2){
		$result= $this->mysqli->prepare('SELECT friend_status FROM c4_friend
		 WHERE user_id=? and friend_id=?' );
	 if($result){
		$result->bind_param('ii',$userID1,$userID2);
		$result->execute();
		$flag=-1;
	    $result->bind_result($check);
		while($result->fetch()) $flag++;
		if($flag != -1){	
			
			//var_dump($check);
			if ($check==1 ) {//echo ' check friend fail';
				$result->close ();
				return 3;
				}
			else if($check==0){
				$result->close();
				return 1;
				}
			}
		}
		return -1;	
	}
	/*delete muc vat ly cua 1 comment
	 *  Neu delete khong thanh cong. Doi tuong van con trong DB phuong thuc tra ve -1
	 *  Delete thanh cong => tra ve 0 , mat ca doi tuong vs du lieu 
	 *  Bien dau vao : doi tuong can xoa*/
public function deleteComment($commentID){
	//$comment =new Comment();
	$result=$this->mysqli->prepare("DELETE FROM c4_comment where comment_id=?");
	if($result){
		$result->bind_param('i',$commentID);
		$result->execute();
		$flag=$result->affected_rows;
		if(($flag==0)||($flag==-1)){
			echo 'delete comment fail';
			$result->close();
			return -1;
		}
		//$comment->__destruct();
		return 0;
	}
}
public function deletePost($postID){
	//$post=new post();
	$result=$this->mysqli->prepare('DELETE FROM c4_post WHERE post_id= ?');
	if($result){
		$result->bind_param('i',$postID);
		$result->execute();
		$flag=$result->affected_rows;
		if(($flag==0)||($flag==-1)){
			echo 'delete Post fail';
			$result->close();
			return -1;
		}
		//$post->__destruct();
		return 0;
	}
}

public function deleteEvent($event){
	$result=$this->mysqli->prepare("DELETE FROM c4_event WHERE event_id=?");
	if($result){
		$result=$this->bind_param('i',$event->getEventID());
		$result->execute();
		$flag=$result->affected_rows;
		if(($flag==0)||($flag==-1)){
			echo 'delete event fail';
			$result->close();
			return -1;
		}
		$event->__destruct();
		return 0;
	}
}
public function searchSeniorID($md5String){
	$result=$this->mysqli->prepare('SELECT user_id FROM c4_user ');
	$returnID=-1;
	if($result){
		$result->execute();
		$result->bind_result($userID);
		while($result->fetch()){
			$md5ID=md5($userID);
			if(strcmp($md5String,$md5ID)==0) $returnID=$userID;
		}
		$result->close();
		return $returnID;
	}
   
}

public function searchUser($userName){
	 
	$result = $this->mysqli->prepare ( "SELECT user_id,user_password,
		user_login,user_name,user_seniorID,user_avatar,user_role,user_email,user_schoolyear,
		user_status,user_birthday,user_sex FROM c4_user where user_name LIKE ? " );
		if ($result) {
			$result->bind_param ( 's', $userName );
			$userName="%$userName%";
			//var_dump($result);
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $userID,$userPassword, $userLogin, $userName, $userSeniorID, $userAvatar, 
							$userRole, $userEmail,$userSchoolYear, $userStatus, $userBirthday, $userSex);
			//printf("\n %s \n",$userID);
			while($result->fetch ()){
			$user [] = new UserAccount ($userID,$userPassword,$userLogin,$userName,$userSeniorID
	,$userAvatar,$userRole,$userEmail,$userSchoolYear,$userStatus,$userBirthday,$userSex);
			}	
		$result->close;
		return $user;
		}
}

public function searchEvent($eventName){
	$result = $this->mysqli->prepare ( 'SELECT * FROM c4_event where event_name LIKE ? order by event_starttime DESC' );
		if ($result) {
			$result->bind_param ('s',$eventName );
			//var_dump($result);
			$eventName="%$eventName%";
			$result->execute ();
			//$count = $result->num_rows;
			$result->bind_result ( $eventID, $eventName, $eventCreator, $eventStartTime, $eventEndTime, $eventIntro );
			//printf("\n %s \n",$userID);
			while($result->fetch ()){
			$event [] = new Event ( $eventID, $eventName, $eventCreator, $eventStartTime, $eventEndTime, $eventIntro );
			}
			$result->close;
			return $event;
		}
		
	
}
public function searchUserGroup($userID){
		$result=$this->mysqli->prepare('SELECT group_id FROM c4_grouplist
		 WHERE user_id=?');
		if($result){
			$result->bind_param('i',$userID);
			$result->execute();
			$result->bind_result($groupID);
			$result->fetch();
			$result->close();
			return $groupID;
			
		}
}

/*public function searchPostByEveryOne($postName){
	$result = $this->mysqli->prepare ( 'SELECT * FROM c4_post where post_position=? order by post_Date DESC' );
		if ($result) {
			$result->bind_param ( "i", $postPosition );
			$result->execute ();
			$count = $result->num_rows;
			//var_dump($count);
			//var_dump ( $result );
			$result->bind_result ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink,$postFlag,$postApproved );
			//var_dump($count);
			while ( $result->fetch () ) {
				$postList [] = new Post ( $postID, $postPosition, $postCreator, $postKind, $postDate, $postContent, $postLink,$postFlag,$postApproved );
				//$i ++;
			}
			$result->close;
			return $postList;
		}
		//	$this->mysqli->close();
	
}*/
}

	
	



?>
