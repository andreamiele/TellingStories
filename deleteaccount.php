<?php
session_start();
include('connect.php');
if(logged($BDD))
{
    $Requete="SELECT `User_ID` as id FROM users WHERE `login`=:LOGIN;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("LOGIN"=>$_SESSION['login']));
    $_COOKIE=$response->fetch();

    $Requete="DELETE FROM advancement WHERE `User_iD`=:USER ;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("USER"=>$_COOKIE['id']));

    $Requete="DELETE FROM users WHERE `login`=:LOGIN;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("LOGIN"=>$_SESSION['login']));
}
header("Location:logout.php", TRUE, 301);
    exit();
?>