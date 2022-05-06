<?php
include('entete.php');
include('nav.php');
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
              <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="POST" class="form">
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



  <div>
    Ceci est la fin du site.
  </div>
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