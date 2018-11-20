<?php
/**
 * Created by PhpStorm.
 * User: dclae
 * Date: 24/10/2018
 * Time: 19:52
 */

/**
 * @return mixed|null
 */

function getSessionUser()
{
    if(empty($_SESSION['user']))
    {
        return NULL;
    }
    else
    {
        return unserialize($_SESSION['user']);
    }
}


/** change the name of folder with the one where you are  */

function getRoot()
{
    $folder = "/WEB%20IMMERSION/South-Africa/";
    return "http://".$_SERVER['HTTP_HOST'].$folder;
}


function autoload($classname)
{

    if (file_exists($file = dirname(__DIR__).'/class/'. $classname . '.php'))
    {
        require $file;
    }
}

spl_autoload_register('autoload');


