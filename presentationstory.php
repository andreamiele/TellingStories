<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <?php
        if(logged($BDD))
        {
            if(isset($_GET['S_ID']))
            {

                $Requete="SELECT title, `desc`, picture, tag, S_ID, create_date, auteur  FROM stories WHERE S_ID =:NUMBERS";
                $response = $BDD->prepare($Requete);
                $response->execute(array("NUMBERS"=>$_GET['S_ID']));
                $readStoryInfo=$response->fetch()
        ?>
        <div class="accueilsection">


            <h1 class="accueiltitrelivre">
                <?=$readStoryInfo['title']?>
            </h1>

        </div>


        <div class="card-history" style="display:flex; justify-content: space-around;" data-scroll data-scroll-speed="1">

            <div class="card-body" style=" width:60%;">

                <p>
                    <?=$readStoryInfo['desc']?>

                </p>
                <h3><?=$readStoryInfo['create_date']?></h3>
                <h3><?=$readStoryInfo['auteur']?></h3>
                <span class="tag tag-teal"><?=$readStoryInfo['tag']?></span>
            </div>
            <img src="img/logo.png" width="300" height="300"/>



        </div>
        </br>
        <?php
        $userStatus = logged_admin($BDD); //Request admin(bool)
        if ($userStatus) {
        ?>
        <div class="contactbutton">
            <a href="/"><button class="bn632-hover bn25">Modifier l'histoire</button></a>
            <a href="/"><button class="bn632-hover bn25">Modifier un paragraphe</button></a>
            <a href="hidden.php?S_ID<?=$_GET['S_ID']?>"><button class="bn632-hover bn25">Cacher l'histoire</button></a>
            <a href="/"><button class="bn632-hover bn25">Supprimer l'histoire</button></a>
        </div>
        <?php } ?>
        <div class="contactbutton">
            <a href="read.php?S_ID=<?=$_GET['S_ID']?>&P_ID=1"><button  class="bn632-hover-2 bn19">Lire l'histoire</button></a>
        </div>

    </div>
    <?php }
        }
        else
        {
            echo "<h1>You must create an account to read our stories ;)</h1> </br> <h2>Redirection ...</h2>";
            echo '<a href="login.php"><button  class="bn632-hover-2 bn19">Se connecter</button></a>';
        }
        ?>
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

