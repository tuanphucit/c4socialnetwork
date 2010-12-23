<?php

class Group {
 private $groupID;
 private $groupName;
 private $groupLeader;
 public function __construct($groupID,$groupName,$groupLeader){
 	$this->groupID=$groupID;
 	$this->groupName=$groupName;
 	$this->groupLeader=$groupLeader;
 }
/**
	 * @return the $groupID
	 */
	public function getGroupID() {
		return $this->groupID;
	}

/**
	 * @return the $groupName
	 */
	public function getGroupName() {
		return $this->groupName;
	}

/**
	 * @return the $groupLeader
	 */
	public function getGroupLeader() {
		return $this->groupLeader;
	}

/**
	 * @param $groupID the $groupID to set
	 */
	public function setGroupID($groupID) {
		$this->groupID = $groupID;
	}

/**
	 * @param $groupName the $groupName to set
	 */
	public function setGroupName($groupName) {
		$this->groupName = $groupName;
	}

/**
	 * @param $groupLeader the $groupLeader to set
	 */
	public function setGroupLeader($groupLeader) {
		$this->groupLeader = $groupLeader;
	}

 
}

?>