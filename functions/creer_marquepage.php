<?php session_start();
include("../connect.php");

function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
$chemin ="";

foreach($_SESSION['chemin'] as $valeur)
{
    $chemin.=($valeur." ");
}
$Requete="INSERT INTO MARQUAGE (U_ID,S_ID,P_ID,CHEMIN) VALUES (:U_ID, :S_ID, :P_ID, :CHEMIN);";
$response = $BDD->prepare($Requete);
$response->execute(array("U_ID"=>secure($_SESSION['U_ID']),"P_ID"=>secure($_GET['P_ID']),"S_ID"=>secure($_GET['S_ID']), "CHEMIN"=>secure($chemin)));





$location = "Location: ../read.php?S_ID=".$_GET['S_ID']."&P_ID=".$_GET['P_ID'];
header( $location);
exit();

?>

<!-- A appeler quand on commence l'histoire -->