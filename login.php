<?php session_start();
include('entete.php');
include('nav.php');
    if(isset($_POST['Email']) && isset($_POST['Password']))
    {
        $_SESSION['login']=$_POST['Email'];
        $_SESSION['password']=$_POST['Password'];
    }
    if(!isset($_SESSION['login']) || !isset($_SESSION['password']))
    {?>
        <div data-scroll-section>

            <div class="accueilsection collaborons wf-section">
            <h2 class="headingcontact">Se connecter</h2>
            <div class="center2">
                <div class="contactblock">
                <div class="contact">
                    <div class="formblockcentered">
                    <div class="form-block w-form">
                        <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="POST" class="form" action="login.php">
                        <div class="columns-3 w-row">
                            <div class="columnnopaddingleft w-col w-col-6">
                            <input type="email" class="contacttextfield w-input" maxlength="256" name="Email" data-name="Email" placeholder="Email" id="Email" required=""/>

                            </div>
                            <div class="columnnopadding w-col w-col-6">

                            <input type="password" class="contacttextfield w-input" maxlength="256" name="Password" data-name="Password" placeholder="Mot de Passe" id="Password" required=""/>

                            </div>
                        </div>

                        <div class="contactbutton">
                            <button type="submit" class="bn632-hover bn25">Se connecter</button>
                            <a href="registration.html"><button type="submit" class="bn632-hover bn25">S'inscrire</button></a>
                        </div>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- The actual snackbar -->
            <div id="snackbar">Some text some message..</div>


        <div>
            Ceci est la fin du site.
        </div>


    </div>

        
    <?php
    }
    if(logged($BDD))
    {
    ?>
        <h2 class="text-center">Vous êtes connecté <?=$_SESSION['login']?> !</h2>
    <?php
    header("Location:index.php", TRUE, 301);
    exit();
    }
?> 