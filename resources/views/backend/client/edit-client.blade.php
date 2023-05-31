@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Client', 'Create']" />

    <x-backend.ui.section-card name="Client Section">

        <form action="{{ route('client.update', $client->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Client Name" required type="text" name="client_name"
                        value="  {{ $client->client_name }}" />

                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Father's Name" required type="text" name="father_name"
                        value="  {{ $client->father_name }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="mother's Name" required type="text" name="mother_name"
                        value="  {{ $client->mother_name }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Company Name" required type="text" name="company_name"
                        value="  {{ $client->company_name }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Husband's/Wife's Name" required type="text"
                        name="husband_wife_name" value="  {{ $client->husband_wife_name }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Present Address" required type="text" name="present_address"
                        value="  {{ $client->present_address }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Parmentat Address" required type="text" name="parmentat_address"
                        value="  {{ $client->parmentat_address }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Tin" required type="text" name="tin"
                        value="  {{ $client->tin }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Circle" required type="text" name="circle"
                        value="  {{ $client->circle }}" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Zone" required type="text" name="zone"
                        value="  {{ $client->zone }}" />
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
