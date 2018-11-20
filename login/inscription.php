<?php
session_start();
header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include "../lib/tools.php";

$db = PDOFactory::getMysqlConnexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

    <?php


    if (isset($_POST['forminscription'])) {
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);
        $mail = $_POST['mail'];
        $password = sha1($_POST['password']);
        $adress = htmlspecialchars($_POST['adress']);
        $city = htmlspecialchars($_POST['city']);

        if (!empty($name) AND !empty($username) AND !empty($mail) AND !empty($password) AND !empty($adress) AND !empty($city) ){
            $nameLen = strlen($name);
            if($nameLen <= 40){
                $usernameLen =strlen($username);
                if ($usernameLen <= 40) {
                    $adressLen = strlen($adress);
                    if ($adressLen <= 255) {
                        $cityLen = strlen($city);
                        if($cityLen <= 40){
                            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
                                $reqmail->execute(array($mail));
                                $mailexist = $reqmail->rowCount();
                                if($mailexist == 0){
                                    $insertmbr = $db->prepare("INSERT INTO users(name, username, mail, password, adress, city, type) VALUES(?, ?, ?, ?, ?, ?,?)");
                                    $insertmbr->execute(array($name, $username, $mail, $password, $adress, $city, "user"));



                                    $erreur = "Membre créer";
                                }


                                else{
                                    $erreur = "email already exist";
                                }

                            }else{
                                $erreur = "email unvalid";
                            }

                        }else{
                            $erreur = "city's lenght must be under 40";
                        }

                    }else{
                        $erreur = "adress's lenght must be under 255";
                    }

                }
                else{
                    $erreur = "username's lenght must be under 255";
                }
                
            }
            else{
                $erreur = "name's lenght must be under 255";
            }
        }
        else{
            $erreur = "tous les champs doivent être complétés";
        }
    }

    ?>
    <div align = "center">
        <h2>Inscription</h2>

        <form method="POST" action="">
            <table align="center">
                <tr>
                    <td align="right">
                    	<label for ="pseudo">Name :</label>
                    </td>
                    <td>
                    	<input type="text" placeholder="Your name" id = "pseudo" name="name">
                    </td>

                </tr>

                <tr>

                    <td align = "right">
                    	<label for ="mail">Username :</label>
                    </td>
                    <td>
                    	<input type="text" placeholder="Your username" id = "username" name="username">
                    </td>

                </tr>

                <tr>
                    
                    <td align="right">
                        <label for ="mail">mail :</label>
                    </td>
                    <td>
                        <input type="mail" placeholder="Your mail" id = "mail" name="mail">
                    </td>

                </tr>

                <tr>
                    
                    <td align="right">
                        <label for ="password">Password :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="put a password" id = "password" name="password">
                    </td>

                </tr>

                <tr>
                    
                    <td align="right">
                        <label for ="adress">Adress :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your adress" id = "adress" name="adress">
                    </td>

                </tr>

                <tr>
                    
                    <td align="right">
                        <label for ="adresse">City :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your city" id = "city" name="city">
                    </td>

                </tr>

            </table>
            <br />
            <input type="submit" name = "forminscription" value = "je m'inscris">
        </form>
        <?php
        if(isset($erreur)){
        echo '<font color = "red">'.$erreur.'</font>';
        }
        ?>

        <br>
        <a href="login.php" class="btn btn-primary btn-block col-6">Back</a>

    </div>

</body>
</html>