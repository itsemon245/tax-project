@extends('backend.layouts.app')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Hero Section</li>
                        <li class="breadcrumb-item active">View Hero Section</li>
                    </ol>
                </div>
                <h4 class="page-title">Hero Section</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hero Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Button Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($banners as $key => $banner)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img src="{{ useImage($banner->image_url) }}" alt="{{ $banner->title }}"
                                            width="80px"></td>
                                    <td>{{ Str::limit($banner->title, 20, '...') }}</td>
                                    <td>{{ Str::limit($banner->sub_title, 20, '...') }}</td>
                                    <td>{{ $banner->button }}</td>
                                    <td>
                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm hero-delete">Delete</button>
                                        <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        </form>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    @push('customJs')
        <script>
            var heroDelete = $('.hero-delete');
            heroDelete.on('click', function() {
                var form= $(this).next('form')
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
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit()
                    }
                })
            })
        </script>
    @endpush
@endsection
