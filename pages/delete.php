<?php

	if( $PhoneBook->deleteContact($_GET['id']) )
		printf("success");
	else
		printf("error");

?>