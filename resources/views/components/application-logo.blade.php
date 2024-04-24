<a href="{{ route('home') }}" class="">
    <img class="application-logo" loading="lazy" src="{{ useImage(app('setting')->basic->logo) }}"
        alt="{{ config('app.name') }} - Logo">
</a>

<style>
    .application-logo {
        object-fit: cover;
        width: 50px;
        height: 50px;
    }

    @media (min-width: 576px) {
        .application-logo {
            height: 65px;
            width: 65px;
        }
    }
</style>
