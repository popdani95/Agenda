<?php

class PhoneBook {
	
	private $contactsContainer = array ();
	private $PDO = null ;
	
	
	public function __construct () {
		$this->__connectPDO();
	}

	public function addContact()
	{
		$upload = new Upload($_FILES['photos']);
		
		if( !( $jsonFiles = $upload->getJsonFiles() ) )
		{
			$jsonFiles = json_encode( [array("name" => "default.jpg")] );
		}
		
		//print $jsonFiles;
		
		$query = sprintf("INSERT INTO `%s` (`first_name`, `last_name`, `number`, `photos_json`) VALUES (?, ?, ?, ?)", DB_TABLE);
		
		$statement = $this->PDO->prepare($query);
		
		$statement->execute( array( $_POST['firstname'], $_POST['lastname'], $_POST['phonenumber'], $jsonFiles ) );
		
		return $this->PDO->lastInsertId();
	}
	
	public function deleteContact($id = null)
	{
		$query = sprintf("DELETE FROM %s WHERE id=?", DB_TABLE);
		$statement = $this->PDO->prepare($query);
		$statement->execute( array($id) );
		if($statement->rowCount() > 0)
			return true;
		else
			return false;
	}
	
	public function getContact ($id = null)
	{
		$query = sprintf ("SELECT * FROM %s WHERE id=?", DB_TABLE);
		$statement = $this->PDO->prepare ($query);
		$statement->execute (array($id));
		return new Contact ($statement->fetchALL()[0]);
	}
	
	public function editContact($id = null)
	{
		$query = sprintf ("UPDATE %s SET `first_name`=? ,`last_name`=?,`number`=? WHERE id=?", DB_TABLE);
		$statement = $this->PDO->prepare($query);
		$statement->execute (array($_POST['firstname'], $_POST['lastname'], $_POST['phonenumber'], $id));
		
	}
	
	public function getContacts($term = null) {
		$query = sprintf("SELECT * FROM %s", DB_TABLE);
		if($term !== null)
		{
			$term = str_replace(" ", "", $term);
			$query = sprintf("%s WHERE CONCAT(first_name, last_name, number) LIKE '%%{$term}%%' OR CONCAT(last_name, first_name, number) LIKE '%%{$term}%%' OR CONCAT(number, first_name, last_name) LIKE '%%{$term}%%'", $query);
		}
		$query = sprintf("%s ORDER BY first_name ASC", $query);
		
		$statement = $this->PDO->prepare($query);
		//$statement->bindValue(1, $term, PDO::PARAM_STR);
		$statement->execute(  );
		foreach($statement->fetchAll() as $value)
		{
			$this->contactsContainer[$value['id']] = new Contact($value);
		}
		return $this->contactsContainer;
		
	}
	
	private function __connectPDO () {
		
		try {
			$driverDetails = sprintf('mysql:dbname=%s;host=%s;', DB_NAME, DB_HOST);
			//print $driverDetails;
			$this->PDO = new PDO ($driverDetails , DB_USER, DB_PASS );
			
		}
		catch (PDOException $e) {
		die($e->getMessage());	
			
		}
				
	}
	
}

?>