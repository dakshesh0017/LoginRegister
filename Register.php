<?php
    require("password.php");
	
    $con = mysqli_connect("mysql10.000webhost.com", "a1439573_pat", "d9619820349", "a1439573_dak");
    
    $name = $_POST["name"];
    $age = $_POST["age"];
    $username = $POST["username"];  
    $password = $POST["password"];
    
	function registerUser{}{
		global $connect, $age, $username, $password;
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$statement = mysqli_prepare($connect,"INSERT INTO user (name, age, username, password) VALUES
		    (?, ?, ?, ?)");
	}
	
	function usernameAvailable{}{
		global $connect, $username;
		$statement = mysqli_prepare($connect, "SELECT * FROM users WHERE username = ?");
		mysqli_stnt_bind_param($statment, "s", $username);
		mysqli_stnt_execute($statement);
		mysqli_store_result($statement);
		$count = mysqli_stnt_num_rows($statement);
		mysqli_stnt_close($statement);
		if ($count < 1){
			return true;
		
		}else {
			return false;
		}
	}
	
	
    $response = array{};
	$response["success"] = false;
	
	if {usernameAvailable{}{
		registerUser{}{
		$response["success"] = true;	
	}
     
    echo json_encode($response);
?>