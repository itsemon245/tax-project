@extends('frontend.layouts.app')
@section('main')
    <style>
        .check-active {
            background: var(--bs-primary);
            color: var(--dark);
        }

        .form-check-label {
            transition: all 150ms ease-in-out;
        }

        .table> :not(caption)>*>* {
            background: transparent;
        }
    </style>
    <section class="my-5 container">
        <div class="card bg-soft-success border-success shadow-success">
            <div class="card-body" style="max-width: max-content;margin:0 auto;">
                <div class="text-success text-center fw-bold fs-5 p-3 rounded-3">
                    <div class="mdi mdi-check-decagram fs-1"></div>
                    <div class="text-center">Showing results based on your inputs:</div>
                    {{-- <p class="text-center fow-bld fs-4">Tax : {{ $result->tax }}৳</p> --}}
                    <table class="table table-auto bg-transparent text-green-500">
                        <tbody>
                            @php
                                $actualTax = 0;
                            @endphp
                            @foreach ($result->data as $key => $items)
                                <tr class="">
                                    <td class="border-2 !border-green-500">
                                        <div class="flex justify-between">
                                            <div class="capitalize px-4 font-bold text-start">{{ $key }}</div>
                                            @if (!is_object($items))
                                                <div class="border-l-2 !border-green-500 px-4 font-bold">
                                                    {!! $items !!}
                                                </div>
                                            @endif
                                        </div>
                                        @if (is_object($items))
                                            <table class="table table-auto border">
                                                @foreach ($items as $text => $amount)
                                                    @php
                                                        if (str($text)->contains('Actual Tax')) {
                                                            $actualTax = $amount;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td
                                                            class="border-2 !border-green-500 px-4 py-2 {{ str($text)->contains('*') ? 'font-bold' : '' }}">
                                                            {!! $text !!}</td>
                                                        <td
                                                            class="border-2 !border-green-500 px-4 py-2 {{ str($text)->contains('*') ? 'font-bold' : '' }}">
                                                            {!! str($text)->contains('Actual Tax') ? currencyFormat($amount) : $amount !!}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center fw-bold fs-3 my-0">Others : @if (!$result->others)
                            <span class="fw-medium">
                                No others taxes
                            </span>
                        @endif
                    <ul class="list-unstyled mb-0">
                        @foreach ($result->others as $key => $value)
                            <li>
                                <span class="fw-medium">{{ $key }} : </span>
                                <span class="fw-medium">{{ $value }} ৳</span>
                            </li>
                        @endforeach
                    </ul>
                    </p>
                    <div class=" {{ $apply == true ? '' : 'd-flex justify-content-around' }}">
                        <x-backend.ui.button type="custom" :href="route('tax.calculator')" class="btn-sm btn-info">Calculate
                            again</x-backend.ui.button>
                        <form action="{{ route('tax.calculate') . '?apply=true&result_id=' . $result->id }}" method="post">
                            @csrf
                            <x-backend.ui.button type="submit"
                                class="btn-sm btn-success {{ $apply == true ? 'd-none' : '' }} ">Apply for
                                service</x-backend.ui.button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end row-->
@endsection
