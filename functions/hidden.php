<?php session_start();
include("../connect.php");
function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
if(logged($BDD)) {
    if (isset($_GET['S_ID']) && isset($_GET['info'])) {
        if (testHistory($BDD,$_GET['S_ID'])) {
            if (logged_admin($BDD)) {
                $info = $_GET["info"];
                $history = $_GET["S_ID"];
                if ($info == 0) {
                    $Requete = "UPDATE stories SET hidden=1 WHERE S_ID=:HISTORY";
                    $response = $BDD->prepare($Requete);
                    $response->execute(array("HISTORY" => secure($history)));
                } else {
                    $Requete = "UPDATE stories SET hidden=0 WHERE S_ID=:HISTORY";
                    $response = $BDD->prepare($Requete);
                    $response->execute(array("HISTORY" => secure($history)));
                }
            }
        }
    }
}
header("Location: ../presentationstory.php?S_ID=".$history);
exit();