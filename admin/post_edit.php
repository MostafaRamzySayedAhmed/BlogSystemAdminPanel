<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Edit Post";



if(isset($_SESSION['Username']))
	
   {
	   
	   include "includes/templates/header.php";
	   include "includes/templates/navbar.php";
	   
	   echo "<div class='container'>";
	   echo "<h1 class='edit text-center'>Edit Post</h1>";
	   
	   
	   if(isset($_GET['postid']) && is_numeric($_GET['postid']))
		   
		   {

			   $postid = intval($_GET['postid']);

		   }
	   
	   else
		   
		   {
			   $postid = 0;
		   }
	   
    
        $sql1 = $conn->prepare("SELECT * FROM posts WHERE PostID = '{$postid}' LIMIT 1");

		$sql1->execute();
		$count = $sql1->rowCount();
        $posts = $sql1->fetchAll();
        foreach($posts as $post);
    
  if ($count > 0) { ?>
				
				<!-- Starting The Editing Form -->
	
			<div class="container">
		<form class="form-horizontal" action="post_update.php" method="post" enctype="multipart/form-data">
		
		<!-- Starting The PostTitle Field -->
		
		<div class="form-group">
		
		<input type="hidden" name="postid" value="<?php echo $postid; ?>">
		
			<label class="col-sm-2 col-md-4 control-label">Post Title</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="posttitle" placeholder="The Title Of The Post"
				value="<?php echo $post['PostTitle']; ?>" required>
				<span class="asterisk">*</span>
			</div>
		
			</div>
			
			<!-- Starting The Content Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Content</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="content"
				value="<?php echo $post['PostContent']; ?>"
				placeholder="The Content Of The Post" required>
				<span class="asterisk">*</span>
			</div>
			
		</div>
		
		<!-- Starting The Users Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">User</label>
			<div class="col-sm-4 col-md-6">
				<select class="form-control" name="user">
					<?php
                   
	   $sql2 = $conn->prepare("SELECT * FROM users WHERE GroupID != 1");

       $sql2->execute();
                   
                        $users = $sql2->fetchAll();
                        foreach($users as $user)
							
						{
						 echo "<option value=";   
					     echo $user['UserID'];
						      if($post['User_ID'] == $user['UserID']) {echo 'selected'; }
						 echo ">";
						 echo $user['Username'];
						 echo "</option>";
						}
	   
					?>
				</select>
			</div>
			
			
		</div>
		
		
		<!-- Starting The Categories Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Category</label>
			<div class="col-sm-4 col-md-6">
				<select class="form-control" name="category">
					<?php
	   
       $sql3 = $conn->prepare("SELECT * FROM categories");

       $sql3->execute();
                   
                        $categories = $sql3->fetchAll();
                        foreach($categories as $category)
							
						{
						 echo "<option value=";   
					     echo $category['CategoryID'];
						      if($post['Category_ID'] == $category['CategoryID']) {echo 'selected'; }
						 echo ">";
						 echo $category['CategoryName'];
						 echo "</option>";
						}
	   
					?>
				</select>
			</div>
			
			
		</div>
		
		<!-- Starting The Tags Field -->
				
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Tags</label>
			<div class="col-sm-4 col-md-6">
			<input class="form-control" type="text" name="tags" placeholder="Seperate Your Tags With Comma (,)"
			value="<?php echo $post['PostTags']; ?>">
			</div>
			
		</div>
		
		<!-- Starting The Image Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Post Picture</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="file" name="image"
				value="<?php echo $post['ItemImage'];?>">
				<span class="asterisk">*</span>
			</div>
			
		</div>
			
					
			<!-- Starting The Submit Button -->
		
		<div class="form-group">
			
			<div class="col-sm-4 col-sm-offset-2 col-md-offset-4 col-md-6">
			<input type="submit" class="btn btn-success form-control" value="Submit">
			</div>
			
		</div>
		
			
		</form>

<?php
				   
	}
	   
	   else 
	   
	   		{

				echo "<div class='container'>";

				$post_edit_error = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirect_home($post_edit_error);

				echo "</div>";

			}

}

else
	
	{
	
			 include "includes/templates/header.php";
		 
			 $post_edit_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($post_edit_error);
			 
	}

echo "</div>";
include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/