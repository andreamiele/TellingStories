<?php session_start();
include('connect.php');
if(isset($POST['login']) && isset($POST['password']))
{
    $_SESSION['login']=$_POST['login'];
    $_SESSION['password']=$_POST['password'];
}
if(!isset($_SESSION['login']) || !isset($_SESSION['password']))
{include('login.html');}
else
{
    $Requete="'SELECT COUNT(*) as nb FROM user WHERE login=".$_SESSION['login']." AND password=".$_SESSION['password'];
    $response = $bdd->prepare($Requete);
    $_SESSION=$response->fetch();
    if($login['nb']==1)
    {
    ?>
    <h2 class="text-center">Vous êtes connecté <?=$_SESSION['login']?> !</h2>
 <?php
}}
?> 