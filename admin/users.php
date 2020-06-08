<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Users";



if(isset($_SESSION['Username']))
	
 {

	include "includes/templates/header.php";
	include "includes/templates/navbar.php";
	 
	 
    $sql = $conn->prepare("SELECT * FROM users WHERE GroupID != 1 ORDER BY UserID DESC");

    $sql->execute();
	 
	  
	 
?>
	 
	<div class='container'>
	<h1 class="text-center">Users</h1>
	
	<div class="table-responsive">
	
		<table class="table table-bordered table-hover user-table">
		
		<thead>
			<tr>
				<th>#ID</th>
				<th>Profile Picture</th>
				<th>Username</th>
				<th>E-Mail</th>
				<th>Full Name</th>
				<th>Registration Date</th>
				<th>Controls</th>
			</tr>
		</thead>
		<tbody>
		    	
		    
			<?php
    
							$users = $sql->fetchAll();
                            foreach($users as $user)
							
							{
								echo "<tr>";

									echo "<td>".  $user['UserID'] . "</td>";
							if(! empty($user['UserImage']))
	{ 
		echo "<td>". "<img src='uploads\user_image\\" . $user['UserImage'] ."'>". "</td>";
	} else { echo "<td>". "<img src='uploads\user_image\\" . 'no_image.png' ."'>". "</td>"; }
									echo "<td>" . $user['Username'] . "</td>";
									echo "<td>" . $user['Email'] . "</td>";
									echo "<td>" . $user['Fullname'] . "</td>";
									echo "<td>" . $user['UserDateTime'] ."</td>";
									echo "<td>
										<a href='user_edit.php?userid=" . $user['UserID'] . "' 
										class='btn btn-primary'><i class='fa fa-edit'></i> Edit</a>
										<a href='user_delete.php?userid=" . $user['UserID'] . "'
										class='user-delete btn btn-danger'><i class='fa fa-close'></i> Delete</a>";
										if ($user['RegistrationStatus'] == 0) {
											echo "<a 
													href='user_activate.php?userid=" . $user['UserID'] . "' 
													class='btn btn-info activate'>
													<i class='fa fa-key'></i> Activate</a>";
										}
									echo "</td>";
								echo "</tr>";
							}
						?>
	 		
	 		
		</tbody> 
		</table>
	</div>
	
	<a href="user_add.php" class="new-user btn btn-success">
	<i class="fa fa-plus-square"></i>New User</a>
	
	</div>
	
<?php
	   				
	   
   } else
	
	{
	
			 include "includes/templates/header.php";
		 
			 $users_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($users_error, 5);
			 
	}

include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/