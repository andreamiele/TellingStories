<?php
function logged($BDD)
{
    $Requete="'SELECT COUNT(*) as nb FROM user WHERE login=".$_SESSION['login']." AND password=".$_SESSION['password'];
    $response = $BDD->prepare($Requete);
    $_SESSION=$response->fetch();
    if($_SESSION['nb']==1)
    {
     return true;
    }
    return false;
}
function logged_admin($BDD)
{
    $Requete="'SELECT COUNT(*) as nb FROM user WHERE login=".$_SESSION['login']."' AND password=".$_SESSION['password']."'AND admin=true";
    $response = $BDD->prepare($Requete);
    $_SESSION=$response->fetch();
    if($_SESSION['nb']==1)
    {
     return true;
    }
    return false;
}
?>