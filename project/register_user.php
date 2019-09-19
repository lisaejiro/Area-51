<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    
    //validate email
    if (empty($_POST["email"])) {
        $ema = 'email required';
    }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $ema = 'Enter a valid email';
    }else{
        $email = test_values($_POST["email"]);
        
    }

    //validate password
    if(empty($_POST["password"])){        
        $pass = 'Password is required';
            }elseif(!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])){                
        $pass = 'Password must be in alphanumeric.';
    }elseif(strlen($_POST["password"])< 6){
        $pass = 'Password must be at least six characters.';
    }
    else {
        $passw = test_values($_POST["password"]);  
    }
    $passw2 = test_values($_POST["pass"]);
    
    // validating passwords

  if($passw !== $passw2) {
    $err="<b>Invalid operation... Wrong password confirmation supplied!</b>";
    
    }else{
        $passw = password_hash(test_values($_POST["password"]),PASSWORD_DEFAULT);
    }




  if(empty($ema) && empty($pass) && empty($err)){  
    $result = mysqli_query($conn, "SELECT * FROM admin where email='$email'");

    if (mysqli_num_rows($result) == 0) {
    
        //create account
        mysqli_query($conn, "insert into admin set email='$email', password='$passw'") or die(mysql_error($conn));
        
        
          $_SESSION["msg"]="<font color=green><b>Your registration was successful!</b></font>";
        // header("location: index.");
        }
        
        else {
        $err="<font color=red><b>Email already exist!</b></font>";
        
        }
   
        
    }
    

} 
    







function test_values($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // $data = empty($data);
    return $data;
}


?>