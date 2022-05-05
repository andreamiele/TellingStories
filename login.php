<?php session_start();
    include('connect.php');
    include('loginfunc.php');
    if(isset($_POST['Email']) && isset($_POST['Password']))
    {
        $_SESSION['login']=$_POST['Email'];
        $_SESSION['password']=$_POST['Password'];
    }
    if(!isset($_SESSION['login']) || !isset($_SESSION['password']))
    {
        include('login.html');
    }
    if(logged($BDD))
    {
    ?>
        <h2 class="text-center">Vous êtes connecté <?=$_SESSION['login']?> !</h2>
    <?php
    }
?> 