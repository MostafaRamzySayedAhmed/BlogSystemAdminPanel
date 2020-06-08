<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers,    This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Edit Category";



if(isset($_SESSION['Username']))
	
   {
	   
	   include "includes/templates/header.php";
	   include "includes/templates/navbar.php";
	   
	   echo "<div class='container'>";
	   echo "<h1 class='edit text-center'>Edit Category</h1>";
	   
	   
	   if(isset($_GET['catid']) && is_numeric($_GET['catid']))
		   
		   {

			   $catid = intval($_GET['catid']);

		   }
	   
	   else
		   
		   {
			   $catid = 0;
		   }
	   
	   
       $sql = $conn->prepare("SELECT * FROM categories WHERE CategoryID = '{$catid}' LIMIT 1");
       $sql -> execute();
	   $count = $sql->rowCount();
	   $categories = $sql->fetchAll();
       foreach($categories as $category);
    
  if ($count > 0) { ?>
				
				<!-- Starting The Editing Form -->

	
	
	<div class="container">
		<form class="form-horizontal" action="category_update.php" method="post">
		
		
		<input type="hidden" name="catid" value="<?php echo $catid; ?>">
		
		<!-- Starting The CategoryName Field -->
		
		<div class="form-group">
		
			<label class="col-sm-2 col-md-4 control-label">Category Name</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="categoryname" autocomplete="off" required value="<?php echo $category['CategoryName'];?>">
				<span class="asterisk">*</span>
			</div>
		
			</div>
			
			<!-- Starting The Description Field -->
		
		<div class="form-group">
			
			<label class="col-sm-2 col-md-4 control-label">Description</label>
			<div class="col-sm-4 col-md-6">
				<input class="form-control" type="text" name="description" placeholder="The Discription Of The Category" value="<?php echo $category['CategoryDescription'];?>">
			</div>
			
		</div>
		
			<!-- Starting The Visiblity Field -->
			
				<div class="form-group form-group-lg">
			
			<label class="col-sm-2 col-md-4 control-label">Visible</label>
			<div class="col-sm-10 col-md-6">
				<div>
					<input type="radio" name="visibility" value="1" id="visible-yes"
					<?php if ($category['CategoryVisibility'] == 1) { echo 'checked'; } ?> />
					<label for="visible-yes">Yes</label>
				</div>
					
				<div>
					<input type="radio" name="visibility"  value="0"  id="visible-no"
					<?php if ($category['CategoryVisibility'] == 0) { echo 'checked'; } ?> />
					<label for="visible-no">No</label>
				</div>
			</div>
			
				</div>
				
				<!-- Starting The Comments Field -->
			
				<div class="form-group form-group-lg">
			
			<label class="col-sm-2 col-md-4 control-label">Allow Comments</label>
			<div class="col-sm-10 col-md-6">
				<div>
					<input type="radio" name="comments" value="1" id="comments-yes"
					<?php if ($category['CategoryComments'] == 1) { echo 'checked'; } ?> />
					<label for="comments-yes">Yes</label>
				</div>
					
				<div>
					<input type="radio" name="comments" value="0" id="comments-no"
				    <?php if ($category['CategoryComments'] == 0) { echo 'checked'; } ?> />
					<label for="comments-no">No</label>
				</div>
			</div>
			
				</div>
		 	
			
			<!-- Starting The Submit Button -->
		
		<div class="form-group">
			
			<div class="col-sm-4 col-sm-offset-2 col-md-offset-4 col-md-6">
			<input type="submit" class="btn btn-success form-control" value="Submit">
			</div>
			
		</div>
		
			
			
		</form>
	</div>
				
	
<?php
				  }
	   
	   else 
	   
	   		{

				echo "<div class='container'>";

				$category_edit_error = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirect_home($category_edit_error);

				echo "</div>";

			}
		
	   
} 

else
	
	{
	
			 include "includes/templates/header.php";
		 
			 $category_edit_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($category_edit_error);
			 
	}

echo "</div>";
include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/