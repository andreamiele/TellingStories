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
                <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="POST" class="form">
                  <div class="columns-3 w-row">
                    <div class="columnnopaddingleft w-col w-col-6">
                      <input type="text" class="contacttextfield w-input" maxlength="256" name="Nom" data-name="Nom" placeholder="Nom" id="Nom" required=""/>
                      <input type="text" class="contacttextfield w-input" maxlength="256" name="Prenom" data-name="Prenom" placeholder="Prénom" id="Prenom" required=""/>
                      <input type="email" class="contacttextfield w-input" maxlength="256" name="Email" data-name="Email" placeholder="Email" id="Email" required=""/>
                      <input type="password" class="contacttextfield w-input" maxlength="256" name="password" data-name="password" placeholder="Mot de passe" id="password" required=""/>
                      <input type="password" class="contacttextfield w-input" maxlength="256" name="password2" data-name="password2" placeholder="Confirmer le mot de passe" id="password2" required=""/>
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
  {?>
    <h2>Cet Email a déjà été utilisé !</h2>
    
  <?php
  sleep(1);
  header("Location:registration.php", TRUE, 301);
  exit();
  }
}
?>
  <div>
      Ceci est la fin du site.
  </div>
<?php include('footer.php');?>