<?php
session_start();
header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');


include("../Include/inc_navbar_login.php");

include "../lib/tools.php";

$db = PDOFactory::getMysqlConnexion();

if(isset($_SESSION['type']) && $_SESSION['type'] == "admin")
{
  header('Location: ../admin/index.php');
}

if(isset($_SESSION['type']) && $_SESSION['type'] == "user")
{
    header('Location: users/user1.php');
}

      if(isset($_POST["login"]))  
      {
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
                $query->execute(array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     sha1($_POST["password"])
                     )  
                );  
                $count = $query->fetch();


               $_SESSION['type'] = "user";

               if($count > 1)
               {
                   $_SESSION["login_user"] = $_POST["username"];
                   $_SESSION["password_user"] = $_POST["password"];
                   $_SESSION["type"] = $count['type'];
                   $_SESSION['name'] = $count['name'];
                   $_SESSION['username'] = $count['username'];
                   $_SESSION['mail'] = $count['mail'];
                   $_SESSION['password'] = $count['password'];
                   $_SESSION['adress'] = $count['adress'];
                   $_SESSION['city'] = $count['city'];

                   if($_SESSION['type'] == "admin"){
                       header('Location: ../admin/index.php');
                   }
                   else{
                       header('Location: users/user1.php');

                   }
               }
               else
               {
                   $message = "your login Name or password is invalid";
               }
           }  
      }   
 ?>

 <!DOCTYPE html>
 <html>
      <head>  
           <title>Login page</title>

          <!-- Custom fonts for this template -->
          <link href="../css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
          <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
          <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
          <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>



          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

          <link href="../css/agency.min.css" rel="stylesheet">

          <link href="../css/lity.css" rel="stylesheet"/>



          <script src="../js/jquery.js"></script>
          <script src="../js/lity.js"></script>


           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>  
           <br />  
           <div class="container" style="width:500px;">
                <h3 align="">Login</h3><br />  
                <form method="post">
                    <span class="glyphicon glyphicon-user"></span>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                     <br />
                    <span class="glyphicon glyphicon-lock"></span>
                    <label>Password</label>
                     <input type="password" name="password" class="form-control">
                     <br />

                    <?php
                    if(isset($message))
                    {
                        echo '<label class="text-danger">'.$message.'</label>';
                        echo "<br>";

                    }
                    ?>

                    <input type="submit" class="btn btn-success col-4" name="login" class="btn btn-info" value="Login" />

                    <p></p>
                    <a href="inscription.php" class="btn btn-primary btn-md btn-block">Register</a>
                </form>
           </div>  
           <br />

           <?php
           include("../include/inc_footer.php");
           ?>
      </body>  
 </html>  
