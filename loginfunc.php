<?php
function logged($BDD)
{
    $Requete="SELECT COUNT(*) as nb FROM users WHERE login=:LOGIN AND password=:PASSWORD";
    $response = $BDD->prepare($Requete);
    $response->execute(array(
        "LOGIN" => $_SESSION['login'],
        "PASSWORD"=> $_SESSION['password']
    ));
    $_COOKIE=$response->fetch();
    if($_COOKIE['nb']==1)
    {
     return true;
    }
    return false;
}
function logged_admin($BDD)
{
    $Requete="SELECT COUNT(*) as nb FROM users WHERE login=:LOGIN AND password=:PASSWORD AND admin=0";
    $response = $BDD->prepare($Requete);
    $response->execute(array(
        "LOGIN" => $_SESSION['login'],
        "PASSWORD"=> $_SESSION['password']
    ));
    $_COOKIE=$response->fetch();
    if($_COOKIE['admin_nb']==1)
    {
     return true;
    }
    return false;
}
?>