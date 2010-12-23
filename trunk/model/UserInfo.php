<?php
	class UserInfo{
		
		private $userUrl;
		private $userYM;
		private $userSkype;
		private $userMobile;
		private $userResident;
		private $userNativeVillage;
		private $userFavoriteQuote;
		private $userBio;
		private $userBook;
		private $userMusic;
		private $userInterested;
	function __construct($userUrl,$userYM,$userSkype,$userMobile,$userResident,
	 $userNativeVillage,$userFavoriteQuote,$userBio,$userBook,$userMusic,$userInterested){
		$this->userUrl=$userUrl;
		$this->userYM=$userYM;
		$this->userSkype=$userSkype;
		$this->userMobile=$userMobile;
		$this->userResident=$userResident;
		$this->userNativeVillage=$userNativeVillage;
		$this->userFavoriteQuote=$userFavoriteQuote;
		$this->userBio=$userBio;
		$this->userBook=$userBook;
		$this->userMusic=$userMusic;
		$this->userInterested=$userInterested;
	}
		/**
	 * @return the $userUrl
	 */
	public function getUserUrl() {
		return $this->userUrl;
	}

		/**
	 * @return the $userYM
	 */
	public function getUserYM() {
		return $this->userYM;
	}

		/**
	 * @return the $userSkype
	 */
	public function getUserSkype() {
		return $this->userSkype;
	}

		/**
	 * @return the $userMobile
	 */
	public function getUserMobile() {
		return $this->userMobile;
	}

		/**
	 * @return the $userResident
	 */
	public function getUserResident() {
		return $this->userResident;
	}

		/**
	 * @return the $userNativeVillage
	 */
	public function getUserNativeVillage() {
		return $this->userNativeVillage;
	}

		/**
	 * @return the $userFavoriteQuote
	 */
	public function getUserFavoriteQuote() {
		return $this->userFavoriteQuote;
	}

		/**
	 * @return the $userBio
	 */
	public function getUserBio() {
		return $this->userBio;
	}

		/**
	 * @return the $userBook
	 */
	public function getUserBook() {
		return $this->userBook;
	}

		/**
	 * @return the $userMusic
	 */
	public function getUserMusic() {
		return $this->userMusic;
	}

		/**
	 * @return the $userInterested
	 */
	public function getUserInterested() {
		return $this->userInterested;
	}

		/**
	 * @param $userUrl the $userUrl to set
	 */
	public function setUserUrl($userUrl) {
		$this->userUrl = $userUrl;
	}

		/**
	 * @param $userYM the $userYM to set
	 */
	public function setUserYM($userYM) {
		$this->userYM = $userYM;
	}

		/**
	 * @param $userSkype the $userSkype to set
	 */
	public function setUserSkype($userSkype) {
		$this->userSkype = $userSkype;
	}

		/**
	 * @param $userMobile the $userMobile to set
	 */
	public function setUserMobile($userMobile) {
		$this->userMobile = $userMobile;
	}

		/**
	 * @param $userResident the $userResident to set
	 */
	public function setUserResident($userResident) {
		$this->userResident = $userResident;
	}

		/**
	 * @param $userNativeVillage the $userNativeVillage to set
	 */
	public function setUserNativeVillage($userNativeVillage) {
		$this->userNativeVillage = $userNativeVillage;
	}

		/**
	 * @param $userFavoriteQuote the $userFavoriteQuote to set
	 */
	public function setUserFavoriteQuote($userFavoriteQuote) {
		$this->userFavoriteQuote = $userFavoriteQuote;
	}

		/**
	 * @param $userBio the $userBio to set
	 */
	public function setUserBio($userBio) {
		$this->userBio = $userBio;
	}

		/**
	 * @param $userBook the $userBook to set
	 */
	public function setUserBook($userBook) {
		$this->userBook = $userBook;
	}

		/**
	 * @param $userMusic the $userMusic to set
	 */
	public function setUserMusic($userMusic) {
		$this->userMusic = $userMusic;
	}

		/**
	 * @param $userInterested the $userInterested to set
	 */
	public function setUserInterested($userInterested) {
		$this->userInterested = $userInterested;
	}

		/*Initial an user when register, another infor will using setMethod later*/
		
		
	}
	
?>