<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Update Category";



if($_SERVER["REQUEST_METHOD"] == "POST")
	
 {

	include "includes/templates/header.php";
	include "includes/templates/navbar.php";
	 
	echo "<div class='container'>";
	echo "<h1 class='text-center'>Update Category</h1>";
	
	$catid = $_POST['catid'];
	$categoryname = $_POST['categoryname'];
	$description = $_POST['description'];
	$visibility = $_POST['visibility'];
	$comments = $_POST['comments'];
	 
     $form_errors = array();
    
	 if(empty($categoryname))
     {
		
		$form_errors[] = "<div class ='alert alert-danger'>The Category Name Can NOT Be Empty</div>";
	 }
    
     if(strlen($categoryname) < 5)
     {
		
		$form_errors[] = "<div class ='alert alert-danger'>The Category Name Can NOT Be Less Than 5 Characters</div>";
		 
	 }
    
    if(strlen($categoryname) > 30)
    {
		
		$form_errors[] = "<div class ='alert alert-danger'>The Category Name Can NOT Be Greater Than 30 Characters</div>";
		 
	}
	 
	 
	 /*
	 ** Checking If The CategoryName He Trys To Edit Is Already Existed Or Not
	 ** The Variables Are Named Like This To Avoid Any Conflict
	 ** Depending On The Number Of The Retrieved Rows Of The Result, If It Equals 1, This Means That This CategoryName Is Already Existed and As a Result an Error Message Will Be Displayed and The User Will Be Redirected To The Edit Page Depending On The 'redirect_category_edit' Method Defined In The Functions File.
	 */
         
         if(empty($form_errors))
         {
             
             $sql = $conn->prepare ("UPDATE categories 
										SET 
											CategoryName = ?, 
											CategoryDescription = ?, 
											CategoryVisibility = ?,
											CategoryComments = ?
										WHERE 
											CategoryID = ?");

$sql->execute(array($categoryname, $description, $visibility, $comments, $catid));
			
			$category_update_success = "<span class='alert alert-success'>Record Updated Successfully</span>";
			
			redirect_categories($category_update_success);
             
         }
		 
		   else
           {
               
               foreach($form_errors as $error)
               {
                   redirect_category_edit($error, 5);
               }
               
           } 

 }

else
	
		 {
	
			 include "includes/templates/header.php";
		 
			 $category_update_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";
			 
			 redirect_home($category_update_error);
			 
		 }

	echo "</div>";
include "includes/templates/fotter.php";

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/