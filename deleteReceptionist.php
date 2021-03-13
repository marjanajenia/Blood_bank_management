<?php 
   
      $usernameerr ="";

      if($_SERVER['REQUEST_METHOD'] == "POST") {

         if(empty($_POST['username'])) {                    
         $usernameerr = "Please Fill up the Username!";
         }
         else
         {
         	$username = $_POST['username'];
         	          $log = fopen("s.txt", "r");
                    $data = fread($log, filesize("s.txt"));
                    fclose($log);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++)
                    {

                     $json_decode = json_decode($data_filter[$i], true);

                      if($json_decode['username'] == $username) 
                        {
                            
         	              $fc=file("s.txt");
         	              $f = fopen("s.txt", "w");       
                          foreach($fc as $line)
                           {
            	              if(!strstr($line,$username)){
            		             fputs($f,$line);
            	                 }

                           }  
              
                           fclose($f);
                           header('Location:adminhomepage.php');
                    
                        }
                     }
                      
                      
                    	echo "username not match! try again";
                          
                          
         }
        }


?>
<!DOCTYPE html>
<html>
<head>
	<title>delete receptionist</title>
</head>
<body>
	<h1>Delete Receptionist</h1>
	<form action=" " method="POST">
		<table>
		<tr> 
			<td>Enter receptionist username:</td>
			<td><input type="text" name="username" id="username"></td>
			<?php echo $usernameerr; ?>
		</tr>
		<tr>
			<td><input type="submit" value="delete"></td>
		</tr>
		</table>
	</form>

</body>
</html>