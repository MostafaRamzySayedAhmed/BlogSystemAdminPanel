<?php

// Error Reporting

ini_set('display_errors', 'on'); // Making The  'display_errors' Setting To Be On For This Project
error_reporting(E_ALL); // For Displaying All Types Of Errors

if (isset($_SESSION['Username'])) {
	
include "config.php";

    
$stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ". $_SESSION['ID']);

$stmt->execute();

echo  "<div class='container'>";
	
echo "<div class='upper-bar pull-right'>";

				$users = $stmt->fetchAll();
                foreach($users as $user);			
					
		  
	  		if(! empty($user['UserImage']))
	{
		
  echo "<img alt='Profile Picture' class='my-image img-thumbnail img-circle' src='uploads\user_image\\" . $user['UserImage'] ."'>";
		
	} 
	
else
		
	{ 
		echo "<img alt='Profile Picture' class='my-image img-thumbnail img-circle' src='uploads\user_image\\" . 'no_image.png' ."'>";
	}
	
	
	  		?>

				<div class="btn-group my-info">
					<span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $_SESSION['Username'] ?>
						<span class="caret"></span>
					</span>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>

				<?php

				} else {
			?>
			<a href="login.php" class="btn btn-primary login-signup pull-right">
				Login/Signup
			</a>
			
			<?php } ?>
			
	 
		</div>
  
</div>
 

 <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php"></a>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
       <li><a href="dashboard.php">Homepage</a></li>
       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="categories.php">Categories</a></li>
		<li><a href="posts.php">Posts</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="comments.php">Comments</a></li>
      </ul>

    </div>
  </div>
</nav>