@stack('customJs')
{{-- vendor JS  --}}
<script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
{{-- app JS  --}}
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>

<script>
    const navLinks = document.querySelectorAll('.custom-nav-item');
    const activeLink = document.querySelector('.active-link');
    const menuBtn = document.querySelector('.menu-btn');
    const menuCloseBtn = document.querySelector('.menu-close-btn');
    const sidebar = document.querySelector('.sidebar');

    navLinks.forEach(link => {
        link.addEventListener('mouseenter', (e) => {
            activeLink.classList.remove('active-link')
        })
        link.addEventListener('mouseleave', (e) => {
            setTimeout(activeLink.classList.add('active-link'), 400);
        })
    });

    menuBtn.addEventListener('click', e => {
        sidebar.classList.toggle('sidebar-show')
    })
    menuCloseBtn.addEventListener('click', e => {
        sidebar.classList.toggle('sidebar-show')
    })
</script>
