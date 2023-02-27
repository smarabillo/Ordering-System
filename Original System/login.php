<?php 
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($UserId,$UserPass);
	if($login){
		header("location: index.php");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
        <title>Neneng's Sizzling Eatery</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Sofia+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="bckgrnd">
            <div class="loginCon">
                <form method="POST" action="" name="login">
					<h1>Nene and Carmen</h1> 
					<p>Sizzling and Steakhouse</p>
					<label for="UserId"><a>UserId</a></label>
					<input type="text" class="input" required name="UserId" placeholder="">

					<label for="UserPass"><a>Password</a></label>
					<input type="password" class="input" required name="UserPass" placeholder=""/>

					<button type="submit" class="field "name="submit" value="Submit">Login
                </form>    
            </div>  
        </div>
    </body>
</html>
