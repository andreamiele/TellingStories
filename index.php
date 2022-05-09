<?php include("entete.php") ?>
<?php include("nav.php") ?>

        <div class="conteneurpage" data-scroll-section>
            <div class="emballage">
                <div class="accueilsection">
                    <div class="accueilcolonnes">
                        <div class="" >
                            <h1 class="accueiltitreprincipal">
                                Telling Stories
                            </h1>
                        </div>
                        <div class="">

                        </div>
                    </div>
                </div>

                <?php
                if(isset($_SESSION['connecte']))
                {
                    if($_SESSION['connecte'])
                    {
                        echo'<div id="snackbar">Vous êtes connecté !</div>';
                    }
                }
                ?>
                <div class="emballage">
                    <?php 
                    if(logged($BDD))
                    {
                    ?>
                        <div class="accueilsection">
                            <div class="emballagecontenu">
                                <div class="rang centr-y">
                                    <div class="headingline" data-scroll data-scroll-speed="1"></div>
                                    <h2 data-scroll data-scroll-speed="1">Histoires commencées</h2>
                                </div>
                                <div class="container swiper" >
                                <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                                    <?php
                                    $Requete="SELECT S_ID FROM advancement WHERE User_iD=(SELECT User_iD FROM users WHERE login=:LOGIN )";
                                    $response = $BDD->prepare($Requete);
                                    $response->execute(array("LOGIN"=>$_SESSION['login']));
                                    while($readStories=$response->fetch())
                                    {
                                        $Requete="SELECT title, `desc`, picture, tag, S_ID FROM stories WHERE S_ID =:NUMBERS";
                                        $response = $BDD->prepare($Requete);
                                        $response->execute(array("NUMBERS"=>$readStories['S_ID']));
                                        while($readStoryInfo=$response->fetch())
                                        {
                                    ?>
                                            <div class="card swiper-slide" >
                                                <div class="card-body-due">
                                                    <h3>
                                                        <?=$readStoryInfo['title']?>
                                                    </h3>
                                                </div>
                                                <a href="">
                                                    <div class="card-header">
                                                        <img src="<?=$readStoryInfo['picture']?>" alt="<?=$readStoryInfo['tag']?>" />
                                                    </div>
                                                </a>
                                                <div class="card-body">
                                                    <p>
                                                        <?=$readStoryInfo['desc']?>
                                                    </p>
                                                    <span class="tag tag-teal"><?=$readStoryInfo['tag']?></span>
                                                    <!--
                                                    <div class="user">
                                                        <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
                                                        <div class="user-info">
                                                            <h5>July Dec</h5>
                                                            <small>2h ago</small>
                                                        </div>
                                                    </div>
                                                    -->
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                        ?>

                                </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev" data-scroll data-scroll-speed="1"></div>
                                    <div class="swiper-button-next" data-scroll data-scroll-speed="1"></div>

                                    <!-- If we need scrollbar -->
                                    <div class="swiper-scrollbar" data-scroll data-scroll-speed="1"></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>    

                    <div class="accueilsection">
                        <div class="emballagecontenu">
                            <div class="rang centr-y">
                                <div class="headingline" data-scroll data-scroll-speed="1"></div>
                                <h2 data-scroll data-scroll-speed="1">Toutes les histoires</h2>
                            </div>

                            <div class="container swiper" >
                                <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                                    <?php
                                    $Requete="SELECT * FROM stories";

                                    $response = $BDD->prepare($Requete);
                                    $response->execute();


                                    $userStatus = logged_admin($BDD);
                                    while($stories=$response->fetch())
                                    {
                                        if ($stories['hidden']==0 || $userStatus){
                                        ?>
                                            <div class="card swiper-slide" >
                                                <div class="card-body-due">
                                                    <h3>
                                                        <?=$stories['title']?>
                                                    </h3>
                                                </div>
                                                <a href="presentationstory.php?S_ID=<?= $stories['S_ID'] ?>">
                                                    <div class="card-header">
                                                        <img src="<?php
                                                        if ($stories['picture']!=null){?>
                                                        <?=$stories['picture']?>

                                                        <?php }
                                                        else{ ?>
                                                        https://picsum.photos/200/300
                                                        <?php }
                                                        ?>" alt="<?=$stories['tag']?>" />
                                                    </div>
                                                </a>
                                                <div class="card-body">
                                                    <p>
                                                        <?=$stories['desc']?>
                                                    </p>
                                                    <span class="tag tag-teal"><?=$stories['tag']?></span>
                                                    <!--
                                                    <div class="user">
                                                        <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
                                                        <div class="user-info">
                                                            <h5>July Dec</h5>
                                                            <small>2h ago</small>
                                                        </div>
                                                    </div>
                                                    -->
                                                </div>
                                            </div>
                                        <?php



                                        }

                                    }
                                        

                                        ?>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev" data-scroll data-scroll-speed="1"></div>
                                <div class="swiper-button-next" data-scroll data-scroll-speed="1"></div>

                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar" data-scroll data-scroll-speed="1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="accueilsection">
                        <div class="emballagecontenu">
                            <div class="rang centr-y">
                                <div class="headingline" data-scroll data-scroll-speed="1"></div>
                                <h2 data-scroll data-scroll-speed="1">Nouvelles histoires</h2>
                            </div>

                            <div>

                            </div>
                        </div>
                    </div>

                    <div class="accueilsection">
                        <div class="emballagecontenu">
                            <div class="rang centr-y">
                                <div class="headingline" data-scroll data-scroll-speed="1"></div>
                                <h2 data-scroll data-scroll-speed="1">Trending</h2>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>


                </div>



                <div class="accueilsection2">
                    <div class="test1" id="direction">
                        <div data-scroll data-scroll-speed="6" data-scroll-direction="horizontal"  class="test2" style="font-size:100px;">
                            Nous voilà arrivés au parc. On repère toujours monsieur Charles de loin grâce à son grand
                            panier rouge. Mais ce soir, le banc vert sur lequel monsieur Charles s’assoit est vide....
                        </div>

                    </div>

                    <div class="test1-1" >
                        <div data-scroll data-scroll-speed="-6" data-scroll-direction="horizontal"  class="test2-1" style="font-size:100px;">
                            Après les combattants sont venus les charognards. Les humains d’abord : voleurs,
                            gredins, mendiants ; ceux qui suivent toujours les armées dans l’espoir de récupérer quelques
                            miettes......
                        </div>

                    </div>
                    <div class="test1-2" >
                        <div data-scroll data-scroll-speed="6" data-scroll-direction="horizontal"  class="test2-2" style="font-size:100px;">
                            Quoi que vous fassiez, il n’a plus beaucoup de temps à vivre… Il vous incombe
                            de l’aider à traverser le miroir.....
                        </div>

                    </div>
                    <div class="test1-3" >
                        <div data-scroll data-scroll-speed="-6" data-scroll-direction="horizontal"  class="test2-3" style="font-size:100px;">
                            Vous éteignez votre smartphone et fermez les yeux. Vous vous enfoncez un peu plus profondément
                            dans le siège de l’avion qui vous conduit chez votre nouvel employeur. Ce dernier, un certain Billy
                            Ponts.....
                        </div>

                    </div>
                    <div class="test1-4" >
                        <div data-scroll data-scroll-speed="6" data-scroll-direction="horizontal"  class="test2-4" style="font-size:100px;">
                            Vous réfléchissez et concluez que l’itinéraire le moins dangereux est celui qui traverse les cuisines et
                            les chambres froides...
                        </div>

                    </div>
                    <div class="test1-5" >
                        <div data-scroll data-scroll-speed="-6" data-scroll-direction="horizontal"  class="test2-5" style="font-size:100px;">
                            Quelle que soit
                            votre décision, vous n’avez pas de temps à perdre....
                        </div>

                    </div>



                    <div class="center" data-scroll data-scroll-speed="1">
                        Ecrire une histoire
                    </div>
                </div>


                <div data-scroll data-scroll-speed="1">
                    <div class="accueilsection collaborons wf-section">
                        <h2 class="headingcontact">Une question ? <br/>N’hésitez pas à nous contacter !</h2>
                        <div class="center2">
                            <div class="contactblock">
                                <div class="contact">
                                    <div class="formblockcentered">
                                        <div class="form-block w-form">
                                            <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="get" class="form">
                                                <div class="columns-3 w-row">
                                                    <div class="columnnopadding w-col w-col-6">
                                                        <input type="text" class="contacttextfield w-input" maxlength="256" name="Nom" data-name="Nom" placeholder="Nom" id="Nom" required=""/>

                                                    </div>
                                                    <div class="columnnopadding w-col w-col-6">
                                                        <input type="email" class="contacttextfield w-input" maxlength="256" name="Email" data-name="Email" placeholder="Email" id="Email" required=""/>

                                                    </div>
                                                </div>
                                                <textarea data-name="Message" maxlength="5000" id="Message" name="Message" placeholder="Votre message ..." required="" class="contacttextfield larger-height w-input"></textarea>
                                                <div class="contactbutton">
                                                    <a href="/"><button class="bn632-hover bn25">Envoyer</button></a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <?php include("messagefin.php") ?>
            </div>
        </div>
<?php
echo'<script>
    function myFunction() {



        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>';

include("footer.php"); ?>
