<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <div class="accueilsection">


            <h1 class="accueiltitrelivre">
                Bienvenue NomUtilisateur <!-- Mettre le nom d'utilisateur qui est connecté -->
            </h1>

        </div>
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <div class="center">
            <form  action="">

                    <h1>Suppression de compte</h1>
                    <p>Voulez-vous vraiment supprimer votre compte ?</p>

                    <div class="clearfix">
                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="bn632-hover bn22">Cancel</button>
                        <button type="button" class="bn632-hover bn28">Delete</button>
                    </div>

            </form>
            </div>
        </div>

        <div class="card-history" data-scroll data-scroll-speed="1">
        <div class="accueilrang-el-ments centre">

                <div class="div-block-5">

                    Login :

                </div>

                <div class="div-block-5">

                    <img src="">

                </div>

                <div class="div-block-5">

                    Nombre d'histoires jouées :
                    Nombre de victoires :
                    Nombre de défaites :

                </div>
            <div class="div-block-5">

                ouioui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui nonoui non

            </div>



        </div>
        </div>
        </br>
        <div class="contactbutton">
            <a href="write-parag.php"><button class="bn632-hover-2 bn25">Se déconnecter</button></a>
            <button class="bn632-hover-2 bn25" onclick="document.getElementById('id01').style.display='block'">Supprimer mon compte</button>
        </div>
    </div>
</div>


    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }

        }
    </script>
<?php include("footer.php") ?>