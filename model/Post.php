<?php

class Post {
 private $postID;
 private $postPosition;
 private $postCreator;
 /*$postKind =0 : status / 1 :link / 2: photo /3 :video
  * $postPosition==$postCreator && $postKind=0 =>  message on wall*/
 private $postKind;
 private $postDate;
 private $postContent;
 private $postLink;
 private $postFlag;
 private $postApproved;
 
 public function __construct($postID,$postPosition,$postCreator,$postKind,
 $postDate,$postContent,$postLink,$postFlag,$postApproved){
 $this->postID=$postID;
 $this->postPosition=$postPosition;
 $this->postCreator=$postCreator;
 $this->postKind=$postKind;
 $this->postDate=$postDate;
 $this->postContent=$postContent;
 $this->postLink=$postLink;
 $this->postFlag=$postFlag;
 $this->postApproved=$postApproved;
 }
 public function __destruct(){}
/**
	 * @return the $postID
	 */
	public function getPostID() {
		return $this->postID;
	}

/**
	 * @return the $postPosition
	 */
	public function getPostPosition() {
		return $this->postPosition;
	}

/**
	 * @return the $postCreator
	 */
	public function getPostCreator() {
		return $this->postCreator;
	}

/**
	 * @return the $postKind
	 */
	public function getPostKind() {
		return $this->postKind;
	}

/**
	 * @return the $postDate
	 */
	public function getPostDate() {
		return $this->postDate;
	}

/**
	 * @return the $postContent
	 */
	public function getPostContent() {
		return $this->postContent;
	}

/**
	 * @return the $postLink
	 */
	public function getPostLink() {
		return $this->postLink;
	}

/**
	 * @return the $postFlag
	 */
	public function getPostFlag() {
		return $this->postFlag;
	}

/**
	 * @return the $postApproved
	 */
	public function getPostApproved() {
		return $this->postApproved;
	}

/**
	 * @param $postID the $postID to set
	 */
	public function setPostID($postID) {
		$this->postID = $postID;
	}

/**
	 * @param $postPosition the $postPosition to set
	 */
	public function setPostPosition($postPosition) {
		$this->postPosition = $postPosition;
	}

/**
	 * @param $postCreator the $postCreator to set
	 */
	public function setPostCreator($postCreator) {
		$this->postCreator = $postCreator;
	}

/**
	 * @param $postKind the $postKind to set
	 */
	public function setPostKind($postKind) {
		$this->postKind = $postKind;
	}

/**
	 * @param $postDate the $postDate to set
	 */
	public function setPostDate($postDate) {
		$this->postDate = $postDate;
	}

/**
	 * @param $postContent the $postContent to set
	 */
	public function setPostContent($postContent) {
		$this->postContent = $postContent;
	}

/**
	 * @param $postLink the $postLink to set
	 */
	public function setPostLink($postLink) {
		$this->postLink = $postLink;
	}

/**
	 * @param $postFlag the $postFlag to set
	 */
	public function setPostFlag($postFlag) {
		$this->postFlag = $postFlag;
	}

/**
	 * @param $postApproved the $postApproved to set
	 */
	public function setPostApproved($postApproved) {
		$this->postApproved = $postApproved;
	}

/**
	 * @return the $postID
	 */
	/**
	 * @return the $postFlag
	 */
	
}

?>