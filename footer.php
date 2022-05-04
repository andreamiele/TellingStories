


            </div>
        </div>
    </div>
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