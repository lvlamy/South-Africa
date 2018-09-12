<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SouthAfrica2018</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">


</head>

<body>





<!-- Header -->
<header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            </div>
        </div>
    </div>
</header>



<?php
/**
 * Created by PhpStorm.
 * User: louis-victorlamy
 * Date: 12/09/2018
 * Time: 15:47
 */
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

}
?>


<div id="login">
    <div class="responsive-table-line" style="margin:0px auto;max-width:700px;">
        <table class="table table-bordered table-condensed table-body-center" >
            <h2>Verification</h2>
            <thead>
            <tr><th>Login</th><th>Password</th><th>Logout</th></tr>
            </thead>
            <tbody>
                <tr><td>
                        <?=  $_SESSION['login']?>
                    </td><td>
                        <?= md5($_SESSION['password'])?>
                    </td><td>
                        <a href="<?php ?>./logout.php">Logout</a>
                    </td>
                </tr>
            <tbody>
        </table>
    </div>
</div>




</body>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Your Website 2014</span>
            </div>
            <div class="col-md-4">
            </div>
        </div>
</footer>