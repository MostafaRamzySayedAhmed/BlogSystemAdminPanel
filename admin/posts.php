<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Posts";



if(isset($_SESSION['Username']))
	
 {

	include "includes/templates/header.php";
	include "includes/templates/navbar.php";
	 
	 $sql = $conn->prepare("SELECT posts.* , categories.CategoryName AS 'Category Name', users.Username AS User FROM posts INNER JOIN categories ON categories.CategoryID = posts.Category_ID INNER JOIN users ON users.UserID = posts.User_ID ORDER BY PostID DESC");

     $sql->execute();  
	 
?>
	 
	<div class='container'>
	<h1 class="text-center">Posts</h1>
	
	<div class="table-responsive">
	
		<table class="table table-bordered table-hover post-table">
		
		<thead>
			<tr>
				<th>#ID</th>
				<th>Post Picture</th>
				<th>Name</th>
				<th>Content</th>
				<th>Date Added</th>
				<th>Category</th>
				<th>User</th>
				<th>Controls</th>
			</tr>
		</thead>
		<tbody>
		    	
		    
			<?php
    
                        $posts = $sql->fetchAll();
    
                        foreach($posts as $post)
							
							{
								echo "<tr>";

									echo "<td>".  $post['PostID'] . "</td>";
								if(! empty($post['PostImage']))
	{ 
		echo "<td>". "<img src='uploads\post_image\\" . $row['PostImage'] ."'>". "</td>";
	} else { echo "<td>". "<img src='uploads\post_image\\" . 'no_image.png' ."'>". "</td>"; }
									echo "<td>" . $post['PostTitle'] . "</td>";
									echo "<td>" . $post['PostContent'] . "</td>";
									echo "<td>" . $post['PostDateTime'] ."</td>";
									echo "<td>" . $post['Category Name'] ."</td>";
									echo "<td>" . $post['User'] ."</td>";
									echo "<td>
										<a href='post_edit.php?postid=" . $post['PostID'] . "' 
										class='btn btn-primary'><i class='fa fa-edit'></i> Edit</a>
										<a href='post_delete.php?postid=" . $post['PostID'] . "'
										class='post-delete btn btn-danger'><i class='fa fa-close'></i> Delete</a>";
									if ($post['PostApproval'] == 0) {
											echo "<a 
													href='post_approve.php?postid=" . $post['PostID'] . "' 
													class='btn btn-info approve'>
													<i class='fa fa-check'></i>Approve</a>";
										}
									echo "</td>";
								echo "</tr>";
							}
						?>
	 		
	 		
		</tbody> 
		</table>
	</div>
	
	<a href="post_add.php" class="new-post btn btn-success">
	<i class="fa fa-plus-square"></i>New Post</a>
	
	</div>
	
<?php
	   				
	   
   } else
	
	{
	
			 include "includes/templates/header.php";
		 
			 $posts_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($posts_error);
			 
	}

include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/