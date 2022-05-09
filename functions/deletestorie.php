<?php
session_start();
include('../connect.php');
function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
if (logged_admin($BDD)) {
    $history = secure($_GET['S_ID']);
    $Requete = "DELETE FROM stories WHERE `S_ID`=:NUM ;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("NUM" => $history));

    $Requete = "DELETE FROM paragraphs WHERE `S_ID`=:NUM;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("NUM" => $history));

    $Requete = "DELETE FROM actions WHERE `S_ID`=:NUM;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("NUM" => $history));

    $Requete = "DELETE FROM advancement WHERE `S_ID`=:NUM;";
    $response = $BDD->prepare($Requete);
    $response->execute(array("NUM" => $history));
}
else{

}
header("Location:../index.php", TRUE, 301);
exit();
?>