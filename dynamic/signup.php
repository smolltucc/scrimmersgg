<?php
	function signUp($email = "",$password = "",$username = "") {
		session_start();
		$conn = getDBConnection();
		$parameters = array();

		$parameters[":email"]= $_POST["email"];
		$parameters[":username"]= $_POST["username"];
		
		$options = [
			'cost' => 12,
					];

		$hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
		$parameters[":password"]= $hashedPassword;


		$sql = "INSERT INTO user(email, username,password) VALUES (:email, :username, :password)";

		$stmt = getDBConnection()->prepare($sql);
		$stmt->execute(array(":email" => $parameters[":email"],
		":username" => $parameters[":username"],
		":password" => $parameters[":password"]
		))
	}
?>