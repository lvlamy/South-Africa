<?php
/**
 * Created by PhpStorm.
 * User: louis-victorlamy
 * Date: 12/09/2018
 * Time: 15:53
 */

// On démarre la session
session_start ();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: index.html');
?>