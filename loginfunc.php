<?php
function logged($bdd)
{
    $Requete="'SELECT COUNT(*) as nb FROM user WHERE login=".$_SESSION['login']." AND password=".$_SESSION['password'];
    $response = $bdd->prepare($Requete);
    $_SESSION=$response->fetch();
    if($_SESSION['nb']==1)
    {
     return true;
    }
}

?>