<?php

class IsFriend {
 private $userId;
 private $friendId;
 /*$friendStatus ==0 : friend requested but hasn't been approved yet
  *$friendStatus ==1 : friend approved 
  * */
 private $friendStatus;
/**
	 * @return the $userId
	 */
	public function getUserId() {
		return $this->userId;
	}

/**
	 * @return the $friendId
	 */
	public function getFriendId() {
		return $this->friendId;
	}

/**
	 * @return the $friendStatus
	 */
	public function getFriendStatus() {
		return $this->friendStatus;
	}

/**
	 * @param $userId the $userId to set
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

/**
	 * @param $friendId the $friendId to set
	 */
	public function setFriendId($friendId) {
		$this->friendId = $friendId;
	}

/**
	 * @param $friendStatus the $friendStatus to set
	 */
	public function setFriendStatus($friendStatus) {
		$this->friendStatus = $friendStatus;
	}

 
}

?>