<?php session_start();
include('connect.php');
?>
<div class="white">
    <div class="containeurnav white">
        <div class="rang-nav white2">
            <a href="index.php" class="w-nav-brand"><img width="50" src="img/logo.png"></a>
            <nav class="nav-menu w-nav-menu">

                <a href="read.php">
                    <div class="textwrapper2">
                        <div class="up">
                            Lire une histoire
                        </div>
                    </div>
                </a>

                <a href="write-history.php">
                    <div class="textwrapper2">
                        <div class="up">
                            Ecrire une histoire
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="textwrapper2">
                        <div class="up">
                            A propos
                        </div>
                    </div>
                </a>

            </nav>

            <div class="button w-inline-block">
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
