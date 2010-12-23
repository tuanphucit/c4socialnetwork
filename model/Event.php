<?php

class Event {
 private $eventID;
 private $eventName;
 private $eventCreator;
 private $startTime;
 private $endTime;
 private $eventIntro;
 private $eventPublic;
 private $eventFlag;
 private $eventApproved; 
/**
	 * @return the $eventID
	 */
	/**
	 * @return the $eventName
	 */
    function __construct($eventID,$eventName,$eventCreator,$eventStartTime,
     $eventEndTime,$eventIntro,$eventPublic,$eventFlag,$eventApproved) {
        $this->eventID=$eventID;
 		$this->eventName=$eventName;
 		$this->eventCreator=$eventCreator;
 		$this->startTime=$eventStartTime;
 		$this->endTime=$eventEndTime;
 		$this->eventIntro=$eventIntro;
 		$this->eventPublic=$eventPublic;
 		$this->eventFlag=$eventFlag;
 		$this->eventApproved=$eventApproved;
    }
    /**
	 * @return the $eventPublic
	 */
	public function getEventPublic() {
		return $this->eventPublic;
	}

	/**
	 * @return the $eventFlag
	 */
	public function getEventFlag() {
		return $this->eventFlag;
	}

	/**
	 * @return the $eventApproved
	 */
	public function getEventApproved() {
		return $this->eventApproved;
	}

	/**
	 * @param $eventPublic the $eventPublic to set
	 */
	public function setEventPublic($eventPublic) {
		$this->eventPublic = $eventPublic;
	}

	/**
	 * @param $eventFlag the $eventFlag to set
	 */
	public function setEventFlag($eventFlag) {
		$this->eventFlag = $eventFlag;
	}

	/**
	 * @param $eventApproved the $eventApproved to set
	 */
	public function setEventApproved($eventApproved) {
		$this->eventApproved = $eventApproved;
	}

	function __destruct(){}
	public function getEventName() {
		return $this->eventName;
	}

/**
	 * @param $eventName the $eventName to set
	 */
	public function setEventName($eventName) {
		$this->eventName = $eventName;
	}

	public function getEventID() {
		return $this->eventID;
	}

/**
	 * @return the $eventCreator
	 */
	public function getEventCreator() {
		return $this->eventCreator;
	}

/**
	 * @return the $startTime
	 */
	public function getStartTime() {
		return $this->startTime;
	}

/**
	 * @return the $endTime
	 */
	public function getEndTime() {
		return $this->endTime;
	}

/**
	 * @return the $eventIntro
	 */
	public function getEventIntro() {
		return $this->eventIntro;
	}

/**
	 * @param $eventID the $eventID to set
	 */
	public function setEventID($eventID) {
		$this->eventID = $eventID;
	}

/**
	 * @param $eventCreator the $eventCreator to set
	 */
	public function setEventCreator($eventCreator) {
		$this->eventCreator = $eventCreator;
	}

/**
	 * @param $startTime the $startTime to set
	 */
	public function setStartTime($startTime) {
		$this->startTime = $startTime;
	}

/**
	 * @param $endTime the $endTime to set
	 */
	public function setEndTime($endTime) {
		$this->endTime = $endTime;
	}

/**
	 * @param $eventIntro the $eventIntro to set
	 */
	public function setEventIntro($eventIntro) {
		$this->eventIntro = $eventIntro;
	}

 
}

?>