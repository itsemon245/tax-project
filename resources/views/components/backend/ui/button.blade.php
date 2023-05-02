<button
    {{ $attributes->merge(['class' => 'btn waves-effect waves-light mt-3 text-uppercase'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>
    {{ $slot }}
</button>
