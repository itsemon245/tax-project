@extends('backend.layouts.app')

@section('content')
 
 <!-- start page title -->
 <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
 <!-- end page title -->

 <x-backend.ui.section-card>
    <section class="p-lg-3">
      <div>
        <div class="d-flex border mb-5">
          <img class="mb-2" src="{{ asset('backend/assets/images/logo.jpg') }}" style="width: 100%; object-fit:cover; aspect-ratio:4/1;">
        </div>    
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <p class="mb-0 text-muted">Billed to</p>
            
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="mb-3">
              <p class="mb-0">Date of Issue</p>
              <span class="text-black">1996-10-08</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="mb-3">
              <p class="mb-0">Invoice Number</p>
              <span  class="text-black">1</span>
            </div>
            
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="d-flex justify-content-end">
              <p class="mb-0 ">Amount Due (USD) </br>
                <span class="fs-1 fw-bold text-black">$7,938.00</span>
              </p>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <p class="mb-0 text-black">Noelle Lawson</p>
            <p class="text-black">Roberts and Knight Trading</p>
          </div>
          <div class="col-lg-3 col-md-4">
            <div>
              <p class="mb-0">Due Date</p>
              <span  class="text-black">1996-11-07</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div>
            <p class="mb-0">Reference</p>
            <span  class="text-black">234</span>
          </div>
        </div>
        </div>
      </div>
      <div class="border-top border-4 mt-5">
        <div class="d-flex py-2 border-bottom border-2">
          <div class="w-75">
            <p class="mb-3">Description</p>
            <span class="fs-4 text-black">server</span> <br />
            <span class="text-black">Est duis enim volup</span>
          </div>
          <div class="d-flex justify-content-between w-25">
            <div>
              <p class="mb-4">Rate</p>
              <span  class="text-black">$45.00</span> <br />
              <span class="text-black">+hello</span>
            </div>
            <div>
              <p class="mb-4">Qty</p>
              <span  class="text-black">168</span>
            </div>
            <div>
              <p class="mb-4">Line Total</p>
              <span  class="text-black">$7,560.00</span>
            </div>
          </div>
        </div>
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
        <p class="mb-0">Notes</p>
        <h5 >Assumenda distinctio</h5>
      </div>
      <div class="mt-5">
        <p class="mb-0">Terms</p>
        <h5>Molestiae quia volup</h5>
      </div>
    </section>
  </x-backend.ui.section-card>






   
@endsection




















