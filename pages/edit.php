<?php

	if(isset($_POST['edit'], $_POST['lastname'], $_POST['firstname'], $_POST['phonenumber'])
	&& !empty ($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phonenumber']))
	{
		$PhoneBook->editContact($_GET['id']);
		header('Location: index.php');
		exit;
	}
	$Contact = $PhoneBook->getContact($_GET['id']);
?>

<form method="post" action=" <?php $_PHP_SELF ?>" id="tfnewsearch" enctype="multipart/form-data">
	<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
			<td width="100">First Name</td>
			<td><input name="firstname" type="text" id="Prenume" value="<?=$Contact->getFirstName() ?>"></td>
		</tr>
		<tr>
			<td width="100">Last Name</td>
			<td><input name="lastname" type="text" id="Nume" value="<?=$Contact->getLastName()  ?>"></td>
		</tr>
		<tr>
			<td width="100">Phone Number</td>
			<td><input name="phonenumber" type="integer" id="Numar" value="<?=$Contact->getPhoneNumber()  ?>"></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td><input type='submit' name='edit' value="Edit" id="add"></td>
		</tr>
	<tr>
</form>

<?php
foreach($Contact->getPhotos() as $key => $photo)
{
	if($key <= 4) {
?>

<td>
<img src = "uploads/<?=$photo['name'] ?>" id="image">
</td>


<?php

	}
	else break;
	
}
?>
</tr>
</table>