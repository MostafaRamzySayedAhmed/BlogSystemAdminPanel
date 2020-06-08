<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Add Post";



if(isset($_SESSION['Username']))
	
   {
	   
	   include "includes/templates/header.php";
	   include "includes/templates/navbar.php";
	  
				
    ?>
				
				<!-- Starting The Adding Form -->
		
	<h1 class="edit text-center">Add Post</h1>
	
	
	
	<div class="container">
		<form class="form-horizontal" action="post_insert.php" method="post" enctype="multipart/form-data">
		
		
		<!-- Starting The PostTitle Field -->
		
		<div class="form-group">
		
			<label class="col-sm-2 col-md-4 control-label">Post Title</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="posttitle" placeholder="The Title Of The Post" pattern=".{4,}" title="The Post Title Must Be At Least Four Characters" required>
				<span class="asterisk">*</span>
			</div>
		
			</div>
			
			<!-- Starting The Content Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Content</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="content"
				placeholder="The Content Of The Post" pattern=".{9,}" title="The Post Content Must Be At Least Nine Characters" required>
				<span class="asterisk">*</span>
			</div>
			
			</div>
		
		<!-- Starting The Users Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">User</label>
			<div class="col-sm-4 col-md-6">
				<select class="form-control" name="user" required>
					<option value="">.....</option>
					<?php
	   
        $sql1 = $conn->prepare("SELECT * FROM Users WHERE GroupID != 1");

		$sql1->execute();
        $users = $sql1->fetchAll();
	   
	   					foreach($users as $user)
							
							{
								echo "<option value=" . $user['UserID']. ">" . $user['Username'] . "</option>";
							}
	   
					?>
				</select>
			</div>
			
			
		</div>
		
		
		<!-- Starting The Categories Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Category</label>
			<div class="col-sm-4 col-md-6">
				<select class="form-control" name="category" required>
					<option value="">.....</option>
					<?php
	   
    
    $sql2 = $conn->prepare("SELECT * FROM categories");

    $sql2->execute();
    $categories = $sql2->fetchAll();
	   
	   					foreach($categories as $category)
							
							{
								echo "<option value=" . $category['CategoryID']. ">" . $category['CategoryName'] . "</option>";
							}
	   
					?>
				</select>
			</div>
			
			
		</div>
		
		
		<!-- Starting The Tags Field -->
				
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Tags</label>
			<div class="col-sm-4 col-md-6">
			<input class="form-control" type="text" name="tags" placeholder="Seperate Your Tags With Comma (,)">
			</div>
			
		</div>
			
				<!-- Starting The Image Field -->
	 	
				<div class="form-group">
					
			<label class="col-sm-2 col-md-4 control-label">Post Picture</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="file" name="image" required>
				<span class="asterisk">*</span>
			</div>

			   </div>
			
			<!-- Starting The Submit Button -->
		
		<div class="form-group">
			
			<div class="col-sm-4 col-sm-offset-2 col-md-offset-4 col-md-6">
			<input type="submit" class="btn btn-success form-control" value="New Post">
			</div>
			
		</div>
		
			
		</form>
	</div>
				
	
<?php
	   
						
	   
   } else
	
	{
		
		$post_add_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
		redirect_home($post_add_error);
		
		
	}

include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/