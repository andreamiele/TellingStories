<?php include("entete.php");
include("nav.php");
if(logged($BDD))
{
?>

    <div class="conteneurpage" data-scroll-section>
        <div class="emballage">
            <div class="accueilsection">


                <h1 class="accueiltitrelivre">
                    Ecrire une histoire
                </h1>

            </div>


            <div class="card-history-create" data-scroll data-scroll-speed="1">

                <div class="card-body">
                    <form id="stripe-login" method="POST" action="write-parag.php">
                        <div class="field padding-bottom--24">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id ="titre">
                        </div>
                        <div class="field padding-bottom--24">
                            <label for="annee">Catégorie</label>
                            <input type="text" name="categorie" id ="categorie">
                        </div>
                        <div class="field padding-bottom--24">
                            <label for="annee">Date d'écriture</label>
                            <input type="date" name="date" id ="date">
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
            </br>
            <div class="contactbutton">
                <a href="write-parag.php"><button class="bn632-hover-2 bn25">Accéder au premier paragraphe</button></a>
            </div>
        </div>
    </div>
<?php 
}
include("footer.php"); ?>