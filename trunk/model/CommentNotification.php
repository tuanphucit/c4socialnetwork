<?php

class CommentNotification {
	 private $commentID; // dung de xoa notification trong bang comment_notification khi user nhan
	 private $commentCreatorID; // luu ten nguoi tao trong thong bao
	 private $postPositionID; // luu ten wall
	 //private $userID; // ID cua user muon thong bao
	 private $commentPositionID; //ID cua post co comment moi, dung de show comment
	 private $postKind; // loai post dung de hien thong bao : link , status, photo, video
	 private $commentDate;
	/**
	 * @return the $commentCreatorName
	 */
	public function __construct($commentID,$commentCreatorID,$postPositionID,
	$commentPositionID,$postKind,$commentDate){
		$this->commentID=$commentID;
		$this->commentCreatorName=$commentCreatorID;
		$this->postPositionName=$postPositionID;
		//$this->userID=$userID;
		$this->commentPositionID=$commentPositionID;
		$this->postKind=$postKind;
		$this->commentDate=$commentDate;
	}
	/**
	 * @return the $commentID
	 */
	public function getCommentID() {
		return $this->commentID;
	}

	/**
	 * @return the $commentCreatorID
	 */
	public function getCommentCreatorID() {
		return $this->commentCreatorID;
	}

	/**
	 * @return the $postPositionID
	 */
	public function getPostPositionID() {
		return $this->postPositionID;
	}

	/**
	 * @return the $commentPositionID
	 */
	public function getCommentPositionID() {
		return $this->commentPositionID;
	}

	/**
	 * @return the $postKind
	 */
	public function getPostKind() {
		return $this->postKind;
	}

	/**
	 * @return the $commentDate
	 */
	public function getCommentDate() {
		return $this->commentDate;
	}

	/**
	 * @param $commentID the $commentID to set
	 */
	public function setCommentID($commentID) {
		$this->commentID = $commentID;
	}

	/**
	 * @param $commentCreatorID the $commentCreatorID to set
	 */
	public function setCommentCreatorID($commentCreatorID) {
		$this->commentCreatorID = $commentCreatorID;
	}

	/**
	 * @param $postPositionID the $postPositionID to set
	 */
	public function setPostPositionID($postPositionID) {
		$this->postPositionID = $postPositionID;
	}

	/**
	 * @param $commentPositionID the $commentPositionID to set
	 */
	public function setCommentPositionID($commentPositionID) {
		$this->commentPositionID = $commentPositionID;
	}

	/**
	 * @param $postKind the $postKind to set
	 */
	public function setPostKind($postKind) {
		$this->postKind = $postKind;
	}

	/**
	 * @param $commentDate the $commentDate to set
	 */
	public function setCommentDate($commentDate) {
		$this->commentDate = $commentDate;
	}

	/**
	 * @return the $commentID
	 */
	
}

?>