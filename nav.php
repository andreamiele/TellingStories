<?php session_start();
include('connect.php');
function secure($user_input)
{
    $secure_input=htmlspecialchars($user_input,ENT_QUOTES,'UTF-8',false);
    return $secure_input;
}
?>
<div class="white">
    <div class="containeurnav white">
        <div class="rang-nav white2">
            <a href="index.php" class="w-nav-brand"><img width="50" src="img/logo.png"></a>
            <nav class="nav-menu w-nav-menu">

                <a href="read.php" class="link link--metis">
                    <div class="textwrapper2">
                        <div class="up">
                            Lire une histoire
                        </div>
                    </div>
                </a>

                <a href="write-history.php" class="link link--metis">
                    <div class="textwrapper2">
                        <div class="up">
                            Ecrire une histoire
                        </div>
                    </div>
                </a>

                <a href="infos.php" class="link link--metis">
                    <div class="textwrapper2">
                        <div class="up">
                            A propos
                        </div>
                    </div>
                </a>

            </nav>

            <div class="button w-inline-block link link--metis">
                <?php
                if(logged($BDD))
                {?>
                    <a href="profil.php" class="up"><?=$_SESSION['login']?></a>
                <?php
                }
                else
                {
                ?>
                <a href="login.php" class="up">Se connecter</a>
                <?php
                }
                ?>
            </div>
        </div> <!-- rang nav -->
    </div> <!-- containeurnav -->
</div> <!-- white -->
