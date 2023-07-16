@extends('frontend.layouts.app')
@section('main')
<div class="container row">
    <div class="col-md-12">
        <h3 class="py-2 px-2">Welcome to Our Video course</h3>
    </div>
    <div class="col-md-9 border">
        <div class="p-2 ratio ratio-16x9">
            <iframe width="100%" src="https://i.ytimg.com/vi/DU2j4k2RcEw/hqdefault.jpg?sqp=-oaymwEcCOADEI4CSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBz60Xuwz2QWF-yPZU8qwjnFDzdqA" title="YouTube video" allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-md-3 border p-2 ">
        <div class="row card">
            <div class="col-md-12">
                <h4 class="py-2 px-2">All Videos</h4>
                <x-backend.table.basic>
                    <tbody class="card-body">
                            <tr>
                                <td><img src="{{ asset('frontend/assets/images/attached-files/img-2.jpg') }}" alt=""
                                        width="80px" loading="lazy"></td>
                                <td class="d-flex flex-column">Lorem, ipsum dolor.this
                                    <span><small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small></span>
                                </td>
                            </tr>
                    </tbody>
                </x-backend.table.basic>
            </div>
        </div>
    </div>
</div>
@endsection
