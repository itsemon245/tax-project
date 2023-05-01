@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Create']" />
                </div>
                <a href="{{ route('product.create') }}" class="mt-3 btn btn-primary waves-effect waves-light profile-button">
                    Create Product
                </a>
                <h4 class="page-title">View Products</h4>
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
                            {{-- @foreach ($heros as $key => $hero)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img src="{{ useImage($hero->image_url) }}" alt="{{ $hero->title }}"
                                            width="80px"></td>
                                    <td>{{ Str::limit($hero->title, 20, '...') }}</td>
                                    <td>{{ Str::limit($hero->sub_title, 20, '...') }}</td>
                                    <td>{{ $hero->button }}</td>
                                    <td>Action</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
