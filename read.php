<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <?php
        if(logged($BDD))
        {
        if(isset($_GET['S_ID']) && isset($_GET['P_ID']))
        {

        $Requete="SELECT P_ID,text  FROM paragraphs WHERE S_ID =:NUMBERS AND P_ID =:NUMBERS2";
        $response = $BDD->prepare($Requete);
        $response->execute(array("NUMBERS"=>$_GET['S_ID'],"NUMBERS2"=>$_GET['P_ID']));
        $readStoryInfo=$response->fetch()
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


    </div>
    </br>
        <?php
        $Requete="SELECT ID_ARRIVEE,NOM_ACTION  FROM actions WHERE S_ID =:NUMBERS AND ID_DEPART =:NUMBERS2";
        $response = $BDD->prepare($Requete);
        $response->execute(array("NUMBERS"=>$_GET['S_ID'],"NUMBERS2"=>$_GET['P_ID']));


        while($ActionInfo=$response->fetch())
        {

        ?>
        <div class="contactbutton">
            <a href="read.php?S_ID=<?=$_GET['S_ID'] ?>&P_ID=<?=$ActionInfo['ID_ARRIVEE']?>"><button class="bn632-hover bn25"><?=$ActionInfo['NOM_ACTION']?></button></a>
        </div>
        <?php } ?>
        <div class="contactbutton">
            <button onclick="clickrandom()" class="bn632-hover-2 bn19">Hasard !</button>
        </div>
<?php }}?>
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
