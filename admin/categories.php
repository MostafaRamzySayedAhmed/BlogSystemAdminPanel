<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Categories";


include "includes/templates/header.php";
include "includes/templates/navbar.php";


if(isset($_SESSION['Username']))
	
 {
	 
        $sql = $conn->prepare("SELECT * FROM categories");
        $sql -> execute();
	 
	 ?>
  				    
  				    
  		<div class="container categories">
  			<h1 class="text-center">Categories</h1>
  			<div class="panel panel-default">
  				<div class="panel-heading">
					<i class="fa fa-edit"></i>Categories
  				</div>
  				<div class="panel-body">
  					<?php  
	 					
                            $categories = $sql->fetchAll();
	 						foreach($categories as $category)
							{
								echo "<div class='category'>";
								echo "<div class='category-buttons pull-right'>";
								echo "<a href='category_edit.php?catid=" . $category['CategoryID'] . "' class='btn btn-primary'><i class='fa fa-edit'></i>Edit</a>";
								echo "<a href='category_delete.php?catid=" . $category['CategoryID'] . "' class='category-delete btn btn-danger'><i class='fa fa-close'></i>Delete</a>";
								echo "</div>";
								echo "<h3>". $category['CategoryName']. "</h3>";
								echo "<div>";
								echo "<p>";
									if($category['CategoryDescription'] == '')
										{echo "This Category Has No Description";} 
									else 
										{echo $category['CategoryDescription']; }
								echo "</p>";
									if($category['CategoryVisibility'] == 0) 
									{echo "<span class='category-hidden'>Hidden</span>";}
									else {echo "<span class='category-visibile'>Visibile</span>";}
									if($category['CategoryComments'] == 0) 
									{echo "<span class='category-comments-no'>Comments Disabled</span>";}
									else {echo "<span class='category-comments-yes'>Comments Enabled</span>";}
								
								
								echo "</div>";
								echo "<hr>";
								echo "</div>";
								
							}
	 		
					?>
					
					
  				</div>
				
					
				
  			</div>
  			
  					<a href="category_add.php" class="btn btn-success new-category">
					<i class="fa fa-plus-square"></i>New Category</a>
					   
  		</div>		    
  				    
   			 
	   				
    <?php
	 
   } else
	
	{
	
			 include "includes/templates/header.php";
		 
			 $categories_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($categories_error);
			 
	}

include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/