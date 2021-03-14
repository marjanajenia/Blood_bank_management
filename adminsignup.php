<!DOCTYPE html>
<?php 
      $gendererr = $patternerrf = $patternerrl = $wrongemail = $notavailable = " " ;


 if($_SERVER['REQUEST_METHOD']=="POST"){

 	            if(!preg_match("/^[a-zA-Z]*$/", ($_POST['fname']) )){
                    $patternerrf = "only letter allowed in Firstname";
              }

              else if(!preg_match("/^[a-zA-Z]*$/", ($_POST['lname']) )){
                    $patternerrl = "only letter allowed in lastname";
              }

              else if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";
                    
              }
              else if(!filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)){
                  $wrongemail="invalid email";
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

                 $filepath = "signup.txt";

                 $reg_file = fopen($filepath, "a");
                 fwrite($reg_file, $info_encoded . "\n");	
                 fclose($reg_file);

              $logintab=array('username' => $username, 'password' => $password);
                $logintab_encoded=json_encode($logintab);

                $user= "login.txt";

                $login_file=fopen($user,"a");
                fwrite($login_file, $logintab_encoded . "\n");
                fclose($login_file);


                 header('Location: adminlogin.php');


 	

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
     <table>
      <tr>
		    <td>First Name</td>
		    <td><input type="text" id="fname"name="fname" required></td>
		    <?php echo $patternerrf; ?>
      </tr>
      <tr>
		    <td>Last Name</td>
		    <td><input type="text" id="lname"name="lname" required></td>
		    <?php echo $patternerrl; ?>
      </tr>
      <tr>
		    <td>User Name</td>
		    <td><input type="text" id="username"name="username"required></td>
		    <?php echo $notavailable; ?>
      </tr>
      <tr>
		    <td>Gender</td>
		    <td><input type="radio" name="gender" id="male" value="male"/>Male
          
		    <input type="radio" name="gender"id="female" value="female"/>Female</td>
        <?php echo $gendererr; ?>
      </tr>
      <tr> 
		    <td>Address</td>
		    <td><input type="text" id="address"name="address" required></td>
      </tr>
      <tr>
        <td>Password</td>
		    <td><input type="pass" id="password"name="password" required></td>
      </tr>
      <tr>
		    <td>Blood type</td>
		    <td><input type="text" id="btype"name="btype" required></td>
      </tr>
      <tr>
		    <td>Email</td>
		    <td><input type="email" id="email"name="email" required></td>
		    <?php echo $wrongemail; ?>
      </tr>
      <tr>
        <td><input type="submit" value="submit"></td>
      </tr>
    </table>


	</form>

</body>
</html>