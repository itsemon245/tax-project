@stack('customJs')
{{-- vendor JS  --}}
<script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
{{-- app JS  --}}
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>

<script>
    const navLinks = document.querySelectorAll('.custom-nav-item');
    const activeLink = document.querySelector('.active-link');
    const menuBtn = $('.menu-btn')
    const menuCloseBtn = $('.menu-close-btn')

    console.log(menuCloseBtn);
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', (e) => {
            activeLink.classList.remove('active-link')
        })
        link.addEventListener('mouseleave', (e) => {
            setTimeout(activeLink.classList.add('active-link'), 400);
        })
    });

    $.each(menuBtn, (index, btn) => {
        btn.addEventListener('click', e => {
            const sidebar = $('.' + btn.id)
            toggleSidebar(sidebar)
        })
    });
    $.each(menuCloseBtn, (index, btn) => {
        btn.addEventListener('click', e => {
            const sidebar = $('.' + btn.id)
            toggleSidebar(sidebar)
        })
    });

    function toggleSidebar(sidebar) {
        const transformValue = parseInt(sidebar.css('transform').split(' ')[4])
        if (transformValue === 0) {
            console.log('sidebar hide');
            sidebar.css('transform', `translateX(-${sidebar.css('width')})`)
            $('main').css('transform', `translateX(0px)`)
        } else {
            console.log('sidebar show');
            sidebar.css('transform', `translateX(0px)`)
            $('main').css('transform', `translateX(${sidebar.css('width')})`)
        }
    }
</script>
