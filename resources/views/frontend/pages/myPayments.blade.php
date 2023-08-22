@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <h3 class="p-4 text-center text-muted" >My Courses:</h3>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="table-responsive">
                    <x-backend.table.basic>
                        <thead class="table-light">
                            <tr>
                                <th class="">No</th>
                                <th class="">Name</th>
                                <th class="">Price</th>
                                <th class="">Trainer</th>
                                <th class="" style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $key => $course)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
        
                                        <a href="{{route('video.byCourse', $course->id)}}" class="d-flex align-items-start gap-2 text-reset">
                                            <div>
                                                <span data-feather="folder" class="icon-dual"></span>
                                            </div>
                                            <div>
                                                <div class="fw-medium">{{ $course->name }}</div>
                                                <div>{{ $course->videos()->count() }} Videos</div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $course->price }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-start gap-2">
                                            <div>
                                                <img src="{{asset('backend/assets/images/users/user-1.jpg')}}" class="rounded rounded-circle" width="48px" height="48px" alt="">
                                            </div>
                                            <div>
                                                <div class="fw-medium">
                                                    <a href="javascript: void(0);" class="text-reset">{{ fake()->name('female') }}</a>
                                                </div>
                                                <span>{{fake()->jobTitle()}}</span>
                                            </div>
                                        </div>
                                    </td>
        
        
                                    <td>
                                        <div>
                                            <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark "
                                                href="#">
                                                Preview
                                            </x-backend.ui.button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-8">
                                                <img src="{{ asset('frontend/assets/images/no_data.jpg') }}" style="height:100vh;" class="img-fluid p-5" alt="Responsive image">
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                </tr>
                                @endforelse
                            </tbody>
                     </x-backend.table.basic>
                </div>
            </div>
        </div>
    </div>
@endsection

