@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Tax Calculator', 'Create Settings']" />

    <x-backend.ui.section-card name="Add New Settings">
        <div class="container">
            <x-btn-back></x-btn-back>
            {{-- Slot template --}}
            <div class="row border rounded p-1 mb-2 d-none" id="slot">
                <h5 class="fw-medium mb-1">Slot <span class="slot-count"></span></h5>
                <div class="col-lg-3">
                    <x-backend.form.text-input type="number" name="slot_from[]" placeholder="From" label="From" />
                </div>
                <div class="col-lg-3">
                    <x-backend.form.text-input type="number" name="slot_to[]" placeholder="To" label="To" />
                </div>
                <div class="col-lg-2">
                    <x-backend.form.text-input type="number" name="slot_percentage[]" placeholder="Percentage"
                        label="Percentage(%)" />
                </div>
                <div class="col-lg-4">
                    <x-backend.form.select-input name="slot_types[]" id="slot-type" label="Slot Type"
                        placeholder="Select an option">
                        <option value="income">Income</option>
                        <option value="turnover">Turnover</option>
                        <option value="asset">Asset</option>
                    </x-backend.form.select-input>
                </div>
                <div class="row services d-none">
                    <div class="service-wrapper">
                        {{-- service-template --}}
                        <input type="hidden" value="1" id="service-count">
                        <input type="hidden" value="1" id="last-service-count">
                        <div class="row" id="service">
                            <div class="col-6 p-1">
                                <x-backend.form.text-input id="service-name" name="slot_1_services[]"
                                    placeholder="Service Name" label="Service Name 1" disabled />
                            </div>
                            <div class="col-6 p-1">
                                <div class="mb-2">
                                    <label class="form-label mb-0 p-0 col-12">Amount <span
                                            class="service-count">1</span></label>
                                    <div class="d-flex align-items-center justify-content-center border shadow-sm rounded"
                                        style="overflow: hidden;">
                                        <input type="checkbox" checked id="is-discount" name="slot_1_is_discounts[]" hidden
                                            disabled>
                                        <input type="number" id="discount-amount" name="slot_1_discount_amounts[]"
                                            class="amount border-0 rounded-0 w-100 ps-2" style="outline:transparent;"
                                            placeholder="0" aria-label="Discunt" disabled>


                                        <span id="slot-1-service-discount-icon-1"
                                            style="padding-top:.25rem;padding-bottom:0.25rem;"
                                            class="mdi mdi-percent-outline bg-light px-xxl-3 px-2 text-success font-18"></span>


                                        <span onclick="service.discount.toggle(this)"
                                            style="padding-top:.25rem;padding-bottom:0.25rem;"
                                            class="mdi mdi-swap-horizontal bg-blue px-xxl-3 px-2  text-white font-18"
                                            style="cursor: pointer;"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <span role="button" onclick="service.increment(event)"
                            class="mdi mdi-plus text-info bg-soft-info rounded rounded-circle px-1"></span>
                        <span role="button" onclick="service.decrement(event)"
                            class="mdi mdi-delete text-danger bg-soft-danger rounded rounded-circle px-1"></span>
                    </div>
                </div>


            </div>
            <form action="{{ route('tax-setting.store') }}" class="row" method="post">
                @csrf
                <div class="col-12">
                    <h4 class="text-center fw-bold">Tax Informations</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <x-backend.form.text-input name="name" placeholder="Name" label="Name" />
                        </div>
                        <div class="col-md-3">
                            <x-backend.form.select-input name="for" id="for" label="Tax For"
                                placeholder="Select an option">
                                <option value="individual" selected>Individual</option>
                                <option value="firm">Firm</option>
                                <option value="company">Company</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-3">
                            <x-backend.form.select-input name="type" id="type" label="Tax Type"
                                placeholder="Select an option">
                                <option value="tax" selected>Tax</option>
                                <option value="others">Others</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-3">
                            <x-backend.form.text-input type="number" name="min_tax" placeholder="Min. Tax"
                                label="Min. Tax" />
                        </div>
                    </div>
                    <div class="row only-company d-none">
                        <div class="col-md-4">
                            <x-backend.form.text-input type='number' name="turnover_percentage"
                                placeholder="Percentage For Turnover" label="Percentage For Turnover(%)" disabled />
                        </div>
                        <div class="col-md-4">
                            <x-backend.form.text-input type='number' name="income_percentage"
                                placeholder="Percentage For Income" label="Percentage For Income(%)" disabled />
                        </div>
                        <div class="col-md-4">
                            <x-backend.form.text-input type='number' name="asset_percentage"
                                placeholder="Percentage For Asset" label="Percentage For Asset(%)" disabled />
                        </div>
                    </div>


                    <div class="row only-individual">
                        <div class="col-md-6">
                            <x-backend.form.text-input type="number" name="tax_free_male" placeholder="Tax Free Male"
                                label="Tax Free Male(৳)" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input type="number" name="tax_free_female"
                                placeholder="Tax Free Female" label="Tax Free Female(৳)" />
                        </div>
                    </div>
                    <div class="row not-individual d-none">
                        <x-backend.form.text-input type="number" name="tax_free" placeholder="Tax Free"
                            label="Tax Free(৳)" />
                    </div>

                </div>
                <div class="col-12 mb-2 slots-container">
                    <h4 class="text-center fw-bold">Slots</h4>
                    <div id="slot-wrapper" class="mb-2">
                        <div class="row border rounded p-1 mb-2" id="slot-1">
                            <div class="d-none slot-count">1</div>
                            <h5 class="fw-medium mb-1">Slot 1</h5>
                            <div class="col-md-3">
                                <x-backend.form.text-input type="number" name="slot_from[]" placeholder="Range From"
                                    label="Range From" />
                            </div>
                            <div class="col-md-3">
                                <x-backend.form.text-input type="number" name="slot_to[]" placeholder="Rage To"
                                    label="Rage To" />
                            </div>
                            <div class="col-md-2">
                                <x-backend.form.text-input type="number" name="slot_percentage[]"
                                    placeholder="Percentage" label="Percentage(%)" />
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.select-input name="slot_types[]" id="slot-type" label="Slot Type"
                                    placeholder="Select an option">
                                    <option value="income">Income</option>
                                    <option value="turnover">Turnover</option>
                                    <option value="asset">Asset</option>
                                </x-backend.form.select-input>
                            </div>
                            <div class="row d-none services">
                                <div class="service-wrapper">
                                    <input type="hidden" value="1" id="service-count">
                                    <input type="hidden" value="1" id="last-service-count">


                                    <div class="row">
                                        <div class="col-6 p-1">
                                            <x-backend.form.text-input id="service-name" name="slot_1_services[]"
                                                placeholder="Service Name" label="Service Name 1" disabled />
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="mb-2">
                                                <label class="form-label mb-0 p-0 col-12">Amount 1</label>
                                                <div class="d-flex align-items-center justify-content-center border shadow-sm rounded"
                                                    style="overflow: hidden;">
                                                    <input type="checkbox" checked id="is-discount"
                                                        name="slot_1_is_discounts[]" disabled hidden>
                                                    <input type="number" id="discount-amount"
                                                        name="slot_1_discount_amounts[]"
                                                        class="amount border-0 rounded-0 w-100 ps-2"
                                                        style="outline:transparent;" placeholder="0" aria-label="Discunt"
                                                        disabled>


                                                    <span id="slot-1-service-discount-icon-1"
                                                        style="padding-top:.25rem;padding-bottom:0.25rem;"
                                                        class="mdi mdi-percent-outline bg-light px-xxl-3 px-2 text-success font-18"></span>


                                                    <span onclick="service.discount.toggle(this)"
                                                        style="padding-top:.25rem;padding-bottom:0.25rem;"
                                                        class="mdi mdi-swap-horizontal bg-blue px-xxl-3 px-2  text-white font-18"
                                                        style="cursor: pointer;"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-2 mb-2">
                                    <span role="button" onclick="service.increment(event)"
                                        class="mdi mdi-plus text-info bg-soft-info rounded rounded-circle px-1"></span>
                                    <span role="button" onclick="service.decrement(event)"
                                        class="mdi mdi-delete text-danger bg-soft-danger rounded rounded-circle px-1"></span>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <span role="button" id="slot-delete-btn" onclick="slot.decrement()"
                            class="d-none mdi mdi-delete text-danger bg-soft-danger rounded rounded-circle px-1"></span>
                        <span role="button" onclick="slot.increment()"
                            class="mdi mdi-plus text-info bg-soft-info rounded rounded-circle px-1"></span>
                    </div>

                </div>
                <x-backend.ui.button class="btn-primary">Submit</x-backend.ui.button>
            </form>
        </div>

    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        let slot = {}
        let service = {}
        let ui = {}

        function incrementService(e) {

        }

        $(document).ready(function() {
            slot = {
                count: 1,
                slotWrapper: $('#slot-wrapper'),
                increment: function() {
                    let count = ++this.count;
                    let html = $('#slot').clone()
                    let serviceCount = html.find('#service-count').val(count)
                    let taxType = $('select[name="type"]')
                    if (taxType.val() === 'others') {
                        html.find('.service-wrapper').find('input').attr('disabled', false)
                        console.log(html.find('.service-wrapper').find('input'));
                    }
                    html.find('.slot-count').text(count)
                    html.find('#service-name').attr('name', `slot_${count}_services[]`)
                    html.find('#is-discount').attr('name', `slot_${count}_is_discounts[]`)
                    html.find('#discount-amount').attr('name', `slot_${count}_discount_amounts[]`)
                    this.slotWrapper.append(html.removeClass('d-none'))
                    this.showBtn()
                },
                decrement: function() {
                    if (this.count > 1) {
                        this.slotWrapper.children().last().remove()
                        this.count--;
                    } else {
                        console.log('At least on slot is required');
                    }
                    if (this.count === 1) {
                        this.hideBtn()
                    }
                },
                addSlot: function(count) {
                    service.count = 1
                    this.slotWrapper.append(this.slot(count))
                    service.toggleServices();
                },
                hideBtn: function() {
                    $('#slot-delete-btn').addClass('d-none')
                },
                showBtn: function() {
                    $('#slot-delete-btn').removeClass('d-none')
                }
            }
            service = {
                count: 1,
                increment: function(e) {
                    const wrapper = $(e.target).parent().parent().find('.service-wrapper');
                    let count = ++this.count;
                    $(e.target).next().show()
                    let html = $('#service').clone().removeClass('d-none')
                    let currentCount = wrapper.find('#service-count').val()

                    // changes label and name
                    let lastCount = parseInt(wrapper.find('#last-service-count').val())
                    lastCount++;
                    wrapper.find('#last-service-count').val(lastCount)
                    let serviceName = html
                        .find('#service-name')
                        .attr('name', `slot_${currentCount}_services[]`)

                    serviceName.prev().text('Service Name ' + (lastCount))
                    html.find('.service-count').text(lastCount)
                    html.find('#is-discount').attr('name', `slot_${currentCount}_is_discounts[]`)
                    html.find('#discount-amount').attr('name', `slot_${currentCount}_discount_amounts[]`)
                    wrapper.append(html)
                },
                decrement: function(e) {
                    const wrapper = $(e.target).parent().parent().find('.service-wrapper');
                    this.count--;
                    wrapper.children().last().remove()
                    // change count for label
                    let lastCount = parseInt(wrapper.find('#last-service-count').val())
                    lastCount--;
                    console.log(lastCount);
                    wrapper.find('#last-service-count').val(lastCount)
                    if (lastCount === 0) {
                        $(e.target).hide()
                    }
                },
                toggleServices: function() {
                    let taxType = $('select[name="type"]')
                    if (taxType.val() === 'others') {
                        $('.services').removeClass('d-none')
                    }
                    taxType.on('change', e => {
                        switch (e.target.value) {
                            case 'tax':
                                $('.services').addClass('d-none')
                                $('.services').find('input').attr('disabled', true)
                                break;
                            case 'others':
                                $('.services').removeClass('d-none')
                                $('.services').find('input').attr('disabled', false)

                                break;
                            default:
                                break;
                        }
                    })
                },
                discount: {
                    isFixed: true,
                    toggle: function(element) {
                        console.log(element);
                        this.isFixed = !this.isFixed;
                        let isDiscount = $(element).parent().find('#is-discount')
                        console.log(isDiscount);
                        isDiscount.val(this.isFixed)
                        let icon = $(element).prev()
                        icon
                            .toggleClass('mdi-currency-bdt')
                            .toggleClass('mdi-percent-outline')
                    },

                },
            }
            service.toggleServices()


            ui = {
                toggle: {
                    onlyIndividual: (e) => {
                        let type = $('select[name="type"]')
                        if (e.target.value !== 'individual') {
                            $('.not-individual').removeClass('d-none')
                            $('.not-individual').find('input').attr('disabled', false)
                            $('.only-individual').addClass('d-none')
                            $('.only-individual').find('input').attr('disabled', true)
                            $('.only-individual').find('select').attr('disabled', true)
                        } else {
                            $('.not-individual').addClass('d-none')
                            $('.not-individual').find('input').attr('disabled', true)
                            $('.only-individual').removeClass('d-none')
                            $('.only-individual').find('input').attr('disabled', false)
                            $('.only-individual').find('select').attr('disabled', false)
                        }
                    },
                    onlyCompany: (e) => {
                        if (e.target.value === 'company') {
                            $('.only-company').removeClass('d-none')
                            $('.only-company').find('input').attr('disabled', false)
                            $('.only-company').find('select').attr('disabled', false)
                        } else {
                            $('.only-company').addClass('d-none')
                            $('.only-company').find('input').attr('disabled', true)
                            $('.only-company').find('select').attr('disabled', true)
                        }
                    },
                    slotContainer: () => {
                        let type = $('select[name="type"]');
                        let forTax = $('select[name="for"]');
                        if (forTax.val() == 'company' && type.val() == 'tax') {
                            $('.slots-container').addClass('d-none')
                            $('.slots-container').find('input').attr('disabled', true)
                            $('.slots-container').find('select').attr('disabled', true)
                        } else {
                            $('.slots-container').removeClass('d-none')
                            $('.slots-container').find('input').attr('disabled', false)
                            $('.slots-container').find('select').attr('disabled', false)
                        }
                    }
                }
            }


            $('select[name="type"]').on('change', e => {
                ui.toggle.slotContainer()
            });
            $('select[name="for"]').on('change', e => {
                ui.toggle.slotContainer()
                ui.toggle.onlyCompany(e)
                ui.toggle.onlyIndividual(e)
            });
        });
    </script>
@endpush
