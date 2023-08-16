@props([
    'type' => 'submit',
    'action' => '',
])
@switch(str($type)->lower())
    @case('submit')
        <button
            {{ $attributes->merge(['class' => 'btn rounded rounded-3 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</button>
    @break

    @case('button')
        <button
            {{ $attributes->merge(['class' => 'btn rounded rounded-3 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</button>
    @break

    @case('edit')
        <a
            {{ $attributes->merge(['class' => 'btn rounded rounded-3 btn-info waves-effect waves-light   '])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>Edit</a>
    @break

    @case('custom')
        <a
            {{ $attributes->merge(['class' => 'btn rounded rounded-3 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</a>
    @break

    @case('delete')
        <form action="{{ $action }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button
                {{ $attributes->merge(['class' => 'btn rounded rounded-3 btn-danger waves-effect waves-light '])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>Delete</button>
        </form>
    @break

    @default
    @break
@endswitch
