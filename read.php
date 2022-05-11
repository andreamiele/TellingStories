<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <?php
        if(logged($BDD))
        {
        if(isset($_GET['S_ID']) && isset($_SESSION['paragraphes']) && isset($_GET['id']) && $_SESSION['paragraphe'])
        {
            $numeropag = $_SESSION['paragraphes'][$_GET['id']];
            $_SESSION['paragraphe']=$numeropag;

            if ($_SESSION['paragraphe']==1)
            {
                $Requete="UPDATE stories
                    SET vues=vues+1
                    WHERE S_ID=:SID";
                $response = $BDD->prepare($Requete);
                $response->execute(
                    array(
                        "SID"=>secure($_GET['S_ID'])
                    ));

                $Requete="UPDATE users
                    SET Played=Played+1
                    WHERE User_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(
                    array(
                        "UID"=>secure($_SESSION['U_ID'])
                    ));
            }


                $Requete="UPDATE marquage
                    SET P_ID=:PID
                    WHERE S_ID=:SID
                    AND U_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(
                    array(
                            "PID"=>secure($_SESSION['paragraphe']),
                        "SID"=>secure($_GET['S_ID']),
                        "UID"=>secure($_SESSION['U_ID'])
                    ));
            $Requete="SELECT * FROM `STORIES` WHERE S_ID=:ID";
            $response = $BDD->prepare($Requete);
            $response->execute(array("ID"=>$_GET['S_ID']));
            $Hidden=$response->fetch();
            $hide=$Hidden['hidden'];
        array_push($_SESSION['chemin'],$_SESSION['paragraphe']);
        $Requete="SELECT P_ID,text,Suite,nbTrophee  FROM paragraphs WHERE S_ID =:NUMBERS AND P_ID =:NUMBERS2";
        $response = $BDD->prepare($Requete);
        $response->execute(array("NUMBERS"=>$_GET['S_ID'],"NUMBERS2"=>$_SESSION['paragraphe']));
        $readStoryInfo=$response->fetch();
        $_SESSION['nbTrophee']+=$readStoryInfo['nbTrophee'];
        if ($hide==0){
            if ($readStoryInfo['Suite']==2) // Continuer
            {
        ?>

        <div class="accueilsection">
                    <h1 class="accueiltitrelivre">
                        <?=$readStoryInfo['P_ID']?>
                    </h1>
        </div>
        <div class="card-object" data-scroll data-scroll-speed="1">
            <div class="object-container">
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>
            </div>
        </div>

    <div class="card-history" data-scroll data-scroll-speed="1">
        <div class="card-body">
            <p>
                <?=$readStoryInfo['text']?>
            </p>
        </div>
    </div> </br>
        <?php

        $Requete="SELECT ID_ARRIVEE,NOM_ACTION  FROM actions WHERE S_ID =:NUMBERS AND ID_DEPART =:NUMBERS2";
        $response = $BDD->prepare($Requete);
        $response->execute(array("NUMBERS"=>$_GET['S_ID'],"NUMBERS2"=>$_SESSION['paragraphe']));

        $i=0;
        $_SESSION['paragraphes']=array();
        while($ActionInfo=$response->fetch())
        {
            /*$_SESSION['paragraphe']=$ActionInfo['ID_ARRIVEE'];*/


            array_push($_SESSION['paragraphes'],$ActionInfo['ID_ARRIVEE']);
        ?>
            <div class="contactbutton">

                    <a href="read.php?S_ID=<?=$_GET['S_ID'] ?>&id=<?=$i?>"><button class="bn632-hover bn25"><?=$ActionInfo['NOM_ACTION']?></button></a>
            </div>
            <div class="contactbutton">
                <button onclick="clickrandom()" class="bn632-hover-2 bn19">Hasard !</button>
            </div>
        <?php $i=$i+1;
        }
            } // If continuer
            elseif($readStoryInfo['Suite']==0) // VICTOIRE
            {
                $Requete = "DELETE FROM marquage 
                    WHERE 
                    S_ID=:SID
                    AND U_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(array(
                    "SID"=>secure($_GET['S_ID']),
                    "UID"=>secure($_SESSION['U_ID'])
                ));



                $Requete="UPDATE users
                    SET Won=Won+1
                    WHERE User_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(
                    array(
                        "UID"=>secure($_SESSION['U_ID'])
                    ));
            ?>

                <div class="accueilsection">
                    <h1 class="accueiltitrelivre">
                        VICTOIRE
                    </h1>
                </div>

                <div class="card-object" data-scroll data-scroll-speed="1">
                    <div class="object-container">
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                    </div>
                </div>


                <div class="card-history" data-scroll data-scroll-speed="1">
                    <div class="card-body">
                        <p>
                            <?=$readStoryInfo['text']?>
                        </p>
                    </div>
                </div> </br>


                <div class="contactbutton">
                    <a href="recap.php?S_ID=<?=$_GET['S_ID'] ?>"><button class="bn632-hover bn25">RECAPITULATIF</button></a>
                </div>
        <?php
            } // If victoire
            elseif($readStoryInfo['Suite']==1) // DEFAITE
            {
                $Requete="UPDATE users
                    SET Lost=Lost+1
                    WHERE User_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(
                    array(
                        "UID"=>secure($_SESSION['U_ID'])
                    ));


                $Requete = "DELETE FROM marquage 
                    WHERE 
                    S_ID=:SID
                    AND U_ID=:UID";
                $response = $BDD->prepare($Requete);
                $response->execute(array(
                    "SID"=>secure($_GET['S_ID']),
                    "UID"=>secure($_SESSION['U_ID'])
                ));



        ?>
                <div class="accueilsection">
                    <h1 class="accueiltitrelivre">
                        DEFAITE
                    </h1>
                </div>

                <div class="card-object" data-scroll data-scroll-speed="1">
                    <div class="object-container">
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                        <div class="object-body">
                            <h3> Object 1 :</h3>
                        </div>
                    </div>
                </div>

                <div class="card-history" data-scroll data-scroll-speed="1">
                    <div class="card-body">
                        <p>
                            <?=$readStoryInfo['text']?>
                        </p>
                    </div>
                </div> </br>

                <div class="contactbutton">
                    <a href="recap.php?S_ID=<?=$_GET['S_ID'] ?>"><button class="bn632-hover bn25">RECAPITULATIF</button></a>
                </div>


                <?php
            } // If Défaite
        }
        else
        {?>
            <div>C'est po gentil de faire le bazard ici madge.</div>
       <?php }
        }// Isset
        } // Logged BDD
        ?>
    </div>
</div>

<!-- Mettre la valeur prévue dans le paragraphe en paramètre de la fonction-->

<!-- Il faut mettre une valeur null ou inutilisé si on ne fait pas de random afin que je puisse faire un if / else -->
<script>
    function clickrandom(){
        var result ="<?php random(); ?>"
        document.write(result);
    }
</script>


<!-- Mettre la valeur dans le paragraphe au lieu du x -->
<?php function random($x){
    rand(0,$x);
    }
    ?>

<?php include("footer.php") ?>
