<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <div class="accueilsection">


            <h1 class="accueiltitrelivre">
                Bienvenue NomUtilisateur <!-- Mettre le nom d'utilisateur qui est connecté -->
            </h1>

        </div>


        <div class="card-history" data-scroll data-scroll-speed="1">
        <div class="accueilrang-el-ments centre">
            <div class="card-body">
                <form id="stripe-login">
                    <div class="field padding-bottom--24">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id ="titre">
                    </div>
                    <div class="field padding-bottom--24">
                        <label for="annee">Catégorie</label>
                        <input type="text" name="categorie" id ="categorie">
                    </div>
                    <div class="field padding-bottom--24">
                        <label for="annee">Année</label>
                        <input type="text" name="annee" id ="annee">
                    </div>
                    <div class="field padding-bottom--24">
                        <label for="couverture">Couverture</label>
                        <input type="file" name="couverture" id ="couverture">
                    </div>
                    <div class="field padding-bottom--24">
                        <label for="auteur">Auteur</label>
                        <input type="text" name="auteur" id="auteur">
                    </div>
                    <div class="field padding-bottom--24">
                        <label for="textarea">Description</label>
                        <textarea  id="textarea" ></textarea>
                    </div>


                </form>
            </div>

        </div>
        </div>
        </br>
        <div class="contactbutton">
            <a href="write-parag.php"><button class="bn632-hover-2 bn25">Accéder au premier paragraphe</button></a>
        </div>
    </div>
</div>

<?php include("footer.php") ?>