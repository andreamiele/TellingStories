<?php
function logged($BDD)
{ if(isset($_SESSION['login']) && isset($_SESSION['password']))
    {
        $Requete="SELECT * FROM users WHERE login=:LOGIN";
        $response = $BDD->prepare($Requete);
        $response->execute(array(
            "LOGIN" => $_SESSION['login']
        ));
        while($_COOKIE=$response->fetch())
        {
            if(password_verify($_SESSION['password'],$_COOKIE['password']))
            {
                $Requete="SELECT `Nom`, Prenom,nbTrophees FROM users WHERE login=:LOGIN";
                $response = $BDD->prepare($Requete);
                $response->execute(array("LOGIN" => $_SESSION['login']));
                $_COOKIE=$response->fetch();
                $_SESSION['nom']=$_COOKIE['Nom'];
                $_SESSION['prenom']=$_COOKIE['Prenom'];
                $_SESSION['tresor']=$_COOKIE['nbTrophees'];
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
        $Requete="SELECT `password` as pass FROM users WHERE login=:LOGIN AND admin=1";
        $response = $BDD->prepare($Requete);
        $response->execute(array(
            "LOGIN" => $_SESSION['login']
        ));
        while($_COOKIE=$response->fetch())
        {
            if(password_verify($_SESSION['password'],$_COOKIE['password']))
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