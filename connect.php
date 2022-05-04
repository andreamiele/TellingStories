<?php
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