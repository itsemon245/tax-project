@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Web Site', 'Settings']" />
    <x-backend.ui.section-card name="Web Site Settings">
        {{-- Select category option --}}
        {{-- {{ dd(json_decode($data[0]->reference)) }} --}}
        <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h4 class="p-2">Basic Setting</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <x-backend.form.image-input id="logo" :image="$data->basic->logo" required style="aspect-ratio:1.8/.7;" label="Company logo" name="logo"/>                                 
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <x-backend.form.text-input type="email" class="mb-2" required name="email" label="Company E-mail" />
                                            <x-backend.form.text-input type="phone" class="mb-2" required name="phone" label="Company Phone" />
                                            <x-backend.form.text-input type="phone" class="mb-2" required name="whatsapp" label="Company What's App" />
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-md-2" style="max-width: 50%;">
                                            <label for="favicon">
                                                    <span class="form-label text-capitalize">Favicon<span class="text-danger"> *</span></span>
                                                <input id="favicon" name="favicon" type="file" hidden>
                                                <img class="w-100 border border-2 border-primary rounded-circle" style="aspect-ratio:1/1;" id="live-favicon"
                                                    src="{{ asset('images/Placeholder_view_vector.svg.png') }}">
                                            </label>
                                            @error('favicon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-10">
                                            <label for="address" class="w-100">Address<span class="text-danger"> *</span>
                                                <textarea name="address" class="form-control" cols="30" placeholder="Type your company address..." rows="6"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                <div class="mt-2"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Save Change</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>

        {{-- Referance  --}}
        <form action="{{ route('setting.reference') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h4 class="p-2">Referance Setting</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-backend.form.text-input type="number" class="mb-2" required name="commission" label="Refer Commission" />
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input type="number" class="mb-2" required name="withdrawal" label="Withdrawal Limit" />
                                </div>
                                <div class="mt-2"><button class="btn btn-primary w-100 btn-sm profile-button"
                                type="submit">Save Change</button>
                                </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
        {{-- Payment  --}}
        <form action="{{ route('setting.payment') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h4 class="p-2">Payment Setting</h4>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div id="packacgeFeaturesInputs"></div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="icon-item mx-1 mt-3" style="cursor: pointer" onclick="addPackageFeature()"
                                        title="Add Package Feature">
                                        <i data-feather="plus-square" class="icon-dual"></i>
                                    </div>
                                    <div id="removePackageFeatureBtn" class="icon-item mx-1 mt-3" style="cursor: pointer"
                                        onclick="removePackageFeature()" title="Add Package Feature">
                                        <i data-feather="minus-square" class="icon-dual"></i>
                                    </div>
                                </div>
                                <div class="mt-2"><button class="btn btn-primary w-100 btn-sm profile-button"
                                    type="submit">Save Change</button>
                                </div>
                            </div>
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    @push('customJs')
        <script>
                $(document).ready(function() {  
                const input = $('#favicon')
                input.on('input', e => {
                    const image = $('#live-'+e.target.id)
                    const url = URL.createObjectURL(e.target.files[0])
                    image.attr('src', url)
                })
                });
        </script>
                <script>
                    let itemCount = 0;
                    const featureLength = () => {
                        $('#packacgeFeaturesInputs').children().length < 2 ?
                            $("#removePackageFeatureBtn").addClass('d-none') :
                            $("#removePackageFeatureBtn").removeClass('d-none')
                    }
        
                    const addPackageFeature = () => {
                        itemCount++
                        const inputs = `
                        <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="mt-1">
                                    <x-backend.form.text-input type="text" name="payment_methods[]" label="Pay Method" required />
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="mt-1">
                                    <x-backend.form.text-input type="text" name="accounts[]" label="Account No."  required />
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    `
                        $('#packacgeFeaturesInputs').append(inputs)
                        const imageInputs = $('.custom-input')
                        imageInputs.each((i, input) => {
                            input.addEventListener('change', e => {
                                const image = document.querySelector('#live-'+e.target.dataset.index)
                                const url = URL.createObjectURL(e.target.files[0])
                                image.src = url
                            })
                        })
        
        
                        featureLength()
                    }
                    addPackageFeature()
        
                    const removePackageFeature = () => {
                        itemCount--
                        $("#packacgeFeaturesInputs").find(".row:last").remove()
                        featureLength()
                    }
                </script>
    @endpush
@endsection
