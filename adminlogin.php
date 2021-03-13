<?php

    $usernameerr = $passworderr ="";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $log = fopen("Login.txt", "r");
                    $data = fread($log, filesize("Login.txt"));
                    fclose($log);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++)
                    {

                     $json_decode = json_decode($data_filter[$i], true);

                      if($json_decode['username'] == $username && $json_decode['password'] == $password) 
                        {
                            session_start();
                            $_SESSION['user'] = $username;
                            setcookie("user",$username,time()+3600);
                            header('Location:adminhomepage.php');
                        }
                    }
                    echo "Wrong Password! Try Again.";
                }

		
             }
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<body>
	<h1>LOGIN</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" id="username"></td>
				<?php echo $usernameerr; ?>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="pass" name="password" id="password"></td>
				<?php echo $passworderr; ?>
			</tr>
			<tr>
				<td><input type="submit" name="login"value="login"></td>
			</tr>
		</table>
	</form>
	<h2><a href ="adminsignup.php">signup</a></h2><br>



</body>
</html>