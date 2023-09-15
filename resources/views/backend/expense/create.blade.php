@extends('backend.layouts.app')
@pushOnce('customCss')
    <style>
        .selected {
            transition: all 200ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .selected.danger {
            background: var(--ct-danger) !important;
            color: var(--ct-white) !important;
        }

        .selected.success {
            background: var(--ct-success) !important;
            color: var(--ct-white) !important;
        }
    </style>
@endPushOnce

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Management', 'Expense', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Expense">
        <div class="container mt-3 mb-3">
            <div class="d-none">
                <table>
                    <tbody>
                        <tr id="item-template">
                            <td id="count">1</td>
                            <td>
                                <x-form.text-area class="" placehoder="Description"
                                    name="descriptions[]"></x-form.text-area>
                            </td>
                            <td>
                                <x-backend.form.text-input class="mb-3" type="text" placehoder="Amount"
                                    name="amounts[]" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <x-backend.ui.button type="custom" :href="route('expense.index')"
                class="btn-secondary btn-sm mb-1">Back</x-backend.ui.button>


            @isset($expense)
                <div class="container d-print-block" id="print-{{ $expense->id }}">
                    <table class="table table-responsive table-borderless">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="2">
                                    <div class="mb-2 fs-5">
                                        Category:
                                        <div>
                                            {{ $expense->category }}
                                        </div>


                                    </div>
                                    <div class="mb-2 fs-5">Date:
                                        <div>
                                            {{ $expense->date->format('Y-m-d') }}
                                        </div>
                                    </div>
                                    <div class="mb-3 fs-4">Merchant:
                                        <div>{{ $expense->merchant }}</div>
                                    </div>
                                </td>
                                <td>
                                    @if ($expense->type === 'credit')
                                        <img id="voucher-img" src="{{ asset('images/Credit-Voucher.png') }}"
                                            class="w-75 rounded rounded-3 float-end"
                                            style="max-width: 300px;height:70%;margin-top:-2rem;" alt="">
                                    @else
                                        <img id="voucher-img" src="{{ asset('images/Debit-Voucher.png') }}"
                                            class="w-75 rounded rounded-3 float-end"
                                            style="max-width: 300px;height:70%;margin-top:-2rem;" alt="">
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="3">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td class="bg-light">No.</td>
                                                <td class="bg-light" style="max-width: 35ch;">Description</td>
                                                <td class="bg-light" style="max-width: 35ch;">Amount</td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($expense->items as $index => $item)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $item->description ?? '' }}</td>
                                                    <td>৳ {{ $item->amount ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                            <tr style="border-bottom: 0px solid transparent;">
                                                <td colspan="2">
                                                    <div class="fs-4 float-end fw-bold">
                                                        Grand Total
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fs-4 fw-bold">
                                                        ৳
                                                        {{ $expense->balance < 0 ? $expense->balance * -1 : $expense->balance }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="border-bottom: 0px solid transparent;">
                                                <td colspan="3">
                                                    <x-backend.ui.button type="button"
                                                        data-page-title="Expense Voucher ({{ str($expense?->type)->headline() }})"
                                                        class="print-btn d-print-none btn-sm btn-info float-end"
                                                        data-target="#print-{{ $expense->id }}">Print</x-backend.ui.button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>



                </div>
                {{-- <form action="{{ route('expense.update', $expense->id) }}" method="POST"
                    class="row justify-content-center d-print-none">
                    @csrf
                    @method('patch')
                    <div class="col-md-6 col-xl-4">
                        <x-form.selectize class="mb-3" id="category" name="category" placeholder="Choose Category..."
                            label="Add Category">
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" @selected($expense->category === $category)>
                                    {{ $category }}</option>
                            @endforeach
                        </x-form.selectize>
                        <x-backend.form.text-input class="mb-3" type="date" label="Date" placehoder="Date"
                            :value="today()->format('Y-m-d')" name="date" :value="$expense->date->format('Y-m-d')" />

                        <x-form.selectize class="mb-3" id="merchant" name="merchant" placeholder="Choose Merchant..."
                            label="Add Merchant">
                            @foreach ($merchants as $merchant)
                                <option value="{{ $merchant }}" @selected($expense->merchant === $merchant)>
                                    {{ $merchant }}</option>
                            @endforeach
                        </x-form.selectize>
                        <div>
                            <label for="type" class="mb-1">Expense Type</label>
                            <div class="d-flex gap-2">
                                <div class="form-check mb-2 form-check-success p-0">
                                    <input class="form-check-input" type="radio" id="credit" name="type" value="credit"
                                        hidden @checked($expense->type === 'credit')>
                                    <label
                                        class="form-check-label px-2 py-1 border rounded {{ $expense->type === 'credit' ? 'selected success' : '' }}"
                                        for="credit">Credit</label>
                                </div>
                                <div class="form-check mb-2 form-check-danger p-0">
                                    <input class="form-check-input" type="radio" id="debit" name="type" value="debit"
                                        checked hidden @checked($expense->type === 'debit')>
                                    <label
                                        class="form-check-label px-2 py-1 border rounded {{ $expense->type === 'debit' ? 'selected danger' : '' }}"
                                        for="debit">Debit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-2">
                        @if ($expense->type === 'credit')
                            <img id="voucher-img" src="{{ asset('images/Credit-Voucher.png') }}"
                                class="w-75 rounded rounded-3 shadow" alt="">
                        @else
                            <img id="voucher-img" src="{{ asset('images/Debit-Voucher.png') }}"
                                class="w-75 rounded rounded-3 shadow" alt="">
                        @endif
                    </div>
                    <div class="row justify-content-center mt-3 px-0">


                        <div class="col-12 col-md-12 col-xl-8">
                            <table class="table table-responsive table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="item-repeater" data-count="1">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <x-form.text-area class="" placehoder="Description"
                                                name="descriptions[]"></x-form.text-area>
                                        </td>
                                        <td>
                                            <x-backend.form.text-input class="mb-3 amounts" type="text" placehoder="Amount"
                                                name="amounts[]" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex gap-2">
                                <div>
                                    <span data-container="#item-repeater" id="decrement-btn" role="button"
                                        class="mdi mdi-delete bg-soft-danger p-1 me-1 text-danger rounded-circle"></span>
                                    <span data-template="#item-template" data-container="#item-repeater" id="increment-btn"
                                        role="button"
                                        class="mdi mdi-plus bg-soft-success p-1 me-1 text-success rounded-circle"></span>
                                </div>
                                <div class="fw-bold fs-4 ms-auto mb-3">
                                    Grand Total: ৳ <span class="total">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xl-8">
                            <x-backend.ui.button class="btn-primary float-end">Submit</x-backend.ui.button>
                        </div>
                    </div>
                </form> --}}
            @else
                <form action="{{ route('expense.store') }}" method="POST" class="row justify-content-center">
                    @csrf
                    <div class="col-md-6 col-xl-4">
                        <x-form.selectize class="mb-3" id="category" name="category" placeholder="Choose Category..."
                            label="Add Category">
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">
                                    {{ $category }}</option>
                            @endforeach
                        </x-form.selectize>
                        <x-backend.form.text-input class="mb-3" type="date" label="Date" placehoder="Date"
                            :value="today()->format('Y-m-d')" name="date" />

                        <x-form.selectize class="mb-3" id="merchant" name="merchant" placeholder="Choose Merchant..."
                            label="Add Merchant">
                            @foreach ($merchants as $merchant)
                                <option value="{{ $merchant }}">
                                    {{ $merchant }}</option>
                            @endforeach
                        </x-form.selectize>
                        <div>
                            <label for="type" class="mb-1">Expense Type</label>
                            <div class="d-flex gap-2">
                                <div class="form-check mb-2 form-check-success p-0">
                                    <input class="form-check-input" type="radio" id="credit" name="type" value="credit"
                                        hidden>
                                    <label class="form-check-label px-2 py-1 border rounded" for="credit">Credit</label>
                                </div>
                                <div class="form-check mb-2 form-check-danger p-0">
                                    <input class="form-check-input" type="radio" id="debit" name="type" value="debit"
                                        checked hidden>
                                    <label class="form-check-label px-2 py-1 border rounded selected danger"
                                        for="debit">Debit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-2">
                        <img id="voucher-img" src="{{ asset('images/Debit-Voucher.png') }}"
                            class="w-100 h-100 w-xl-75 rounded rounded-3 float-end" style="max-width: 300px;" alt="">
                    </div>
                    <div class="row justify-content-center mt-3 px-0">


                        <div class="col-12 col-md-12 col-xl-8">
                            <table class="table table-responsive table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="item-repeater" data-count="1">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <x-form.text-area class="" placehoder="Description"
                                                name="descriptions[]"></x-form.text-area>
                                        </td>
                                        <td>
                                            <x-backend.form.text-input class="mb-3 amounts" type="text"
                                                placehoder="Amount" name="amounts[]" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex gap-2">
                                <div>
                                    <span data-container="#item-repeater" id="decrement-btn" role="button"
                                        class="mdi mdi-delete bg-soft-danger p-1 me-1 text-danger rounded-circle"></span>
                                    <span data-template="#item-template" data-container="#item-repeater" id="increment-btn"
                                        role="button"
                                        class="mdi mdi-plus bg-soft-success p-1 me-1 text-success rounded-circle"></span>
                                </div>
                                <div class="fw-bold fs-4 ms-auto mb-3">
                                    Grand Total: ৳ <span class="total">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xl-8">
                            <x-backend.ui.button class="btn-primary float-end">Submit</x-backend.ui.button>
                        </div>
                    </div>
                </form>
            @endisset
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script src="{{ asset('backend/assets/js/printThis.js') }}"></script>

        <script>
            $(document).ready(function() {
                let imgEl = $('#voucher-img');
                const images = [
                    "{{ asset('images/Credit-Voucher.png') }}",
                    "{{ asset('images/Debit-Voucher.png') }}"
                ];
                $('input[name="type"]').on('change', function(e) {
                    if (e.target.id === 'credit') {
                        $(this).next().addClass('selected success')
                        $('#debit').next().removeClass('selected danger')
                        imgEl.attr('src', images[0])
                    } else {
                        $(this).next().addClass('selected danger')
                        $('#credit').next().removeClass('selected success')
                        imgEl.attr('src', images[1])
                    }
                })
                $('input[name="amount"]').on('input', function(e) {
                    $('#total_amount').text(e.target.value)
                })

                let repeater = {
                    count: function(targetCount, action) {

                        return count;
                    },
                    template: (id) => {
                        let template = $(id).clone().removeClass('d-none')
                        template.find('[name="amounts[]"]').addClass('amounts')
                        return template
                    },
                    increment: function(e) {
                        let container = $(e.target.dataset.container)
                        let count = parseInt(container.attr('data-count'))
                        count++
                        container.attr('data-count', count)
                        let temp = this.template(e.target.dataset.template)
                        temp.find('#count').text(count)
                        container.append(temp)
                        calcTotal()
                    },
                    decrement: function(e) {
                        let container = $(e.target.dataset.container)
                        let count = parseInt(container.attr('data-count'))
                        if (count > 1) {
                            container.children().last().remove()
                            count--
                            container.attr('data-count', count)
                        }
                    }
                }

                $('#increment-btn').click(e => {
                    repeater.increment(e)
                })
                $('#decrement-btn').click(e => {
                    repeater.decrement(e)
                })

                function calcTotal() {
                    $('.amounts').on('input', e => {
                        let total = 0;
                        let amounts = document.querySelectorAll('.amounts')
                        amounts.forEach(element => {
                            let num = parseFloat(element.value)

                            total += num;
                        })
                        $('.total').text(total)
                    })
                }
                calcTotal()


            });
        </script>

        <script>
            $(document).ready(function() {
                $('.print-btn').on('click', function(e) {
                    $(e.target.dataset.target).printThis({
                        pageTitle: e.target.dataset.pageTitle,
                    })
                })
            });
        </script>
    @endpush
@endsection
