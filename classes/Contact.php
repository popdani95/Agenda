<?php

class Contact {
	
	private $dbID = null ;
	private $firstName = null;
	private $lastName = null;
	private $phoneNumber = null;
	private $photos = null;
	
	public function __construct($dbContact = null) {
		
		if(is_array($dbContact))
		{
			$this->setID ($dbContact['id']);
			$this->setFirstName ($dbContact['first_name']);
			$this->setLastName ($dbContact['last_name']);
			$this->setPhoneNumber ($dbContact['number']);
			$this->setPhotos ($dbContact['photos_json']);
		}
		//print $this->dbID;
	}
	
	public function setID ($int) {
		$this->dbID = $int ;
		
	}
	
	public function setFirstName ($string) {
		$this->firstName = $string ;
		
	}
	
	public function setLastName ($string) {
		$this->lastName = $string ;
		
	}
	
	public function setPhoneNumber ($string) {
		$this->phoneNumber = $string ;
		
	}
	
	public function setPhotos ($string) {
		$this->photos = json_decode($string, true);
	}
	
	
	public function getID() {
		return $this->dbID;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function getPhoneNumber() {
		return $this->phoneNumber;
	}
	
	public function getPhotos() {
		return $this->photos;
	}
	
	public function getProfilePhoto()
	{
		return $this->photos[0]['name'];
	}
	
}


?>