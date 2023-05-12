@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Promo Code', 'View']" />

    <x-backend.ui.section-card name="Promo Code List">
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Promo Code</th>
                    <th>User Type</th>
                    <th>Partner/User</th>
                    <th>Limit</th>
                    <th>Expired</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promos as $key => $promo)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $promo->code }}</td>
                        <td>{{ strtoupper($promo->user_type) }}</td>
                        <td>{{ $promo->user ? strtoupper($promo->user->name) : 'ALL' }}</td>
                        <td>{{ $promo->limit }}</td>
                        <td>{{ date('d-m-Y', strtotime($promo->expired_at)) }}</td>
                        <td>
                            <a href="{{ route('promo-code.edit', $promo) }}" class="btn btn-info btn-sm">Edit</a>
                            <button onclick='deletePromo("promoDelete-{{ $promo->id }}")'
                                class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                            <form action="{{ route('promo-code.destroy', $promo->id) }}" id="promoDelete-{{ $promo->id }}"
                                method="post" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        const deletePromo = id => {
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
                    Swal.fire({
                        title: 'Deleted',
                        text: "Your file has been deleted.",
                        icon: 'success',
                        showConfirmButton: false
                    })
                    $("#" + id).submit()
                }
            })
        }
    </script>
@endpush
