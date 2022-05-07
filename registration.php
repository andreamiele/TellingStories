<?php
include('entete.php');
include('nav.php');
if(!isset($_POST['Nom']))
{
?>
<div data-scroll-section>
  <div class="accueilsection collaborons wf-section">
    <h2 class="headingcontact">S'inscrire</h2>
    <div class="center2">
      <div class="contactblock">
        <div class="contact">
          <div class="formblockcentered">
            <div class="form-block w-form">
              <?php ?>
              <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="POST" class="form" action="">
                <div class="columns-3 w-row">
                  <div class="columnnopaddingleft w-col w-col-6">
                    <input type="text" class="contacttextfield w-input" maxlength="256" name="Nom" data-name="Nom" placeholder="Nom" id="Nom" required=""/>
                    <input type="text" class="contacttextfield w-input" maxlength="256" name="Prénom" data-name="Prénom" placeholder="Prénom" id="Prénom" required=""/>
                    <input type="email" class="contacttextfield w-input" maxlength="256" name="Email" data-name="Email" placeholder="Email" id="Email" required=""/>
                    <input id="password" type="password" class="contacttextfield w-input" maxlength="256" name="password" data-name="password" placeholder="Mot de passe" id="password" required=""/>

                    <input id="password2"type="password" class="contacttextfield w-input" maxlength="256" name="password2" data-name="password2" placeholder="Confirmer le mot de passe" id="password2" required=""/>
                    <div >
                      <img id="error" src='img/gooseMot.tiff' style="display:none">
                    </div>
                  </div>
                  <div class="contactbutton">
                    <button type='submit' class="bn632-hover bn25">S'inscrire</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
}
else
{ 
  $Requete="SELECT `login` FROM users;";
  $response = $BDD->prepare($Requete);
  $response->execute();
  $Emails=$response->fetch();
  if(!in_array($_POST['Email'],$Emails))
  {
    $Requete="SELECT MAX(`User_ID`)+1 FROM users;";
    $response = $BDD->prepare($Requete);
    $response->execute();
    $User_number=$response->fetch();
    $Requete="INSERT INTO users (`User_ID`, Nom, Prenom, `login`, `password`, nbTrophees) VALUES (:ID, :NOM, :PRENOM, :EMAIL, :PASS, 0);";
    $response = $BDD->prepare($Requete);
    $response->execute(array("ID"=>$User_number,"NOM"=>secure($_POST['Nom']),"PRENOM"=>secure($_POST['Prenom']),"EMAIL"=>secure($_POST['Email']), "PASS"=>secure($_POST['password'])));
  }
  else
  {
    $_SESSION['used_email']=true;
    sleep(30);
    header("Location:registration.php", TRUE, 301);
    exit();
  }
}
?>
  <div>
      Ceci est la fin du site.
  </div>
<?php include('footer.php');?>
  <footer>
    Telling stories.
  </footer>

</div>
<script src="locomotive-scroll.min.js"></script>
<script src="js.js"></script>
<script>
  (function () {
    var scroll = new LocomotiveScroll();
  })();


  var myInput = document.getElementById("password");
  var myInput2 = document.getElementById("password2");

  myInput2.addEventListener("change", ()=>{if (myInput2.value != myInput.value) {
    var error = document.getElementById("error");
    error.style.display="block";

  } else{
    document.getElementById("error").style.display="none";
  }})



</script>
</body>

</html>
