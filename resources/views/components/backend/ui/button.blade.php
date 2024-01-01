    @props([
    'type' => 'submit',
    'action' => '',
])
@php
    // $action = $attributes->has('action') ? $attributes->get('action') : null;
@endphp
@switch(str($type)->lower())
    @case('submit')
        <button
            {{ $attributes->merge(['class' => 'btn rounded rounded-2 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</button>
    @break

    @case('button')
        <button
            {{ $attributes->merge(['class' => 'btn rounded rounded-2 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</button>
    @break

    @case('edit')
        <a
            {{ $attributes->merge(['class' => 'btn rounded rounded-2 btn-info waves-effect waves-light   '])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>Edit</a>
    @break

    @case('custom')
        <a
            {{ $attributes->merge(['class' => 'btn rounded rounded-2 waves-effect waves-light'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>{{ $slot }}</a>
    @break

    @case('delete')
        <form action="{{ $action }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button
                {{ $attributes->merge(['class' => 'btn rounded rounded-2 btn-danger waves-effect waves-light swal-delete-btn'])->merge(['style' => $attributes->prepends('font-weight:500;')]) }}>Delete</button>
        </form>
    @break

    @default
    @break
@endswitch

@push('customJs')
    <script>
        $('.swal-delete-btn').click(e => {
            e.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(e.target).parent().submit()
                }
            })
        })
    </script>
@endpush
