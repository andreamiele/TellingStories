<?php include("entete.php") ?>
<?php include("nav.php") ?>

<div class="conteneurpage" data-scroll-section>
    <div class="emballage">
        <div class="accueilsection">


                    <h1 class="accueiltitrelivre">
                        Name
                    </h1>

        </div>
        <div class="card-object" data-scroll data-scroll-speed="1">
            <div class="object-container">
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>
                <div class="object-body">
                    <h3> Object 1 :</h3>
                </div>



            </div>
        </div>

    <div class="card-history" data-scroll data-scroll-speed="1">

        <div class="card-body">
            <p>
               , consectetur adipiscing elit. Sed sollicitudin vestibulum massa id pharetra. Sed mattis dui eu accumsan rutrum. Pellentesque volutpat purus eget augue pellentesque dictum. Nam placerat pretium dui ac vehicula. Aliquam erat volutpat. Nunc pharetra, arcu eu gravida aliquam, nunc purus egestas lorem, lacinia mattis felis ipsum a mi. Cras eleifend tempor ultricies. Aenean mauris mi, varius eget consectetur sed, elementum ac dolor. Ut pharetra sed risus ac tempor. Mauris libero lectus, vulputate vel nisi ac, porttitor lacinia mi. Donec eu consectetur justo, non vulputate ex.

                In nec tortor mi. Aenean facilisis dignissim nibh, sit amet posuere justo auctor sed. In mattis massa in elementum ullamcorper. Nulla purus augue, blandit id mattis quis, luctus faucibus lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum id suscipit quam, id auctor lectus. Nam eu lacinia eros. Curabitur ac dolor mi.

                Nulla facilisi. Cras fringilla vitae augue non consectetur. Cras ornare quis nibh ac hendrerit. Maecenas non lectus enim. Vestibulum eget nibh urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis malesuada metus, in vulputate metus. Maecenas fringilla tempor nisi id semper. Cras maximus porttitor maximus.

                Cras sit amet tristique elit. Donec porttitor blandit viverra. Sed lacinia nibh ut orci finibus mattis. Nulla nec magna nec dolor feugiat posuere quis non libero. Pellentesque a cursus est. Integer in ex vel mauris scelerisque rutrum. Curabitur commodo, velit vestibulum molestie cursus, magna enim ullamcorper eros, nec molestie felis tortor vitae elit. Maecenas ac erat et ipsum facilisis suscipit. Maecenas eros diam, fermentum sit amet finibus sed, egestas et lorem. Sed tincidunt sollicitudin nisl, eu imperdiet massa aliquet a. Aliquam accumsan nibh ac ex viverra efficitur. Nam dolor quam, molestie sollicitudin ante eget, feugiat malesuada nulla. Proin et ex commodo, lacinia sem nec, mattis enim. Integer efficitur tincidunt nibh eu auctor. Etiam sed eleifend tortor.

                Curabitur finibus mauris eget augue aliquam vestibulum. Vestibulum vehicula accumsan erat, ac gravida nisi molestie nec. Donec in quam lobortis, porta justo scelerisque, pulvinar arcu. Curabitur aliquam magna vitae placerat suscipit. Suspendisse iaculis mi magna. Fusce id elit in elit aliquet venenatis vel eu mauris. Duis et erat vitae eros elementum venenatis a eu dolor.

                Sed in odio pulvinar nibh efficitur mattis sit amet ultricies eros. Vivamus dui lectus, rutrum a leo vitae, blandit vestibulum nulla. Suspendisse tincidunt sem ut massa maximus, at pellentesque felis vulputate. Sed gravida dictum varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed commodo lacinia nulla et pulvinar. Suspendisse venenatis condimentum orci, id ullamcorper quam. Vivamus et lectus purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

                Suspendisse ac massa purus. Nunc sagittis diam sit amet nulla dictum, tincidunt dignissim odio rutrum. Proin porttitor vitae tellus quis tempor. Fusce hendrerit mi aliquam purus aliquam molestie. Sed sodales efficitur elit at consequat. Nunc placerat ipsum eu accumsan sodales. Pellentesque lobortis dui massa, feugiat pretium quam ornare sit amet. Donec sodales vestibulum magna eget fringilla. Duis diam quam, sodales sit amet quam in, blandit malesuada orci. Morbi tempor orci velit, maximus finibus felis mattis nec. Donec nec enim sed quam ultrices accumsan. Nullam fringilla odio diam, ut sodales elit auctor nec. Fusce dignissim blandit leo.


            </p>
        </div>


    </div>
    </br>
        <div class="contactbutton">
            <a href="/"><button class="bn632-hover bn25">Choix 1</button></a>
            <a href="/"><button class="bn632-hover bn25">Choix 2</button></a>
            <a href="/"><button class="bn632-hover bn25">Choix 3</button></a>
        </div>
        <div class="contactbutton">
            <button onclick="clickrandom()" class="bn632-hover-2 bn19">Hasard !</button>
        </div>

    </div>
</div>

<!-- Mettre la valeur prévue dans le paragraphe en paramètre de la fonction-->

<!-- Il faut mettre une valeur null ou inutilisé si on ne fait pas de random afin que je puisse faire un if / else -->
<script>
    function clickrandom(){
        var result ="<?php random(); ?>"
        document.write(result);
    }
</script>


<!-- Mettre la valeur dans le paragraphe au lieu du x -->
<?php function random($x){
    rand(0,$x);
    }
    ?>

<?php include("footer.php") ?>
