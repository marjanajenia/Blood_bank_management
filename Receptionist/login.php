<?php  
 
 session_start();  
 if(isset($_POST["sub"]))  
 {  

      $_SESSION["name"] = $_POST["name"];  
      $_SESSION['last_login_timestamp'] = time();  
      header("location:index.php");       
 }  
 ?>  
 <!DOCTYPE html>  
 
 <html>  
      <head>  

           <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
               <?php include 'header.php' ?>  
      </head>  
      <body>  
        <fieldset>
    <legend align="center" style="font-size: 2.0em">Login</legend>
           <div class="container">  
                 
                <form method="post" align="center">  
                     <input type="text" name="name" id="name" placeholder="Enter Username" class="form-control" /><br />  
                     <input type="password" name="pass" id="pass" placeholder="Enter Pass" class="form-control" /><br />  
                     <input type="submit" name="sub" id="sub" class="btn btn-info" value="Submit" />  
           <br><br>
           
      <div class="container" style="background-color:#f1f1f1">
    
    <span class="psw">Forgot <a href="forgetpass.php"> <span style="color: #ff0000">password?</span></a></span>
   </div>
                </form>  
                <br /><br />  
           </div>  
           <?php include 'footer.php' ?>
            </fieldset>
          </form>
      </body>  
 </html>  