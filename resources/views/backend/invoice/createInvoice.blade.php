
@extends('backend.layouts.app')

@section('content')

 <!-- start page title -->
 <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
 <!-- end page title -->

 <x-backend.ui.section-card>
    <section class="p-lg-3">
      <div>
        <div class="d-flex border mb-5 justify-content-center">
          <x-backend.form.image-input name="header_image" class="d-flex justify-content-center" style="aspect-ratio:4/1;object-fit:contain;" />
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-3">
            <p class="mb-0 text-muted">Billed to</p>
            <p class="mb-0 text-black">Noelle Lawson</p>
            <p class="text-black">Roberts and Knight Trading</p>

          </div>
          <div class="col-sm-4 col-md-3">
            <div class="mb-3">
              <p class="mb-0">Date of Issue</p>
              <span class="text-black">1996-10-08</span>
            </div>
            <div>
              <p class="mb-0">Due Date</p>
              <span  class="text-black">1996-11-07</span>
            </div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="mb-3">
              <p class="mb-0">Invoice Number</p>
              <span  class="text-black">1</span>
            </div>
            <div>
              <p class="mb-0">Reference</p>
              <span  class="text-black">234</span>
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
        <div class="table-responsive">
          <table class="table table-striped mb-3">
              <thead class="bg-light">
                  <tr>
                      <th>#</th>
                      <th>Description</th>
                      <th>Rate</th>
                      <th>Qty</th>
                      <th>Line Total</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>
                        <div>
                          <h5>Item Name</h5>
                          <span class="text-muted">Item Description</span>
                        </div>
                      </td>
                      <td>$12</td>
                      <td>5</td>
                      <td>$60</td>
                  </tr>
              </tbody>
          </table>
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




















