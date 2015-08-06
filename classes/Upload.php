<?php

class Upload {
	
	private $allowedTypes = null;
	
	private $filesContainer = null;
		
	private $uploadedFilesContainer = null;
	
	private $defaultAllowedTypes = array(
		"image/jpeg" => ".jpg", 
		"image/png" => ".png"
	);
	
	public function __construct($files = null, $allowedTypes = null)
	{
		$this->__normalizeFiles($files);
		$this->__setAllowedTypes($allowedTypes);
		$this->__upload();
		//print $this->__generateRandomName("caca");
	}
	
	public function getJsonFiles()
	{
		if( is_array($this->uploadedFilesContainer) )
			return json_encode($this->uploadedFilesContainer);
		else
			return false;
	}
	
	private function __upload()
	{
		foreach($this->filesContainer as $key => $file)
		{
			if( $this->__checkType($file['type']) )
			{
				$this->uploadedFilesContainer[$key]['name'] = $this->__generateRandomName($file['name']) . $this->allowedTypes[$file['type']];\
				//$fileUploadPath =
				move_uploaded_file( $file['tmp_name'], build_path(DIR_UPLOADS, $this->uploadedFilesContainer[$key]['name']) );
			}
		}
	}
	
	private function __checkType($type)
	{
		if( array_key_exists($type, $this->allowedTypes) )
			return true;
		else
			return false;
	}
	
	private function __setAllowedTypes($allowedTypes = null)
	{
		if($allowedTypes === null)
			$this->allowedTypes = $this->defaultAllowedTypes;
		elseif( is_array($allowedTypes) && !empty($allowedTypes) )
			$this->allowedTypes = $allowedTypes;
	}
	
	
	private function __normalizeFiles($vector) {
		foreach($vector as $key1 => $value1) 
			foreach($value1 as $key2 => $value2) 
				$this->filesContainer[$key2][$key1] = $value2;
	} 
	
	private function __generateRandomName($name)
	{
		return md5( $name . time() );
	}
	
}

?>