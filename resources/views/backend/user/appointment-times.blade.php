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
            dates: JSON.parse('{{ json_encode($dates) }}'),
            action(time) {
                let url = '{{ route('user-appointments.time.delete', 'TIME') }}';
                url = url.replace('TIME', time);
                return url;
            }
        }">

        <form action="{{ route('user-appointments.times.update') }}" method="post" class="my-3">
            @csrf
            <div class="d-flex justify-content-end">
                <x-backend.ui.button class="btn-primary">Update</x-backend.ui.button>
            </div>
            <template x-for="(times, day) in dates" :key="day">
                <div>
                    <h4 class="text-center" x-text="day"></h4>
                    <input type="hidden" name="days[]" :value="day">
                    <div class="row" x-ref="container">
                        <template x-for="(time, index) in times" :key="index">
                            <div class="time col-md-6 col-lg-4 d-flex align-items-end w-full gap-2">
                                <div class="w-full flex-grow-1">
                                    <label class="">Time</label>
                                    <input class="w-full form-control px-3 py-2 border-focus-2" label="Time"
                                        type="time" :name="`times[${day}][]`" :value="time" />
                                </div>
                                <form :action="action(day, index)" method="post">
                                    @csrf
                                    @method('delete')
                                    <button :type="'submit'" @click.prevent="times.splice(index, 1)"
                                        class="icon-item mx-1 bg-transparent border-0" role="button" title="Remove Time">
                                        <span
                                            class="mdi mdi-delete text-danger bg-soft-danger px-1 py-1 rounded rounded-circle"></span>
                                    </button>
                                </form>
                            </div>
                        </template>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="icon-item mx-1 mt-3" @click="dates[day].push('')" style="cursor: pointer"
                            title="Add new time">
                            <span class="mdi mdi-plus text-success bg-soft-success px-1 py-1 rounded rounded-circle"></span>
                        </div>
                    </div>
                </div>
            </template>
            <div class="d-flex justify-content-end">
                <x-backend.ui.button class="btn-primary">Update</x-backend.ui.button>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
@push('customJs')
    <script src="https://unpkg.com/htmx.org@1.9.12"
        integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous">
    </script>
@endpush
