<?php 

require_once ('init.php');

$PhoneBook = new PhoneBook ();

?>

<html>
    <head>
        <title>Home | Agenda Telefonica</title>
        <link rel="stylesheet" type="text/css" href="style.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <center>
            <div id="wrapper">
                
                
				<div id="menu">
								
						<div id="search">
							<form id="tfnewsearch" method="post" action="./?page=search">
								<input type="text" class="tftextinput" name="search" size="60" maxlength="120" placeholder="Find Contacts">
								<input type="submit" value="Search" class="tfbutton">
							</form>
						</div>
									
						<form id="thnewsearch" action="./?page=add" method= "post">
							<input type="submit" value="Add contact" id="add">	 
						</form>
							 
				</div>
                
                <div id="content">
                    <?php  
					
						if(isset($_GET['page']) && !empty($_GET['page']))
						{
							switch($_GET['page'])
							{
								case "add":
									include (build_path(DIR_PAGES, 'add.php'));
									break;
									
								case "search":
									include (build_path(DIR_PAGES, 'list.php'));
									break;
									
								case "edit":
									include (build_path(DIR_PAGES, 'edit.php'));
									break;
									
								case "delete":
									include (build_path(DIR_PAGES, 'delete.php'));
									break;
									
								case "details":
									include (build_path(DIR_PAGES, 'details.php'));
									break;
									
								default :
									include (build_path(DIR_PAGES, 'list.php'));
									break;
									
							}
						}
						 
						else {
							include (build_path(DIR_PAGES, 'list.php'));
							
						}
						
					
					?>
                </div>
				
            </div>
        </center>
    </body>
</html>