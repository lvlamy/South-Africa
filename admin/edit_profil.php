<?php
session_start();

header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include('../class/PDOFactory.php');
include('../class/ArticlesManagerPDO.php');
include('../class/Pictures.php');
include('../class/Paragraph.php');
include('../class/Articles.php');

$db = PDOFactory::getMysqlConnexion();

include("../login/session.php");

?>


<!DOCTYPE html>
<html>
<head>
    <title>edit profile</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php

//on récupère toute la ligne
$curUser = $db->prepare('SELECT * FROM users WHERE id = :cur_user');
$curUser->execute(array(
    'cur_user' => $_GET['edit']
));
$donnees = $curUser->fetch();

if($donnees['type'] == 'admin') {
    $type_user = 'admin';
}else {
    $type_user = "user";
}

if($donnees['type'] == 'admin') {
    $type_user1 = 'user';
}else {
    $type_user1 = "admin";
}




if (isset($_POST['formModif']) && isset($_GET['edit'])) {
    $newName = $_POST['name'];
    $newUsername = $_POST['username'];
    $newMail = $_POST['mail'];
    $newPassword = $_POST['password'];
    $newAdress = $_POST['adress'];
    $newCity = $_POST['city'];
    $newType = $_POST['type'];


    if (!empty($newName) AND !empty($newUsername) AND !empty($newMail) AND !empty($newPassword) AND !empty($newAdress) AND !empty($newCity) AND !empty($newType)){
        $id = $_GET['edit'];

        $modifUser = $db->prepare('UPDATE users SET name = :name, username = :username, mail = :mail, password = :password , adress = :adress , city = :city , type = :type  WHERE id = :editUser');
        $modifUser->execute(array(
            'name' => $newName,
            'username' => $newUsername,
            'mail' => $newMail,
            'password' => $newPassword,
            'adress' => $newAdress,
            'city' => $newCity,
            'type' => $newType,
            'editUser' => $id,
        ));

        ?>
        <div class="container">
            <div class="alert alert-info alert-dismissible">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo "edit send. You can come back to the profiles page";
                ?>
            </div>
        </div>
        <?php
    }else {
        $erreur = "tous les champs doivent être complétés";

    }


}
?>



<div class="container" align="center">
    <h2>Edit profile</h2>
    <form method="POST" action="">
        <table align="center">
            <tr>
                <td align="right">
                    <label for="nom">Name :</label>
                </td>
                <td align="center">
                    <input type="text" name="name" value="<?php if(isset($donnees['name'])) echo $donnees['name']; else echo "erreur";?>">
                </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="nom">Username :</label>
                </td>
                <td>
                    <input type="text" name="username" value="<?php if(isset($donnees['username'])) echo $donnees['username']; else echo "erreur"; ?>">
                </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="nom">Mail :</label>
                </td>
                <td>
                    <input type="mail" name="mail" value="<?php if(isset($donnees['mail'])) echo $donnees['mail']; else echo "erreur"; ?>">
                </td>
            </tr>


            <tr>
                <td align="right">
                    <label for="nom">Password :</label>
                </td>
                <td>
                    <input type="password" name="password" value="<?php if(isset($donnees['password'])) echo $donnees['password']; else echo "erreur"; ?>">
                </td>
            </tr>


            <tr>
                <td align="right">
                    <label for="nom">Adress :</label>
                </td>
                <td>
                    <input type="text" name="adress" value="<?php if(isset($donnees['adress'])) echo $donnees['adress']; else echo "erreur"; ?>">
                </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="nom">City :</label>
                </td>
                <td>
                    <input type="text" name="city" value="<?php if(isset($donnees['city'])) echo $donnees['city']; else echo "erreur"; ?>">
                </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="nom">Type :</label>
                </td>
                <td>
                    <select name="type">
                        <option value="admin">
                            <?php echo $type_user; ?>
                        </option>
                        <option value="user">
                            <?php echo $type_user1;?>
                        </option>

                    </select>
                </td>

            </tr>
            <tr>
                <td>
                </td>
                <td align="center">
                    <input type="submit" name="formModif" class="btn btn-success btn-block clo-4">

                </td>
            </tr>

        </table>
    </form>
<?php
if(isset($erreur)){
    echo '<font color = "red">'.$erreur.'</font>';
}
?>

    <br>
    <a href="profil_admin.php" class="btn btn-primary btn-block col-6">Back</a>

</div>





</body>
</html>