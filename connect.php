<?php
function logged($BDD)
{ if(isset($_SESSION['login']) && isset($_SESSION['password']))
    {
        $Requete="SELECT COUNT(*) as nb FROM users WHERE login=:LOGIN AND password=:PASSWORD";
        $response = $BDD->prepare($Requete);
        $response->execute(array(
            "LOGIN" => $_SESSION['login'],
            "PASSWORD"=> $_SESSION['password']
        ));
        while($_COOKIE=$response->fetch())
        {
            if($_COOKIE['nb']==1)
            {
                $Requete="SELECT `Name`, Prenom users WHERE login=:LOGIN";
                $response = $BDD->prepare($Requete);
                $response->execute(array("LOGIN" => $_SESSION['login']));
                $_COOKIE=$response->fetch();
                $_SESSION['nom']=$_COOKIE['Name'];
                $_SESSION['prenom']=$_COOKIE['Prenom'];
                return true;
            }
        }
    }
    
    return false;
}
function logged_admin($BDD)
{
    if(isset($_SESSION['login']) && isset($_SESSION['password']))
    {
        $Requete="SELECT COUNT(*) as nb FROM users WHERE login=:LOGIN AND password=:PASSWORD AND admin=1";
        $response = $BDD->prepare($Requete);
        $response->execute(array(
            "LOGIN" => $_SESSION['login'],
            "PASSWORD"=> $_SESSION['password']
        ));
        while($_COOKIE=$response->fetch())
        {
            if($_COOKIE['admin_nb']==1)
            {
            return true;
            }
        }
    }
    return false;
}
try {
$BDD = new PDO( "mysql:host=localhost;dbname=histoires;charset=utf8",
"blamirault","Benasa01", array(PDO::ATTR_ERRMODE
=>PDO::ERRMODE_EXCEPTION));
}
# Résultat du form de login.php: $_POST['login'] et $_POST['password']
catch (Exception $e) {
die('Erreur fatale : ' . $e->getMessage());
}
?>