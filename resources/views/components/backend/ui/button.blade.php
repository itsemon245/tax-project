<button
    {{ $attributes->merge(['class' => 'btn waves-effect waves-light text-uppercase'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>
    {{ $slot }}
</button>
