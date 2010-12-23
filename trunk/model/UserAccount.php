<?php

class UserAccount {
	 	private $userID;
		private $userPassword;
		private $userLogin;
		private $userName;
		private $userSeniorID;
		private $userAvatar;
		private $userRole;
		private $userEmail;
		private $userSchoolYear;
		private $userStatus;
		private $userBirthday;
		private $userSex;
	function __construct($userID,$userPassword,$userLogin,$userName,$userSeniorID
	,$userAvatar,$userRole,$userEmail,$userSchoolYear,$userStatus,$userBirthday,$userSex){
		$this->userID=$userID;
		$this->userPassword=$userPassword;
		$this->userLogin=$userLogin;
		$this->userName=$userName;
		$this->userSeniorID=$userSeniorID;
		$this->userAvatar=$userAvatar;
		$this->userRole=$userRole;
		$this->userEmail=$userEmail;
		$this->userSchoolYear=$userSchoolYear;
		$this->userStatus=$userStatus;
		$this->userBirthday=$userBirthday;
		$this->userSex=$userSex;
	}
		/**
	 * @return the $userID
	 */
	public function getUserID() {
		return $this->userID;
	}

		/**
	 * @return the $userPassword
	 */
	public function getUserPassword() {
		return $this->userPassword;
	}

		/**
	 * @return the $userLogin
	 */
	public function getUserLogin() {
		return $this->userLogin;
	}

		/**
	 * @return the $userName
	 */
	public function getUserName() {
		return $this->userName;
	}

		/**
	 * @return the $userSeniorID
	 */
	public function getUserSeniorID() {
		return $this->userSeniorID;
	}

		/**
	 * @return the $userAvatar
	 */
	public function getUserAvatar() {
		return $this->userAvatar;
	}

		/**
	 * @return the $userRole
	 */
	public function getUserRole() {
		return $this->userRole;
	}

		/**
	 * @return the $userEmail
	 */
	public function getUserEmail() {
		return $this->userEmail;
	}

		/**
	 * @return the $userSchoolYear
	 */
	public function getUserSchoolYear() {
		return $this->userSchoolYear;
	}

		/**
	 * @return the $userStatus
	 */
	public function getUserStatus() {
		return $this->userStatus;
	}

		/**
	 * @return the $userBirthday
	 */
	public function getUserBirthday() {
		return $this->userBirthday;
	}

		/**
	 * @return the $userSex
	 */
	public function getUserSex() {
		return $this->userSex;
	}

		/**
	 * @param $userID the $userID to set
	 */
	public function setUserID($userID) {
		$this->userID = $userID;
	}

		/**
	 * @param $userPassword the $userPassword to set
	 */
	public function setUserPassword($userPassword) {
		$this->userPassword = $userPassword;
	}

		/**
	 * @param $userLogin the $userLogin to set
	 */
	public function setUserLogin($userLogin) {
		$this->userLogin = $userLogin;
	}

		/**
	 * @param $userName the $userName to set
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

		/**
	 * @param $userSeniorID the $userSeniorID to set
	 */
	public function setUserSeniorID($userSeniorID) {
		$this->userSeniorID = $userSeniorID;
	}

		/**
	 * @param $userAvatar the $userAvatar to set
	 */
	public function setUserAvatar($userAvatar) {
		$this->userAvatar = $userAvatar;
	}

		/**
	 * @param $userRole the $userRole to set
	 */
	public function setUserRole($userRole) {
		$this->userRole = $userRole;
	}

		/**
	 * @param $userEmail the $userEmail to set
	 */
	public function setUserEmail($userEmail) {
		$this->userEmail = $userEmail;
	}

		/**
	 * @param $userSchoolYear the $userSchoolYear to set
	 */
	public function setUserSchoolYear($userSchoolYear) {
		$this->userSchoolYear = $userSchoolYear;
	}

		/**
	 * @param $userStatus the $userStatus to set
	 */
	public function setUserStatus($userStatus) {
		$this->userStatus = $userStatus;
	}

		/**
	 * @param $userBirthday the $userBirthday to set
	 */
	public function setUserBirthday($userBirthday) {
		$this->userBirthday = $userBirthday;
	}

		/**
	 * @param $userSex the $userSex to set
	 */
	public function setUserSex($userSex) {
		$this->userSex = $userSex;
	}

		

 
}


?>