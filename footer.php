</div>
<script src="locomotive-scroll.min.js"></script>

<script src="js.js"></script>

<script>
    (function () {
        var scroll = new LocomotiveScroll();
    })();
    document.addEventListener('lazyloaded', function(){
        scroll.update()
    });


    let btn = document.getElementById("btn");
    btn.addEventListener("click",addField);


    function addField()
    {
        var div1=document.getElementById("parag");
        div1.innerHTML+='<div class="headingline2" ></div><div class="field padding-bottom--24"> <label for="action">Action</label> <input type="text" id="action" /> </div> <div class="field padding-bottom--24"> <label for="nbaction">Numero du paragraphe</label> <input type="text" id="nbaction" /> </div>';


        scroll.update();
    }
</script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });


</script>
</body>

</html>