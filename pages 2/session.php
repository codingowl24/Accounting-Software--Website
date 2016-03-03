<?php
require ('Config.php');
//require ('login_validation.php');
session_start(); // Starting Session

$user_message = "";
$count_user = "";
$post = "";




$user_check=$_SESSION['login_user'];  // Storing Session


//  SQL Query to Fetch Complete Information of User.
$ses_sql=mysql_query("SELECT `userid`, `firstname`, `lastname`, `username`, `password`, `email`, `usertype` from `users` WHERE `username`='$user_check'");
$row = mysql_fetch_array($ses_sql);
$login_session=$row['firstname'];
$login_username = $row['username'];
$login_type = $row['usertype'];
$login_password=$row['password'];
$login_id = $row['userid'];


function sanitize($data){
	return mysql_real_escape_string($data);
	
}


function logged_in(){
	return (isset($_SESSION['login_user'])) ? TRUE : FALSE;
}

function user_active($login_id){
	global $login_id;
	$login_id = (int)$login_id;
	$login_id = sanitize($login_id);
	return (mysql_result(mysql_query("SELECT COUNT(userid) FROM users WHERE userid = $login_id AND Active = 1"),0) == 1) ? TRUE : FALSE;
}



		if (logged_in() === true)
 {
	 if(user_active($login_id) === false){
			 //session_destroy();
			 header('Location:Error!404.php');
			 exit();
		 }
 }
		


function disable_user(){
		if (logged_in() === true)
{
	$user_message = $row['usertype'];
	
}
		if(user_active($login_username) === false){
			session_destroy();
			header('Location:homepage.php');
			exit();
		}

}



// user Permission
function is_admin($login_id)
{
	global $login_id;
	$login_id = (int)$login_id;
	return (mysql_result(mysql_query("SELECT COUNT(userid) FROM users WHERE userid = $login_id AND usertype = 1"), 0) == 1) ? true : false;
}


function is_manager($login_id)
{
	global $login_id;
	$login_id = (int)$login_id;
	return (mysql_result(mysql_query("SELECT COUNT(userid) FROM users WHERE userid = $login_id AND usertype = 2"), 0) == 1) ? true : false;
}

function is_user($login_id)
{
	global $login_id;
	$login_id = (int)$login_id;
	return (mysql_result(mysql_query("SELECT COUNT(userid) FROM users WHERE userid = $login_id AND usertype = 0"), 0) == 1) ? true : false;
}


// Protect
function admin_protect(){
	global $login_type;
	global $login_id;
	if (is_admin($login_id) === FALSE)
	//if ($login_type == 0 || $login_type == 2)
	{
		
		header('Location: protected.php');
		exit();
	}
}

function admin_manager_protect(){
	global $login_type;
	global $login_id;
	if (is_user($login_id) === TRUE)
	//if ($login_type == 0 || $login_type == 2)
	{
		
		header('Location: protected.php');
		exit();
	}
}

function manager_protect(){
	global $login_type;
	if ($login_type == 1 || $login_type == 0)
	{
		header('Location: protected.php');
		exit();
	}
}

 function protect_page()
  {
  	if (logged_in() === FALSE)
	{
		header('Location: Homepage.php');
		exit();
	}
// else{
		
//}			
}
  

  


//users count
function user_count()
{
	 return  mysql_result(mysql_query("SELECT COUNT(userid) FROM users where usertype='0'"), 0);
}

function manager_count()
{
	 return  mysql_result(mysql_query("SELECT COUNT(userid) FROM users where usertype='2'"), 0);
}

function admin_count()
{
	 return  mysql_result(mysql_query("SELECT COUNT(userid) FROM users where usertype='1'"), 0);
}


// Count unread email
function unread_count()
{
	global $login_username;
	
	 return  mysql_result(mysql_query("SELECT COUNT(userread) FROM pm where userread ='0' and user2 = '$login_username'"), 0);
}



?>