<?php 
include('connect.php');
if(logged_admin($BDD))
{
    $Requete="UPDATE stories SET `hidden`=1 WHERE S_ID=:ID";
    $response = $BDD->prepare($Requete);
    $response->execute(array("ID"=>$_GET['S_ID']));
}
else
{
    header("Location:index.php", TRUE, 301);
    exit();
}
?>