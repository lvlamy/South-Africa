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

<html>
<head>
    <meta charset="UTF-8">
    <title>profil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>
    <?php

    $user = $db->query('SELECT * FROM users');

    ?>

    <h1 style="text-align: center">All profiles</h1>

<input class="form-control col-4" id="myInput" type="text" placeholder="Search.." style="margin-left: 10%">
<br>
<div class="table-responsive">
    <table class="table table-striped" style="width: 80%; text-align: center; margin-left: 10%">
        <thead>
        <tr>
            <th>
                name
            </th>
            <th>
                username
            </th>
            <th>
                mail
            </th>
            <th>
                password
            </th>
            <th>
                adress
            </th>
            <th>
                city
            </th>
            <th>
                type
            </th>
        </tr>
        </thead>
        <tbody id="myTable">
        <?php
        while ($data = $user->fetch()) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $data['name'] . '<br />'?>
                </td>
                <td>
                    <?php
                    echo $data['username'] . '<br />' ?>
                </td>
                <td>
                    <?php
                    echo $data['mail'] . '<br />' ?>
                </td>
                <td>
                    <?php
                    echo $data['password'] . '<br />' ?>
                </td>
                <td>
                    <?php
                    echo $data['adress'] . '<br />' ?>
                </td>
                <td>
                    <?php
                    echo $data['city'] . '<br />' ?>
                </td>
                <td>
                    <?php
                    echo $data['type'] . '<br />' ?>
                </td>

                <td>
                    <a href="edit_profil.php?edit=<?php echo $data['id'] ?>">Edit</a>
                </td>
            </tr>

            <?php

        }
        ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary btn-block col-4" style="margin-left: 33%">Back</a>

</div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>
</html>