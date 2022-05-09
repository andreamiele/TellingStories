<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <div class="accueilsection">
            <div class="accueilcolonnes">

                    <h1 class="accueiltitrelivre">
                        Lire une histoire
                    </h1>
            </div>
        </div>

        <!-- DIV A ECHO connexion connexion-->
        <!-- DIV A ECHO -->
        <!-- DIV A ECHO -->
        <!-- DIV A ECHO -->
        <!-- DIV A ECHO -->
        <!-- DIV A ECHO -->
        <div id="snackbar">Vous êtes connectés</div>




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
                                }
                                while($readStoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$readStoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a>
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
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



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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
                        <h2 data-scroll data-scroll-speed="1">Trending</h2>
                    </div>

                    <div class="container swiper" >
                        <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                            <?php
                            $Requete="SELECT * FROM stories";

                            $response = $BDD->prepare($Requete);
                            $response->execute();



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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
                        <h2 data-scroll data-scroll-speed="1">Sci-fi</h2>
                    </div>

                    <div class="container swiper" >
                        <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                            <?php
                            $Requete="SELECT * FROM stories";

                            $response = $BDD->prepare($Requete);
                            $response->execute();



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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
                        <h2 data-scroll data-scroll-speed="1">Enfantine</h2>
                    </div>

                    <div class="container swiper" >
                        <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                            <?php
                            $Requete="SELECT * FROM stories";

                            $response = $BDD->prepare($Requete);
                            $response->execute();



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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
                        <h2 data-scroll data-scroll-speed="1">Horreur</h2>
                    </div>

                    <div class="container swiper" >
                        <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                            <?php
                            $Requete="SELECT * FROM stories";

                            $response = $BDD->prepare($Requete);
                            $response->execute();



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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
                        <h2 data-scroll data-scroll-speed="1">Autre ..</h2>
                    </div>

                    <div class="container swiper" >
                        <div class="swiper-wrapper" data-scroll data-scroll-speed="1">
                            <?php
                            $Requete="SELECT * FROM stories";

                            $response = $BDD->prepare($Requete);
                            $response->execute();



                            while($stories=$response->fetch())
                            {
                                $Requete="SELECT title, `desc`, picture, tag FROM stories WHERE S_ID =:TITLE";
                                $response = $BDD->prepare($Requete);
                                $response->execute(array("TITLE"=>$stories['S_ID']));

                                while($StoryInfo=$response->fetch())
                                {
                                    ?>
                                    <div class="card swiper-slide" >
                                        <div class="card-body-due">
                                            <h3>
                                                <?=$StoryInfo['title']?>
                                            </h3>
                                        </div>
                                        <a href="">
                                            <div class="card-header">
                                                <img src="<?=$StoryInfo['picture']?>" alt="<?=$StoryInfo['tag']?>" />
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p>
                                                <?=$StoryInfo['desc']?>
                                            </p>
                                            <span class="tag tag-teal"><?=$StoryInfo['tag']?></span>
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
                                }}
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


        </div>








        <?php include("messagefin.php") ?>
    </div>
</div>

<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<!-- SCRIPT A ECHO POUR LA CONNEXIONNNN-->
<script>
    function myFunction() {



        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>

<?php include("footer.php"); ?>
