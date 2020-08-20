<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['register'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$row = $stmt->fetch();
		
		$count = $row['count'];
		
		if($count > 0){
			if($stmt->execute()){
				$_SESSION['error'] = "The username is already taken";
				header('location: index.php');
			}}
	 	else{
		$stm=$db=$query = "INSERT INTO `member` (username, password) VALUES(:username, :password)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		if($stmt->execute()){
			$_SESSION['success'] = "Successfully created an account";
			header('location: index.php');

	}
}
}
ini_set('display_errors', 1);
?>
