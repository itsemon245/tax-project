@extends('backend.layouts.app')

@pushOnce('customCss')
    <style>
        input[type="date"] {
            letter-spacing: 2px;
            border: none;
            padding: 0.2rem 0.1rem;
        }

        input[type="date"]:focus {
            border-radius: 5px;
        }

        input[type="date"]:hover {
            cursor: pointer;
        }

        input {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        textarea {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        .tax-wrapper {
            position: relative;
        }

        .tax-container {
            position: absolute;
            background: var(--ct-white);
            width: 320px;
            border-radius: 10px;
            border: 2px solid var(--ct-gray-300);
            overflow: visible;
            top: -20px;
            left: 60px;
        }

        .tax-container>.title {
            background: var(--ct-light);
            margin: 0 0 .5rem;
            padding: .5rem;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .tax-container>.title::before {
            content: '';

            border-top: .5rem solid transparent;
            border-right: 1rem solid var(--ct-gray-300);
            border-bottom: .5rem solid transparent;
            */ bottom: 0;
            left: -1rem;
            position: absolute;
        }
    </style>
@endPushOnce
@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card>
        <section class="p-lg-3">
            <div>
                <div class="d-flex border mb-5 justify-content-center">
                    <x-backend.form.image-input name="header_image" :image="null" class="d-flex justify-content-center"
                        style="aspect-ratio:4/1;object-fit:contain;" />
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="pe-5">
                            <x-form.selectize class="mb-1" id="client" name="client" placeholder="Select Client..."
                                label="Bill To" :canCreate="false">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </x-form.selectize>
                            <a href="{{ route('client.create') }}" class="text-blue" style="font-weight: 500;">Create New
                                Client</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="mb-3">
                            <label for="issue-date" class="mb-0 d-block">Date of Issue</label>
                            <div class="d-flex align-items-center">
                                <input type="date" name="issue_date" id="issue-date"
                                    value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="issue-date" class="mb-0 d-block">Due Date</label>
                            <div class="d-flex align-items-center">
                                <input type="date" name="due_date" id="due-date"
                                    value="{{ now()->addDays(7)->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="mb-3">
                            <p class="mb-0 form-label">Invoice Number</p>
                            <span class="text-black">{{ countRecords('invoices') + 1 }}</span>
                        </div>
                        <div>
                            <label class="mb-0" for="reference">Reference</label>
                            <input type="text" id="reference" name="reference" value="000">
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="d-flex justify-content-end ">
                            <p class="mb-0">Amount Due (USD) </br>
                                <span class="fs-1 fw-bold text-black">$7,938.00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="invoice-vue-app">

            </div>

            {{-- <div class="mt-5">
      <p class="mb-0">Terms</p>
      <h5>Molestiae quia volup</h5>
    </div> --}}
        </section>

    </x-backend.ui.section-card>
@endsection

@pushOnce('customJs')
    <script>
        // $(document).ready(function() {
        //     let itemCount = 0;
        //     const itemAddBtn = $('#item-add-btn')
        //     let rates = $("input[name='item_rates[]']")
        //     let qtys = $("input[name='item_qtys[]']")
        //     let subTotal = 0


        //     // discount popover starts
        //     const discountPicker = $('#discount-picker')
        //     const popoverOptions = {
        //         trigger: 'focus-within',
        //         placement: 'bottom',
        //         fallbackPlacements: ['bottom', 'top', 'left', 'right'],
        //         html: true,
        //         container: $(`#discount-picker-container`),
        //         title: 'Add Discount',
        //         sanitize: false,
        //         content: `
        //     <div style="max-width:20ch;">
        //       <div class="d-flex justify-content-center align-items-center gap-1 mb-2">
        //           <input type="text" class="text-center border p-1 d-inline-block w-50" name="discount" placeholder="0" value='0'/>
        //           <span class="text-dark fs-5 fw-bold">Tk or %</span>
        //       </div>
        //       <p class="fs-6"><sup class="text-danger fw-bold">*</sup>Put % in the end if the discount is not fixed</p>
        //       <div class='d-flex align-items-center gap-3'>
        //         <button id="close-discount" type="button" class="btn btn-soft-success btn-sm rounded rounded-3">Close</button>
        //         <button id="add-discount" type="button" class="btn btn-success rounded btn-sm rounded-3">Add</button>
        //       </div>

        //     </div>
        //   `,
        //     }
        //     // discount popover
        //     const discountPopover = new bootstrap.Popover(discountPicker, popoverOptions)
        //     //  event listener for elements inside popover
        //     discountPicker.on('inserted.bs.popover', function() {
        //         $('#add-discount').click(() => {
        //             let value = $("[name='discount']").val();
        //             const isPercentage = value.indexOf('%') > 0;
        //             value = isPercentage ? value.slice(0, value.indexOf('%')) : value;
        //             value = parseFloat(value)
        //             const subTotal = parseFloat($("[name='sub_total']").val());
        //             const discount = isPercentage ? (subTotal * value / 100) : value;
        //             const discountLabel = discountPicker.children()[0]
        //             discountLabel.innerHTML = `
        //     <span>
        //       Discount
        //     </span>
        //     <span class="text-danger"> - ${discount} Tk</span>
        //     `
        //             discountPopover.hide()
        //         })

        //         $('#close-discount').click(() => {
        //             discountPopover.hide()
        //         })
        //     })
        //     // discount popover ends





        //     //set event listeners for initial item
        //     setEventListenerFor(rates)
        //     setEventListenerFor(qtys)
        //     setDeleteEvent();

        //     // itemAddBtn.click(e => {
        //     //     itemCount++;
        //     //     let item = newItem(itemCount)
        //     //     $('#table-body').append(item);


        //     //     //assign latest items again
        //     //     rates = $("input[name='item_rates[]']")
        //     //     qtys = $("input[name='item_qtys[]']")

        //     //     //set eventlisters for appended items
        //     //     setEventListenerFor(rates)
        //     //     setEventListenerFor(qtys)
        //     //     setDeleteEvent();
        //     // })


        //     //funtion for returning new item markup
        //   //   function newItem(itemNo) {
        //   //       return `
        //   // <tr id="row-${itemNo}">
        //   //   <th scope="row">${itemNo+1}</th>
        //   //   <td>
        //   //     <div>
        //   //       <input aria-label="item-name" name="item_names[]" type="text" value="Item Name" />
        //   //       <input aria-label="item-descriptions" name="item_descriptions[]" type="text" placeholder="Item Description (optional)" />
        //   //     </div>
        //   //   </td>
        //   //   <td>
        //   //     <span class="me-2">Tk</span>
        //   //     <input aria-label="item-rate" id="item-rate-${itemNo}" data-index="${itemNo}" name="item_rates[]" type="text"  placeholder="00" class="d-inline-block" style="width: 6rem;" />
        //   //     <div class="tax-wrapper">
        //   //       <a id="tax-picker-${itemNo}" data-toggle="#tax-picker-container-${itemNo}" class="text-blue tax-picker" tabindex="0"  role="button" >
        //   //         <div class="d-flex justify-content-between align-items-center">
        //   //           <p class="mb-0">
        //   //             <span class="mdi mdi-plus fs-5"></span>Taxes
        //   //           </p>
        //   //         </div>
        //   //       </a>
        //   //       <div id="tax-picker-container-${itemNo}" class="tax-container">
        //   //         <h5 class="title">Add Taxes</h5>
        //   //           <div class="px-2">
        //   //             <div id="tax-list-0">
        //   //               <div class="d-flex align-items-center gap-1 mb-2"> 
        //   //                 <div class="w-50">
        //   //                   <label class="form-label mb-0">Rate</label>
        //   //                   <div class="d-flex">
        //   //                     <input type="text" name="taxe-rates-${itemNo}[]" class="w-100 border border-1 text-center rounded-0 rounded-start" placeholder="0" value='0' aria-label="Rate" aria-describedby="tax-addon1">
        //   //                     <span class="bg-light rounded-0 rounded-end p-1 d-flex justify-content-center align-items-center text-dark fw-bold fs-5" id="tax-addon1">%</span>
        //   //                   </div>
        //   //                 </div>
        //   //                 <div class="">
        //   //                   <label class="form-label mb-0">Name</label>
        //   //                   <input type="text" name="tax-names-${itemNo}[]" class="w-100 border border-1 text-center p-1" placeholder="Tax Name" aria-label="Tax Name">
        //   //                 </div>
        //   //                 <div class="w-50">
        //   //                   <label class="form-label mb-0">Number</label>
        //   //                   <input type="text" name="tax-numbers-${itemNo}[]" class="w-100 border border-1 text-center p-1" placeholder="Number" aria-label="Tax Number">
        //   //                 </div>
        //   //                 <div class="align-self-end">
        //   //                   <span id="tax-item-0-delete-0" class="mdi mdi-trash-can-outline text-danger"></span>
        //   //                 </div>                         
        //   //               </div>
        //   //             </div>
        //   //             <button id="new-item" type='button' class='border-1 rounded bg-transparent w-100 fw-bold'>Add a line</button>
        //   //             <div class='d-flex justify-content-center align-items-center gap-2 mt-2'>
        //   //               <button id="close-tax" type="button" class="btn btn-soft-success btn-sm rounded rounded-3">Close</button>
        //   //               <button id="add-tax" type="button" class="btn btn-success rounded btn-sm rounded-3">Add</button>
        //   //             </div>
        //   //           </div>
        //   //       </div> 
        //   //     </div>
        //   //   </td>
        //   //   <td>
        //   //     <input aria-label="Item Quantity" id="item-qty-${itemNo}" data-index="${itemNo}" name="item_qtys[]" type="text" placeholder="1" class="d-inline-block" style="width: 3rem;" />
        //   //   </td>
        //   //   <td>
        //   //     <div class="d-flex align-items-start">
        //   //       <span class="me-2">Tk</span>
        //   //       <input aria-label="item-rate" id="item-total-${itemNo}" data-index="${itemNo}" name="item_totals[]" type="text" value="0" placeholder="00" class="d-inline-block" style="width: 7rem;" disabled />
        //   //       <span id="item-delete-btn-${itemNo}" data-index="${itemNo}" class="mdi mdi-trash-can-outline text-danger item-delete-btn" style="cursor: pointer;"></span>
        //   //     </div>
        //   //   </td>
        //   // </tr>
        //   // `
        //   //   }

        //     function setDeleteEvent() {
        //         const itemDeleteBtns = $('.item-delete-btn')
        //         itemDeleteBtns.each((i, el) => {
        //             const row = $(`#row-${el.dataset.index}`)
        //             el.addEventListener('click', e => {
        //                 row.remove();
        //                 itemCount--;
        //             })
        //         })
        //     }

        //     //set event listeners given a jquery list
        //     function setEventListenerFor(elements) {
        //         elements.each((i, el) => {
        //             el.addEventListener('input', (e) => {
        //                 let index = e.target.dataset.index
        //                 let rate = $(`#item-rate-${index}`).val() == "" ? 1 : parseFloat($(
        //                     `#item-rate-${index}`).val())
        //                 let qty = $(`#item-qty-${index}`).val() == "" ? 1 : parseInt($(
        //                     `#item-qty-${index}`).val())
        //                 let total = rate * qty;

        //                 //set the total in total input value
        //                 $(`#item-total-${index}`).val(total)
        //                 //trigger subtotal calculation handler
        //                 calculateSubTotal();
        //             })
        //         })
        //     }

        //     function calculateSubTotal() {
        //         let totals = $("input[name='item_qtys[]']")
        //         let subTotalElement = $('#sub-total')
        //         let subTotal = 0
        //         totals.each((i, el) => {
        //             let value = parseFloat(el.value);
        //             console.log(value);
        //             subTotal = +value
        //         })
        //         subTotalElement.val(subTotal)
        //     }




        //     function addTaxPopOver() {
        //         // tax popover starts
        //         const taxPickers = $('.tax-picker')
        //         // tax popover
        //         taxPickers.each((i, taxPicker) => {
        //             const taxPopover = new bootstrap.Popover(taxPicker, {
        //                 trigger: 'focus-within',
        //                 placement: 'bottom',
        //                 fallbackPlacements: ['bottom', 'top', 'left', 'right'],
        //                 html: true,
        //                 container: $(`#tax-picker-container-${i}`),
        //                 title: 'Add Taxes',
        //                 sanitize: false,
        //                 content: `
        //         <div style='max-width:350px;'>
        //           <div id="tax-list-${i}">
        //             <div class="row mb-2"> 
        //               <div class="col-3 px-1">
        //                 <label class="form-label mb-0">Rate</label>
        //                 <div class="d-flex">
        //                   <input type="text" class="w-100 name="taxe-rates-${i}[]" border border-1 text-center rounded-0 rounded-start" placeholder="0" value='0' aria-label="Rate" aria-describedby="tax-addon1">
        //                   <span class="bg-light rounded-0 rounded-end p-1 d-flex justify-content-center align-items-center text-dark fw-bold fs-5" id="tax-addon1">%</span>
        //                 </div>
        //               </div>
        //               <div class="col-4 p-0 pe-1">
        //                 <label class="form-label mb-0">Name</label>
        //                 <input type="text" name="tax-names-${i}[]" class="w-100 border border-1 text-center p-1" placeholder="Tax Name" aria-label="Tax Name">
        //               </div>
        //               <div class="col-3 p-0 pe-1">
        //                 <label class="form-label mb-0">Number</label>
        //                 <input type="text" name="tax-numbers-${i}[]" class="w-100 border border-1 text-center p-1" placeholder="Number" aria-label="Tax Number">
        //               </div>
        //               <div class="col-2 p-0 pe-1 align-self-end">
        //                 <span id="tax-item-${i}-delete-0" class="mdi mdi-trash-can-outline text-danger"></span>
        //               </div>                         
        //             </div>
        //           </div>
        //           <button id="new-tax-field-${i}" type='button' class='border-1 rounded bg-transparent w-100 fw-bold'>Add a line</button>
        //           <div class='d-flex justify-content-center align-items-center gap-2 mt-2'>
        //             <button id="close-tax" type="button" class="btn btn-soft-success btn-sm rounded rounded-3">Close</button>
        //             <button id="add-tax" type="button" class="btn btn-success rounded btn-sm rounded-3">Add</button>
        //           </div>

        //         </div>
        //       `,
        //             })

        //             //  event listener for elements inside popover
        //             taxPicker.addEventListener('inserted.bs.popover', function() {
        //                 let newLine = $('#new-tax-field-' + i);
        //                 let taxItemCount = 0;
        //                 const newField = () => `
        //             <div class="row mb-2"> 
        //               <div class="col-3 px-1">
        //                 <label class="form-label mb-0">Rate</label>
        //                 <div class="d-flex">
        //                   <input type="text" class="w-100 name="taxe-rates-${itemCount}[]" border border-1 text-center rounded-0 rounded-start" placeholder="0" value='0' aria-label="Rate" aria-describedby="tax-addon1">
        //                   <span class="bg-light rounded-0 rounded-end p-1 d-flex justify-content-center align-items-center text-dark fw-bold fs-5" id="tax-addon1">%</span>
        //                 </div>
        //               </div>
        //               <div class="col-4 p-0 pe-1">
        //                 <label class="form-label mb-0">Name</label>
        //                 <input type="text" name="tax-names-${itemCount}[]" class="w-100 border border-1 text-center p-1" placeholder="Tax Name" aria-label="Tax Name">
        //               </div>
        //               <div class="col-3 p-0 pe-1">
        //                 <label class="form-label mb-0">Number</label>
        //                 <input type="text" name="tax-numbers-${itemCount}[]" class="w-100 border border-1 text-center p-1" placeholder="Number" aria-label="Tax Number">
        //               </div>
        //               <div class="col-2 p-0 pe-1 align-self-end">
        //                 <span id="tax-item-${itemCount}-delete-${taxItemCount}" class="mdi mdi-trash-can-outline text-danger"></span>
        //               </div>                         
        //             </div>
        //         `
        //                 newLine.click(e => {
        //                     taxItemCount++;
        //                     $('#tax-list-' + i).append(newField())
        //                 })



        //                 $('#add-tax').click(() => {
        //                     //
        //                     taxPopover.hide()
        //                 })

        //                 $('#close-tax').click(() => {
        //                     taxPopover.hide()
        //                 })
        //             })

        //         })
        //         // tax popover ends
        //     }
        // });
    </script>
@endPushOnce
