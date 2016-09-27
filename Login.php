<?php
    
    $con = mysqli_connect("mysql10.000webhost.com", "a1439573_pat", "d9619820349", "a1439573_dak");
     
    $username = $_post["username"];
    $password = $_post["password"];

    $statement = musqli_prepare($con,"SELECT * FROM user WHERE username = ?");
    mysqli_stmt_bind_param($statement,"s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $username, $age, $password);

    $response = array();
    $response["success"] = false;
     
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)){
     	    $response["success"] = true;
            $response["name"] = $name;
            $response["age"] = $age;
		}   
    }
  
    echo json_encode($response);
?> 