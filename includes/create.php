<?php 

if (isset($_POST['create'])) {
	include "configs/db.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$username = validate($_POST['username']);
	$email = validate($_POST['email']);

	$user_data = 'username='.$username. '&email='.$email;

	if (empty($username)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Email is required&$user_data");
	}else {

       $sql = "INSERT INTO users(username, email) 
               VALUES('$username', '$email')";
       $result = mysqli_query($connect, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully created");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}