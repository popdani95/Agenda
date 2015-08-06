<?php

$term = null;
if(isset($_POST['search']) && !empty($_POST['search']))
{
	$term = $_POST['search'];
}
$contacts = $PhoneBook->getContacts($term);

?>

<script>
function deleteContact(id)
{
	alert("Are you sure?");
	//alert(id);
	$.get("?page=delete&id=" + id, function(data)
	{
		if(data.indexOf("success") > -1)
		{
			alert("Deleted!");
		}
		else
		{
			alert("Error!");
		}
		location.href='index.php';
	});
}
</script>

<table>

<?php
foreach ($contacts as $contact) {
	
?>

	<tr>
		<td>
			<img src= "uploads/<?=$contact->getProfilePhoto() ?>" id="img">
		</td>
	
		<td>
			<div id="contact">
				<p>First Name: <?=$contact->getFirstName() ?></p>
				<p>Last Name: <?=$contact->getLastName() ?></p>
				<p>Phone Number: <?=$contact->getPhoneNumber() ?></p>
			</div>
		</td>
	</tr>
			<tr>
			<td>
			<div id="delete">
				<input type="button" id= "deletee" onclick="deleteContact(<?=$contact->getID() ?>)" value="DELETE" />
				<input type="button" id= "edit" onclick="location.href='?page=edit&id=<?=$contact->getID() ?>';" value="EDIT" />
			</div>
		</td>
	</tr>
			
	

<?php

}

?>

</table>