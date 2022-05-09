<?php include("entete.php") ?>
<?php include("nav.php") ?>

<?php
$userStatus = logged_admin($BDD); //Request admin(bool)
if ($userStatus) {
?>
<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <div class="accueilsection">


            <h1 class="accueiltitrelivre">
                Bienvenue <?php echo($_SESSION["nom"]." ".$_SESSION["prenom"]) ?> <!-- Mettre le nom d'utilisateur qui est connecté -->
            </h1>

        </div>

        <div class="contactbutton">
            <a href="logout.php" ><button class="bn632-hover-2 bn25">Accéder à la liste des histoires</button></a>

        </div>
        <?php
        $userStatus = logged_admin($BDD); //Request admin(bool)
        if ($userStatus) {
            ?>
            <div class="contactbutton">
                <a href=""></a><button class="bn632-hover bn28">Interface admin</button></a>
            </div>
        <?php } ?>
    </div>
</div>

<?php }

else
{
    echo "Acces Denied ! You are not an administrator";
}


?>
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
