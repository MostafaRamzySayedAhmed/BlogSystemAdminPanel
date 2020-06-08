<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Login";

include "includes/templates/header.php";

/* Preventing The Login Page To Be Reviewed To The User That Has Recently Logged In
 By Directing Him To His Dashboard */


include "config.php";
?>
<div class="background">

<h1 style="font-weight: bold; font-family: sans-serif; color: #969696; margin-top: 0px;
           padding-top: 50px" class="text-center">Blog</h1>

<?php

if(isset($_SESSION['Username']))
   {
	header('location: dashboard.php');
	exit();
   }


// Checking If The User Is Accessing The Dashboard By 'POST' Request Method

	if($_SERVER['REQUEST_METHOD'] == 'POST')
		
		{
			
			$username = $_POST['username'];
			$password = $_POST['password'];
        
            $stmt = $conn->prepare("SELECT 
									UserID, Username, Password 
								FROM 
									users 
								WHERE 
									Username = ? 
								AND 
									Password = ? 
								AND 
									GroupID = 1
								LIMIT 1");

		$stmt->execute(array($username, $password));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

			if($count > 0)
				{
					$_SESSION['Username'] = $username; // Register Session Name
			        $_SESSION['ID'] = $row['UserID']; // Register Session ID
					header('location: dashboard.php'); // Redirecting The User To The Dashboard Page
					exit();
				}

		}

?>	

<div class="container">

	<form class="login" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
	<input class="form-control" type="text" name="username" placeholder="Username">
	<input class="form-control" type="password" name="password" placeholder="Password">
	<input class="btn btn-block btn-primary" type="submit" value="Login">
	</form>
	
</div>
</div>

<?php 
	

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/