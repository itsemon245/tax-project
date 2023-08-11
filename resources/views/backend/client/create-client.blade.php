@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Client', 'Create']" />

    <x-backend.ui.section-card name="Client Section">

        <form action="{{ route('client.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Client Name" required type="text" name="client_name">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Phone" required type="text" name="phone">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Father's Name" required type="text" name="father_name">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Mother's Name" required type="text" name="mother_name">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Company Name" required type="text" name="company_name">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Husband's/Wife's Name" required type="text"
                        name="husband_wife_name">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Zone" required type="text" name="zone">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Circle" required type="text" name="circle">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Tin" required type="text" name="tin">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-6">
                    <x-form.text-area label="Parmanent Address" required type="text" name="parmentat_address">
                    </x-form.text-area>
                </div>

                <div class="col-md-6">
                    <x-form.text-area label="Present Address" required type="text" name="present_address">
                    </x-form.text-area>
                </div>

                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>

            </div>

        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
