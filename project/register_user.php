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
    if(empty($_POST["pass"])){        
        $pass = 'Password is required';
            }elseif(!preg_match("/^[a-zA-Z0-9]*$/",$_POST["pass"])){                
        $pass = 'Password must be in alphanumeric.';
    }elseif(strlen($_POST["pass"])< 6){
        $pass = 'Password must be at least six characters.';
    }
    else {
        $passw = password_hash(test_values($_POST["pass"]),PASSWORD_DEFAULT); 
    }

    
    $result = mysqli_query($conn, "SELECT * FROM admin where email='$email'");

    if (mysqli_num_rows($result) == 0) {
    
        //create account
        mysqli_query($conn, "insert into admin set email='$email', password='$passw'") or die(mysql_error($conn));
        
        //send verification email
        //@mail($email,"MySite - Account Verification", "Hello {$fullname},\nPlease click the link below (or copy and paste on your browser) to verify your ccitraders.com account.\nhttp://www.mysite.com/verify?email={$email}","From: noreply@mysite.com");
        
          $_SESSION["msg"]="<font color=green><b>Your registration was successful!</b></font>";
        header("location: login");
        }
        
        else {
        $err="<font color=red><b>Email already exist!</b></font>";
        
        }
   
        
      
    

} 
    




// echo $err;



function test_values($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // $data = empty($data);
    return $data;
}


?>