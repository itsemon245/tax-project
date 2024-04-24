<div class="preloader"
    style="
position: relative;
z-index: 99999!important;
background-color: #38BDF8;
width: 100vw;
height: 100vh;
">
    <div class="pl">
        <div class="pl__bars">
            <div class="pl__bar">
                <div class="pl__bar-s"></div>
                <div class="pl__bar-t"></div>
                <div class="pl__bar-l"></div>
                <div class="pl__bar-r"></div>
            </div>
            <div class="pl__bar">
                <div class="pl__bar-s"></div>
                <div class="pl__bar-t"></div>
                <div class="pl__bar-l"></div>
                <div class="pl__bar-r"></div>
            </div>
            <div class="pl__bar">
                <div class="pl__bar-s"></div>
                <div class="pl__bar-t"></div>
                <div class="pl__bar-l"></div>
                <div class="pl__bar-r"></div>
            </div>
            <div class="pl__bar">
                <div class="pl__bar-s"></div>
                <div class="pl__bar-t"></div>
                <div class="pl__bar-l"></div>
                <div class="pl__bar-r"></div>
            </div>
        </div>
    </div>
</div>

@push('customJs')
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.preloader').fadeOut('slow', function() {
                    $('.preloader').css('display', 'none!important');
                    $('body').css('overflow', 'auto');
                    $('body').css('height', 'auto');
                });
            }, 700);
        })
    </script>
@endpush
