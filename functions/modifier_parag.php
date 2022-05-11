<?php session_start();
include("../connect.php");
function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
$history = $_GET["S_ID"];
$parag = $_GET["P_ID"];
if(logged($BDD))
{
    if (isset($_GET['S_ID'])&&isset($_GET['P_ID']))
    {
        if (logged_admin($BDD))
        {
            $Requete = "UPDATE paragraphs 
                        SET text=:TEXT, 
                            image=:IMAGE, 
                            sound=:SOUND,
                            Suite=:SUITE, 
                            nbTrophee=:NBTROPHEE
                        WHERE S_ID=:SID AND P_ID=:PID";
            $response = $BDD->prepare($Requete);
            $response->execute(
                array(
                    "TEXT" => secure($_POST['text']),
                    "IMAGE" => secure($_POST['image']),
                    "SOUND" => secure($_POST['sound']),
                    "NBTROPHEE" => secure($_POST['trophee']),
                    "SUITE" => secure($_POST['select']),
                    "SID" => secure($history),
                    "PID" => secure($parag)
                ));


            for ($i = 0; $i < count($_POST['action']); $i++)
            {
                if ($i % 2 == 0)
                {
                    $A = $_POST['action'][$i];
                    $B = $_POST['action'][$i + 1];
                    $R = "DELETE FROM actions 
                            WHERE 
                                  `S_ID`=:NUM AND 
                                  ID_DEPART=:DEP";
                    $response = $BDD->prepare($R);
                    $response->execute(array("DEP" => secure($parag), "NUM" => secure($history)));

                    $Requete = "INSERT INTO actions (ID_DEPART, NOM_ACTION, ID_ARRIVEE, CONSEQUENCE, S_ID) VALUES (:DEP,:NOM,:ARR,:CONS,:SID);";

                    $response = $BDD->prepare($Requete);
                    $response->execute(array("DEP" => secure($_GET['P_ID']), "NOM" => secure($A), "ARR" => secure($B), "CONS" => NULL, "SID" => secure($history)));
                }
            }
        }
    }
}

header("Location: ../presentationstory.php?S_ID=".$history);
exit();
