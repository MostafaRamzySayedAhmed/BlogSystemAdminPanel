<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Dashboard";

if(isset($_SESSION['Username']))
	
   {
    
	    include "includes/templates/header.php";
	    include "includes/templates/navbar.php";
	   
	   // For Getting The Number Of The Total Members
    
        $sql1 = $conn->prepare("SELECT * FROM users WHERE GroupID != 1 LIMIT 1");

		$sql1->execute();
		$count1 = $sql1->rowCount();
	   
	   // For Getting The Number Of The Pending Members
    
        $sql2 = $conn->prepare("SELECT * FROM users WHERE GroupID != 1 AND RegistrationStatus = 0");

		$sql2->execute();
		$count2 = $sql2->rowCount();
	   
	   // For Getting The Latest Registered Members
	   
        $sql3 = $conn->prepare("SELECT * FROM users ORDER BY UserID DESC LIMIT 5");

		$sql3->execute();
		$count3 = $sql3->rowCount();
 
	   // For Getting The Number Of The Total Posts
	   
        $sql4 = $conn->prepare("SELECT * FROM posts");

		$sql4->execute();
		$count4 = $sql4->rowCount();
	   
	   // For Getting The Latest Posts
	   
        $sql5 = $conn->prepare("SELECT * FROM posts ORDER BY PostID DESC LIMIT 5");

		$sql5->execute();
		$count5 = $sql5->rowCount();

	   // For Getting The Latest Comments
    
        $sql6 = $conn->prepare("SELECT * FROM comments ORDER BY CommentID DESC LIMIT 5");

		$sql6->execute();
		$count6 = $sql6->rowCount();
    
        // For Getting The Total Number Of Comments
    
        $sql7 = $conn->prepare("SELECT * FROM comments");

		$sql7->execute();
		$count7 = $sql7->rowCount();
    
?>

				<h1 class="dashboard-heading">Dashboard</h1>
				
	<div class="dashboard-statics text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="statics total-users">
						
							<h3>Total Users</h3>
                            <i class="fa fa-users"></i>
							<span><a href="users.php"><?php echo $count1 ?></a></span>
						
						</div>
					</div>
					<div class="col-md-3">
						<div class="statics pending-users">
					
						
							<h3>Pending Users</h3>
                            <i class="fa fa-user fa-3x"></i>
							<span><a href="pending_users.php"><?php echo $count2 ?></a></span>
						
						</div>
					</div>
					<div class="col-md-3">
						<div class="statics total-posts">
					
							<h3>Total Posts</h3>
                            <i class="fa fa-pencil fa-3x"></i>
							<span><a href="posts.php"><?php echo $count4 ?></a></span>
						
						</div>
					</div>
					<div class="col-md-3">
						<div class="statics total-comments">
						
							<h3>Total Comments</h3>
                            <i class="fa fa-comment fa-3x"></i>
							<span><a href="comments.php"><?php echo $count7 ?></a></span>
						
						</div>
					</div>
				</div>
		</div>		
	</div>
	<div class="latest">
	<div class="container">
						<div class="row">
						<div class="first-panel">
							<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-users"></i>
									<span>Latest Registered Users</span>
									<span class="toggle-info pull-right">
										<i class="fa fa-plus fa-lg"></i>
									</span>
								</div>
								<div class="panel-body">
								<ul class="list-unstyled">
									<span>
									<?php 
                        
                        $users = $sql3->fetchAll();
                        foreach($users as $user)

									{
echo 	"<li>"; 
echo	$user['Username'];
echo	"<a href='user_edit.php?userid=" . $user['UserID'] . "' class='btn btn-success pull-right'>";
echo	"<i class ='fa fa-edit'></i>Edit</a>";
										
								if ($user['RegistrationStatus'] == 0)
								{
									echo "<a 
										href='user_activate.php?userid=" . $user['UserID'] . "' 
										class='btn btn-info activate pull-right'>
										<i class='fa fa-key'></i> Activate</a>";
								}
										
echo	"</li>";
									}
										?>
									</span>
									</ul>
								</div>
							</div>
						</div>
						</div>
						
						<div class="second-panel">
							<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-tag"></i>
									<span>Latest Posts</span>
									<span class="toggle-info pull-right">
										<i class="fa fa-plus fa-lg"></i>
									</span>
								</div>
									<div class="panel-body">
								<ul class="list-unstyled">
									<span>
									<?php
    
			 			$posts = $sql5->fetchAll();
                        foreach($posts as $post)
									{
echo 	"<li>"; 
echo	$post['PostTitle'];
echo	"<a href='post_edit.php?itemid=" . $post['PostID'] . "' class='btn btn-success pull-right'>";
echo	"<i class ='fa fa-edit'></i>Edit</a>";
										
						if ($post['PostApproval'] == 0)
								{
									echo "<a 
										href='post_approve.php?itemid=" . $post['PostID'] . "' 
										class='btn btn-info pull-right approve'>
										<i class='fa fa-check'></i>Approve</a>";
								}		
										
echo	"</li>";
									}
										?>
									</span>
									</ul>
								</div>
							</div>
						</div>
						</div>
						
					</div>
	</div>
	
</div>

<?php

	   
 } else
	
	{
		
		include "includes/templates/header.php";
		
		$user_dashboard_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
		redirect_home($user_dashboard_error, 5);
		
		
	}

include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/