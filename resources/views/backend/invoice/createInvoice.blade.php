
@extends('backend.layouts.app')

@pushOnce('customCss')
    <style>
      
      input[type="date"]{
        letter-spacing: 2px;
        border: none;
        padding: 0.2rem 0.1rem;
      }
      input[type="date"]:focus{
        border-radius: 5px;
      }
      input[type="date"]:hover{
        cursor: pointer;
      }

      input{
        border: none;
        border-radius: 5px;
        display: block;
        background: none;
      }
      textarea{
        border: none;
        border-radius: 5px;
        display: block;
        background: none;
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
          <x-backend.form.image-input name="header_image" :image="null" class="d-flex justify-content-center" style="aspect-ratio:4/1;object-fit:contain;" />
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-3">
            <div class="pe-5">
              <x-form.selectize class="mb-1" id="client" name="client"
              placeholder="Select Client..." label="Bill To" :canCreate="false">
              @foreach ($clients as $client)
                  <option value="{{ $client->id }}">{{ $client->name }}</option>
              @endforeach
            </x-form.selectize>
            <a href="{{route('client.create')}}" class="text-blue" style="font-weight: 500;">Create New Client</a>

            </div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="mb-3">
              <label for="issue-date" class="mb-0 d-block">Date of Issue</label>
              <div class="d-flex align-items-center">
                <input type="date" name="issue_date" id="issue-date" value="{{now()->format('Y-m-d')}}" >
              </div>
            </div>
            <div class="mb-3">
              <label for="issue-date" class="mb-0 d-block">Due Date</label>
              <div class="d-flex align-items-center">
                <input type="date" name="due_date" id="due-date" value="{{now()->addDays(7)->format('Y-m-d')}}">
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="mb-3">
              <p class="mb-0 form-label">Invoice Number</p>
              <span  class="text-black">{{countRecords('invoices')+1}}</span>
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
      <div class="border-top border-4 mt-5">
        <div class="table-responsive mb-3">
          <table class="table table-striped">
              <thead class="bg-light">
                  <tr>
                      <th>#</th>
                      <th>Description</th>
                      <th>Rate</th>
                      <th>Qty</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                  <tr id="row-0">
                      <th scope="row">1</th>
                      <td>
                        <div>
                          <input aria-label="item-name" name="item_names[]" type="text" value="Item Name" />
                          <input aria-label="item-descriptions" name="item_descriptions[]" type="text" placeholder="Item Description (optional)" />
                        </div>
                      </td>
                      <td>
                        <span class="me-2">Tk</span>
                        <input aria-label="item-rate" id="item-rate-0" data-index="0" name="item_rates[]" type="text"  placeholder="00" class="d-inline-block" style="width: 6rem;" />
                      </td>
                      <td>
                        <input aria-label="item-rate" id="item-qty-0" data-index="0" name="item_qtys[]" type="text" placeholder="1" class="d-inline-block" style="width: 3rem;" />
                      </td>
                      <td>
                        <div class="d-flex align-items-start">
                          <span class="me-2">Tk</span>
                          <input aria-label="item-rate" id="item-total-0" data-index="0" name="item_totals[]" type="text" value="0" placeholder="00" class="d-inline-block" style="width: 7rem;" disabled />
                          <span id="item-delete-btn-0" data-index="0" class="mdi mdi-trash-can-outline item-delete-btn" style="cursor: pointer;"></span>
                        </div>
                      </td>
                  </tr>
              </tbody>
          </table>
          <button id="item-add-btn" type="button" class="w-100 p-1 fw-bold rounded rounded-3" style="background: none; border: 2px solid rgb(172, 170, 170);">Add New Item</button>
      </div> <!-- end table-responsive-->
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 border-bottom border-dark">
            <div class="d-flex gap-5 justify-content-end ">
                <p class="text-end text-black">Subtotal</p>
                <p class="text-end text-black">7,560.00</p>
              </div>
              <div class="d-flex gap-5 justify-content-end ">
                <p class="text-end text-black">hello(5%) <br>  <span> #asdflkjsdf</span></p>
                <p class="text-start text-black">378.00</p>
              </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 border-bottom border-dark">
            <div class="d-flex gap-5 justify-content-end">
                <p class="text-end text-black">Total</p>
                <p class="text-start text-black">40930.00</p>
              </div>
              <div class="d-flex gap-5 justify-content-end">
                <p class="text-end text-black">Amount Paid</p>
                <p class="text-start text-black">0.00</p>
              </div>
        </div>
      </div>
      <div class="d-flex justify-content-end gap-5">
        <p class="text-end text-black">Amount Due (USD)</p>
        <p class="text-start text-black">$5030</p>
      </div>
      <div>
        <label class="mb-0" for="note">Notes</label>
        <textarea id="note" name="note" placeholder="Write a note here(Optional)" cols="30" rows="3"></textarea>
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
      $(document).ready(function () {
        let itemCount = 0;
        const itemAddBtn = $('#item-add-btn')
        let rates = $("input[name='item_rates[]']")
        let qtys = $("input[name='item_qtys[]']")

        //set event listeners for initial item
        setEventListenerFor(rates)
        setEventListenerFor(qtys)
        setDeleteEvent();

        itemAddBtn.click(e=>{
          itemCount++;
          $('tbody').append(newItem(itemCount));
          
          //assign latest items again
          rates = $("input[name='item_rates[]']")
          qtys = $("input[name='item_qtys[]']")

          //set eventlisters for appended items
          setEventListenerFor(rates)
          setEventListenerFor(qtys)
          setDeleteEvent();
        })
        

        function newItem(itemNo) { 
          return `
          <tr id="row-${itemNo}">
            <th scope="row">${itemNo+1}</th>
            <td>
              <div>
                <input aria-label="item-name" name="item_names[]" type="text" value="Item Name" />
                <input aria-label="item-descriptions" name="item_descriptions[]" type="text" placeholder="Item Description (optional)" />
              </div>
            </td>
            <td>
              <span>Tk</span>
              <input aria-label="Item Rate" id="item-rate-${itemNo}" data-index="${itemNo}" name="item_rates[]" type="text" placeholder="00" class="d-inline-block" style="width: 6rem;" />
            </td>
            <td>
              <input aria-label="Item Quantity" id="item-qty-${itemNo}" data-index="${itemNo}" name="item_qtys[]" type="text" placeholder="1" class="d-inline-block" style="width: 3rem;" />
            </td>
            <td>
              <div class="d-flex align-items-start">
                <span class="me-2">Tk</span>
                <input aria-label="item-rate" id="item-total-${itemNo}" data-index="${itemNo}" name="item_totals[]" type="text" value="0" placeholder="00" class="d-inline-block" style="width: 7rem;" disabled />
                <span id="item-delete-btn-${itemNo}" data-index="${itemNo}" class="mdi mdi-trash-can-outline item-delete-btn" style="cursor: pointer;"></span>
              </div>
            </td>
          </tr>
          `
        }

        function setDeleteEvent(){
          const itemDeleteBtns = $('.item-delete-btn')
          itemDeleteBtns.each((i, el)=>{
            const row = $(`#row-${el.dataset.index}`)
            el.addEventListener('click', e=>{
              row.remove();
              itemCount--;
            })
          })
        }
        
        //set event listeners given a jquery list
        function setEventListenerFor(elements){
          elements.each((i, el)=>{
          el.addEventListener('input', (e)=>{
            let index = e.target.dataset.index
            let rate = $(`#item-rate-${index}`).val() == "" ? 1 : parseInt($(`#item-rate-${index}`).val())
            let qty = $(`#item-qty-${index}`).val() == "" ? 1 : parseInt($(`#item-qty-${index}`).val())
            let total = rate * qty;
            console.log(rate, qty);
            

            //set the total in total input value
            $(`#item-total-${index}`).val(total)
          })
        })
        }

      });
    </script>
@endPushOnce




















