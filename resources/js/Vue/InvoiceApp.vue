<template>
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
        <tbody id="table-body">
          <InvoiceItem v-for="item in invoiceItems" :key="item.id" :item="item">
          </InvoiceItem>
        </tbody>
      </table>
      <button @click="addNewItem" id="item-add-btn" type="button" class="w-100 p-1 fw-bold rounded rounded-3"
        style="background: none; border: 2px solid rgb(172, 170, 170);">Add New Item</button>
    </div>
  </div><!-- end table-responsive-->


  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 d-flex justify-content-end border-bottom border-2 p-2">
      <div>
        <div class="d-flex justify-content-between align-items-center gap-3">
          <label class="form-label mb-0">Subtotal</label>
          <input type="text" class="text-end" name="sub_total" placeholder="00.00" v-model="subTotal" />
        </div>
        <a id="discount-picker" tabindex="0" class="text-blue" role="button">
          <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">
              <span class="mdi mdi-plus fs-5"></span> Add Discount
            </p>
          </div>
          <div id="discount-picker-container"></div>
        </a>
        <div id="tax-list text-dark fs-5">
          <div class="d-flex justify-content-between align-items-center gap-3 ">
            <div>
              <p class="mb-0 text-black">tax name</p>
              <p class="mb-0 fs-6">#tax note</p>
            </div>
            <span class="text-success"> + 12 Tk</span>
          </div>
        </div>
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
</template>

<script lang="ts" setup>
import { ref, watch } from 'vue';
import InvoiceItem from './components/InvoiceItem.vue';
import { useInvoice } from './composables/useInvoice';


const { invoiceItems, addNewItem } = useInvoice()
const subTotal = ref(0)

watch(invoiceItems, (newItems) => {
      let sum = 0;
      newItems.forEach((item) => {
        sum += item.total;
      });
      subTotal.value = sum;
    }, { deep: true });



</script>

<style lang="css" scoped></style>