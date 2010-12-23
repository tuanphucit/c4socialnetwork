<?php

class Comment {
  private $commentID;
  private $commentCreator;
  private $commentPosition;
  private $commentDate;
  private $commentContent;
  private $commentFlag;
  private $commentApproved;
  
  public function __construct($commentID,$commentCreator,$commentPosition,$commentDate,
  $commentContent,$commentFlag,$commentApproved){
  $this->commentID=$commentID;
  $this->commentCreator=$commentCreator;
  $this->commentPosition=$commentPosition;
  $this->commentDate=$commentDate;
  $this->commentContent=$commentContent;
  $this->commentFlag=$commentFlag;
  $this->commentApproved=$commentApproved;
  }
 public function __destruct(){}
/**
	 * @return the $commentID
	 */
	/**
	 * @return the $commentFlag
	 */
	public function getCommentFlag() {
		return $this->commentFlag;
	}

/**
	 * @param $commentFlag the $commentFlag to set
	 */
	public function setCommentFlag($commentFlag) {
		$this->commentFlag = $commentFlag;
	}

	public function getCommentID() {
		return $this->commentID;
	}

/**
	 * @return the $commentCreator
	 */
	public function getCommentCreator() {
		return $this->commentCreator;
	}

/**
	 * @return the $commentPosition
	 */
	public function getCommentPosition() {
		return $this->commentPosition;
	}

/**
	 * @return the $commentDate
	 */
	public function getCommentDate() {
		return $this->commentDate;
	}

/**
	 * @return the $commentContent
	 */
	public function getCommentContent() {
		return $this->commentContent;
	}

/**
	 * @return the $commentApproved
	 */
	public function getCommentApproved() {
		return $this->commentApproved;
	}

/**
	 * @param $commentID the $commentID to set
	 */
	public function setCommentID($commentID) {
		$this->commentID = $commentID;
	}

/**
	 * @param $commentCreator the $commentCreator to set
	 */
	public function setCommentCreator($commentCreator) {
		$this->commentCreator = $commentCreator;
	}

/**
	 * @param $commentPosition the $commentPosition to set
	 */
	public function setCommentPosition($commentPosition) {
		$this->commentPosition = $commentPosition;
	}

/**
	 * @param $commentDate the $commentDate to set
	 */
	public function setCommentDate($commentDate) {
		$this->commentDate = $commentDate;
	}

/**
	 * @param $commentContent the $commentContent to set
	 */
	public function setCommentContent($commentContent) {
		$this->commentContent = $commentContent;
	}

/**
	 * @param $commentApproved the $commentApproved to set
	 */
	public function setCommentApproved($commentApproved) {
		$this->commentApproved = $commentApproved;
	}
 
  
}

?>