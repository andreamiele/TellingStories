<?php session_start();
include("connect.php");

function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}

$Requete="INSERT INTO paragraphs (S_ID, P_ID, text, back_image, image, sound, nbTrophee, Suite) VALUES (:S_ID, :PID, :TEXT, :BIMAGE, :IMAGE, :SOUND, :NBTROPHEE, :SUITE);";
$response = $BDD->prepare($Requete);
$response->execute(array("S_ID"=>secure($_SESSION['id_histoire']),"PID"=>$_GET['P_ID'],"TEXT"=>secure($_POST['text']), "BIMAGE"=>secure($_POST['image']), "IMAGE"=>secure($_POST['image']), "SOUND"=>secure($_POST['sound']) , "NBTROPHEE"=>secure($_POST['trophee']),  "SUITE"=>secure($_POST['select'])));
$_SESSION['id_parag']=$_GET['P_ID'];
$_SESSION['id_parag']+=1;

for ($i = 0; $i < count($_POST['action']); $i++) {
    if ($i % 2 == 0) {
        $A = $_POST['action'][$i];
        $B = $_POST['action'][$i + 1];
        $Requete = "INSERT INTO actions (ID_DEPART, NOM_ACTION, ID_ARRIVEE, CONSEQUENCE, S_ID) VALUES (:DEP,:NOM,:ARR,:CONS,:SID);";

        $response = $BDD->prepare($Requete);
        $response->execute(array("DEP" => secure($_GET['P_ID']), "NOM" => secure($A), "ARR" => secure($B), "CONS" => NULL, "SID" => secure($_SESSION['id_histoire'])));

    }
}


$location = "Location: write-parag.php?P_ID=".$_SESSION['id_parag'];
header( $location);
exit();

?>