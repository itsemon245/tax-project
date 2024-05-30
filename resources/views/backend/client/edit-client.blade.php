@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Client', 'Edit']" />

    <x-backend.ui.section-card name="Edit Client">

        <x-backend.ui.button type="custom" href="{{ route('client.index') }}"
            class="btn-sm btn-info fw-bold mb-2">Back</x-backend.ui.button>

        <form action="{{ route('client.update', $client) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Client Name" required type="text" name="name" :value="$client->name">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Client NID" type="number" name="nid" :value="$client->nid" required>
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Tin" type="text" name="tin" :value="$client->tin" required>
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Date Of Birth" type="date" name="dob"
                        :value="$client->dob" required>
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Phone" type="text" name="phone" :value="$client->phone" >
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Email" type="text" name="email" :value="$client->email">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Taxpayer Status" type="text" name="taxpayer_status"
                        :value="$client->taxpayer_status" required>
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Father's Name" type="text" name="father_name"
                        :value="$client->father_name" required>
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Mother's Name" type="text" name="mother_name"
                        :value="$client->mother_name" required>
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Company Name" type="text" name="company_name"
                        :value="$client->company_name" required>
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Nature Of Business" type="text" name="nature_of_business"
                        :value="$client->nature_of_business" required>
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Spouse Name" type="text" name="spouse_name" :value="$client->spouse_name">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-6">
                    <x-backend.form.text-input label="Spouse TIN" type="number" name="spouse_tin" :value="$client->spouse_tin">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Zone" type="text" name="zone" :value="$client->zone" required>
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Ref. No." required type="text" name="ref_no" :value="$client->ref_no">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-4 col-sm-4">
                    <x-backend.form.text-input label="Circle" type="text" name="circle" :value="$client->circle" required>
                    </x-backend.form.text-input>
                </div>



                <div class="col-md-6 col-lg-4">
                    <x-form.ck-editor id="special-benefits" label="Special Benefits" type="text" name="special_benefits">
                        {!! $client->special_benefits !!}
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6 col-lg-4">
                    <x-form.text-area label="Permanent Address" type="text" name="permanent_address" required>
                        {!! $client->permanent_address !!}
                    </x-form.text-area>
                </div>

                <div class="col-md-6 col-lg-4">
                    <x-form.text-area label="Present Address" type="text" name="present_address" required>
                        {!! $client->present_address !!}
                    </x-form.text-area>
                </div>

                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Update</x-backend.ui.button>
                </div>

            </div>

        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
