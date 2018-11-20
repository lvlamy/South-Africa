<?php
include("config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

//on récupère toute la ligne
$reponse = $db->query('SELECT password FROM users ');

while ($donnee = $reponse->fetch()) {

    $_SESSION["password_user"] = $donnee['password'];

    echo $donnee['password'];
    echo "<br>";

    $hash = sha1($donnee['password']);

    echo $hash;
    echo "<br>";


    $final = $db->prepare('UPDATE users SET password = :pass');
    $final->execute(array(
        'pass' => $hash
    ));



    echo "mdp mis à jour";
    echo "<br>";
    echo $hash;
    echo "<br>";


}


?>




</body>
</html>
