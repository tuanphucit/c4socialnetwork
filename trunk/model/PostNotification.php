<?php

class PostNotification {
	private $postID;
	private $postPositionID;
	private $postCreatorID;
	private $postDate;
	public function __construct($postID,$postPositionID,$postCreatorID,$postDate){
		$this->postID=$postID;
		$this->postPositionID=$postPositionID;
		$this->postCreatorID=$postCreatorID;
		$this->postDate=$postDate;
	}
	/**
	 * @return the $postID
	 */
	public function getPostID() {
		return $this->postID;
	}

	/**
	 * @return the $postPositionID
	 */
	public function getPostPositionID() {
		return $this->postPositionID;
	}

	/**
	 * @return the $postCreatorID
	 */
	public function getPostCreatorID() {
		return $this->postCreatorID;
	}

	/**
	 * @return the $postDate
	 */
	public function getPostDate() {
		return $this->postDate;
	}

	/**
	 * @param $postID the $postID to set
	 */
	public function setPostID($postID) {
		$this->postID = $postID;
	}

	/**
	 * @param $postPositionID the $postPositionID to set
	 */
	public function setPostPositionID($postPositionID) {
		$this->postPositionID = $postPositionID;
	}

	/**
	 * @param $postCreatorID the $postCreatorID to set
	 */
	public function setPostCreatorID($postCreatorID) {
		$this->postCreatorID = $postCreatorID;
	}

	/**
	 * @param $postDate the $postDate to set
	 */
	public function setPostDate($postDate) {
		$this->postDate = $postDate;
	}

	
}

?>