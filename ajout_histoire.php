<?php session_start();
include("connect.php");

function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}


$Requete="INSERT INTO stories (title, `desc`, `tag`, `create_date`, picture, `auteur`, write_date) VALUES (:TITLE, :DESCR, :TAG, :CREATE_DATE, :PIC, :AUTEUR, :WDATE);";
$response = $BDD->prepare($Requete);
$response->execute(array("TITLE"=>secure($_POST['titre']),"DESCR"=>secure($_POST['descr']),"TAG"=>secure($_POST['categorie']), "CREATE_DATE"=>secure($_POST['date']), "PIC"=>secure($_POST['couverture']), "AUTEUR"=>secure($_POST['auteur']), "WDATE"=> date("Ymd")));

$_SESSION['id_histoire']= $BDD -> lastInsertId();
$location = "Location: write-parag.php?&P_ID=1";
header( $location);
exit();

?>

