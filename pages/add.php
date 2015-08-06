<?php

	if(isset($_POST['add'], $_POST['lastname'], $_POST['firstname'], $_POST['phonenumber'])
		&& !empty ($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phonenumber']))
	{
		$PhoneBook->addContact();
	 header('Location: index.php');
	 exit;
	}
	
?>

<form method="post" action=" <?php $_PHP_SELF ?>" id="tfnewsearch" enctype="multipart/form-data">
	<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
			<td width="100">First Name</td>
			<td><input name="firstname" type="text"></td>
		</tr>
		<tr>
			<td width="100">Last Name</td>
			<td><input name="lastname" type="text"></td>
		</tr>
		<tr>
			<td width="100">Phone Number</td>
			<td><input name="phonenumber" type="integer"></td>
		</tr>
		<tr>
			<td width="100">Photos</td>
			<td><input type='file' class="custom" name='photos[]' multiple ></td>
			
		</tr>
		<tr>
			<td width="100"></td>
			<td><input type='submit' name='add' value="Done" id="add"></td>
		</tr>
		
	</table>
</form>