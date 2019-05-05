<?php

include '/var/www/dbConfig.php';
session_start();
// initializing variables
$firstname = "";
$lastname    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $DBpassword, $database);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$phone_num = mysqli_real_escape_string($db, $_POST['phone_num']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Username is required"); }
  if (empty($lastname)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$email' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  //$user = mysqli_fetch_assoc($result);



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (firstname,lastname, email, password, phone_num)
  			  VALUES('$firstname', '$lastname', '$email','$password','$phone_num')";
  	mysqli_query($db, $query);
  //	$_SESSION['username'] = $firstname;
  //	$_SESSION['success'] = "You are now logged in";
  //	header('location: index.php');
  echo "success you can now login";
}else{
  echo "try again";
}
}else {
  echo "try again";
}
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: dashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
