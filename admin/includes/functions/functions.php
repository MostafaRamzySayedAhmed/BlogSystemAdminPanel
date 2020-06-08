<?php

/* Starting The General Functions */

// Showing 'Default' As Title For Pages Without The '$title' Variable

function get_title()
{	
	global $title;

	if(isset($title))
	{
		echo $title;
	}
	else
	{
		echo "Default";
	}
}

// Redirecting The User To The 'Login' Page

function redirect_home($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Homepage After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=index.php");
	exit();
}

/* Starting The Users Functions */

// Redirecting The User To The 'Users' Page

function redirect_users($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Users Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=users.php");
	exit();
}

// Redirecting The User To The User's 'Adding' Page

function redirect_user_add($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The User's Adding Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=user_add.php");
	exit();
}

// Redirecting The User To The User's 'Adding' Page

function redirect_user_edit($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The User's Adding Page After $time Seconds</div>";
	
	$previous_user_edit = $_SERVER['HTTP_REFERER'];
	header("refresh: $time; url=$previous_user_edit");
	exit();
}

/* Starting The Posts Functions */

// Redirecting The User To The 'Posts' Page

function redirect_posts($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Posts Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=posts.php");
	exit();
}

// Redirecting The User To The Post's 'Adding' Page

function redirect_post_add($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Post's Adding Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=post_add.php");
	exit();
}

// Redirecting The User To The Post's 'Editing' Page

function redirect_post_edit($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Post's Editing Page After $time Seconds</div>";
	
	$previous_post_edit = $_SERVER['HTTP_REFERER'];
	header("refresh: $time; url=$previous_post_edit");
	exit();
}

/* Starting The Categories Functions */

// Redirecting The User To The Category's 'Adding' Page

function redirect_category_add($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Category's Adding Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=category_add.php");
	exit();
}

// Redirecting The User To The Category's 'Editing' Page

function redirect_category_edit($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Category's Editing Page After $time Seconds</div>";
	
	$previous_category_edit = $_SERVER['HTTP_REFERER'];
	header("refresh: $time; url=$previous_category_edit");
	exit();
}

// Redirecting The User To The 'Categories' Page

function redirect_categories($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Categories Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=categories.php");
	exit();
}

/* Starting The Comments Functions */

// Redirecting The User To The 'Comments' Page

function redirect_comments($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Comments Page After $time Seconds</div>";
	
	/* 
	* Here We Will NOT Use '$_SERVER['HTTP_REFERER'] Because The Previous Page Which We Will Be Redirected Into 
	* Is Not The Homepage
	*/

	header("refresh: $time; url=comments.php");
	exit();
}

// Redirecting The User To The Comments's 'Editing' Page

function redirect_comment_edit($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Comment's Editing Page After $time Seconds</div>";
	
	$previous_comment_edit = $_SERVER['HTTP_REFERER'];
	header("refresh: $time; url=$previous_comment_edit");
	exit();
}