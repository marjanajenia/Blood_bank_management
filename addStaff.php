<!DOCTYPE html>
<?php
     
     $firstnameerr = $lastnameerr = $usernameerr = $gendererr = $passworderr = $addresserr = $btypeerr = $emailerr = $notavailable = " " ;


 if($_SERVER['REQUEST_METHOD']=="POST"){

 	           if(empty($_POST['fname'])) {
                    $firstnameerr = "Please Fill up the firstname!";
                }

                else if(empty($_POST['lname'])) {                    
                    $lastnameerr = "Please Fill up the lastname!";
                    
                }

                else if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the username!";
                }

                else if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";
                    
                }

                 else if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                 else if(empty($_POST['address'])) {                    
                    $addresserr = "Please Fill up the address!";
                }
                else if(empty($_POST['btype'])) {                    
                    $btypeerr = "Please Fill up the bloodtype!";
                }


                else if(empty($_POST['email'])) {                    
                    $emailerr = "Please Fill up the email!";
                    
                }

               
    else
           {
 	          $Firstname= $_POST['fname'];
 	          $lastname= $_POST['lname'];
 	          $username=$_POST['username'];
 	          $gender=$_POST['gender'];
 	          $address=$_POST['address'];
 	          $password=$_POST['password'];
 	          $bloodtype=$_POST['btype'];
 	          $email=$_POST['email'];

            $log = fopen("Login.txt", "r");
                    
              $data = fread($log, filesize("Login.txt"));
                    
              fclose($log);
                    
              $data_filter = explode("\n", $data);

              for($i = 0; $i< count($data_filter)-1; $i++) {

                $json_decode = json_decode($data_filter[$i], true);

                  if( $json_decode['username'] == $username ) 
                     {
                         $notavailable = "Username not available!";
                     }
                  else {     


 	          

 	          $info = array('fname' => $Firstname, 'lname' => $lastname, 'username' => $username,'gender' => $gender, 'address' => $address,
 	          	'password' => $password, 'btype' => $bloodtype,'email' => $email);

               $info_encoded = json_encode($info);

                 $filepath = "s.txt";

                 $reg_file = fopen($filepath, "a");
                 fwrite($reg_file, $info_encoded . "\n");	
                 fclose($reg_file);

              $logintab=array('username' => $username, 'password' => $password);
                $logintab_encoded=json_encode($logintab);

                $user= "l.txt";

                $login_file=fopen($user,"a");
                fwrite($login_file, $logintab_encoded . "\n");
                fclose($login_file);


                 header('Location: adminhomepage.php');


 	

 	        }
 	    }
 	}
 }


?>

<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>LOG IN</h1>
	<form action="" method="POST">

		<label for="fname">First Name</label>
		<input type="text" id="fname"name="fname">
		<?php echo $firstnameerr; ?>

		<br>

		<label for="lname">Last Name</label>
		<input type="text" id="lname"name="lname">
		<?php echo $lastnameerr; ?>
		<br>

		<label for="username">User Name</label>
		<input type="text" id="username"name="username">
		<?php echo $usernameerr; echo $notavailable; ?>

		<br>

		<label>Gender</label>
		<input type="radio" name="gender" id="male" value="male">
		<label for="male">Male</label>
		<input type="radio" name="gender"id="female" value="female">
		<label for="female">Female</label>
		<?php echo $gendererr; ?>
		<br>

		<label for="address">Address</label>
		<input type="text" id="address"name="address">
		<?php echo $addresserr; ?>
		<br>

		<label for="password">Password</label>
		<input type="pass" id="password"name="password">
		<?php echo $passworderr; ?>
		<br>

		<label for="btype">Blood type</label>
		<input type="text" id="btype"name="btype">
		<?php echo $btypeerr; ?>
		<br>

		<label for="email">Email</label>
		<input type="email" id="email"name="email">
		<?php echo $emailerr; ?>
		<br>

		<input type="submit" value="submit">

	</form>

</body>
</html>