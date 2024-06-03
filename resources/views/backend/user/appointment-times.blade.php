@extends('backend.layouts.app')

@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['User', request('type') == 'consultation' ? 'Consultations' : 'Appointments', 'Times']" />

    <x-backend.ui.section-card name="User {{ request('type') == 'consultation' ? 'Consultation' : 'Appointment' }} Times"
        x-data="{
            times: JSON.parse('{{ $times }}'),
            action(time) {
                let url = '{{ route('user-appointments.time.delete', 'TIME') }}';
                url = url.replace('TIME', time);
                return url;
            }
        }">

        <form action="{{ route('user-appointments.times.update') }}" method="post" class="my-3">
            @csrf
            <div class="row" x-ref="container">
                {{-- @foreach ($times as $time)
                    <div class="time col-md-6 col-lg-4 d-flex align-items-center gap-2">
                        <x-backend.form.text-input label="Time" type="time" name="times[]" :value="$time->time">
                        </x-backend.form.text-input>
                        <form action="{{ route('user-appointments.time.delete', $time) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="icon-item mx-1 bg-transparent border-0" role="button" title="Remove Time">
                                <span
                                    class="mdi mdi-delete text-danger bg-soft-danger px-1 py-1 rounded rounded-circle"></span>
                            </button>
                        </form>
                    </div>
                @endforeach --}}
                <template x-for="time in times">
                    <div class="time col-md-6 col-lg-4 d-flex align-items-center gap-2">
                        <x-backend.form.text-input label="Time" type="time" name="times[]" ::value="time.time">
                        </x-backend.form.text-input>
                        <form :action="time.id != undefined ? action(time.id) : '#'" method="post">
                            @csrf
                            @method('delete')
                            <button :type="time.id != undefined ? 'submit' : 'button'"
                                @click="console.log(time, times);if($el.type == 'button') times.splice(time, 1)"
                                class="icon-item mx-1 bg-transparent border-0" role="button" title="Remove Time">
                                <span
                                    class="mdi mdi-delete text-danger bg-soft-danger px-1 py-1 rounded rounded-circle"></span>
                            </button>
                        </form>
                    </div>
                </template>
            </div>
            <div class="d-flex justify-content-center">
                <div class="icon-item mx-1 mt-3"
                    x-on:click="let item = times.length > 1 ? (times.length - 1) : times.length;times.push(item);"
                    style="cursor: pointer" title="Add new time">
                    <span class="mdi mdi-plus text-success bg-soft-success px-1 py-1 rounded rounded-circle"></span>
                </div>
            </div>
            <x-backend.ui.button class="btn-primary">Update</x-backend.ui.button>
        </form>
    </x-backend.ui.section-card>
@endsection
@push('customJs')
    <script src="https://unpkg.com/htmx.org@1.9.12"
        integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous">
    </script>
@endpush
