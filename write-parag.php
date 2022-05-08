<?php include("entete.php") ?>
<?php include("nav.php") ?>

    <div class="conteneurpage" data-scroll-section>
        <div class="emballage">
            <div class="accueilsection">


                <h1 class="accueiltitrelivre">
                    Ecriture de paragraphe
                </h1>

            </div>


            <div class="card-history-create" data-scroll data-scroll-speed="1">

                <div class="card-body">
                    <form id="create">

                        <div class="field padding-bottom--24">
                            <label for="Text">Texte</label>
                            <textarea  id="Text" ></textarea>
                        </div>
                        <div class="field padding-bottom--24">
                            <label for="sound">Son</label>
                            <input type="file" name="sound" id ="sound">
                        </div>
                        <div class="field padding-bottom--24">
                            <label for="image">Image</label>
                            <input type="file" name="image" id ="image">
                        </div>
                        <div class="field padding-bottom--24">
                            <label for="selection">Suite de l'histoire</label>
                            <div class="selectdiv">
                                <select id="selection" class="select">
                                    <option value="0">Victoire</option>
                                    <option value="1">Défaite</option>
                                    <option value="2">Continuer</option>
                                </select>
                            </div>

                        </div>
                        <div class="field padding-bottom--24">
                            <label for="trophée">Nombre de trophée</label>
                            <input type="text" id="trophée" />
                        </div>
                        <div id="parag">
                            <div class="headingline2" ></div>

                            <div class="field padding-bottom--24">
                                <label for="action">Action</label>
                                <input type="text" id="action" />
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="nbaction">Numero du paragraphe</label>
                                <input type="text" id="nbaction" />
                            </div>
                        </div>
                        <div class="contactbutton">

                                <button class="bn632-hover bn25"  id="btn" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>



                        </div>
                        <div class="contactbutton">
                        <button class="bn632-hover-2 bn25"  id="btn" type="button">
                            Paragraphe suivant
                        </button>
                        </div>

                    </form>
                </div>


            </div>
            </br>

        </div>
    </div>

<?php include("footer.php") ?>