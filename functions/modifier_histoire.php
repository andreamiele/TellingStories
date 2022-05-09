<?php session_start();
include("../connect.php");
function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
$history = $_GET["S_ID"];
$Requete="UPDATE stories 
SET title=:TITLE, 
    `desc`=:DESCR, 
    `tag`=:TAG,
    create_date=:CDATE, 
    picture=:PIC, 
    auteur=:AUTEUR 
WHERE S_ID=:SID";
$response = $BDD->prepare($Requete);
$response->execute(
    array(
        "TITLE"=>secure($_POST['titre']),
        "DESCR"=>secure($_POST['descr']),
        "TAG"=>secure($_POST['categorie']),
        "CDATE"=>secure($_POST['date']),
        "PIC"=>secure($_POST['couverture']),
        "AUTEUR"=>secure($_POST['auteur']),
        "SID"=>secure($_GET['S_ID']),
    ));

header("Location: ../presentationstory.php?S_ID=".$history);
exit();