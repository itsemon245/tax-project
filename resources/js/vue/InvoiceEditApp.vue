<template>
  <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-success waves-effect waves-light rounded-3 shadow mb-2"
      @click="toggleEditMode">{{ editBtn }}</button>
  </div>
  <div class="border-top border-4">
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
      <button v-show="isEditMode" @click="addNewItem" id="item-add-btn" type="button" class="w-100 p-1 fw-bold rounded rounded-3"
        style="background: none; border: 2px solid rgb(172, 170, 170);">Add New Item</button>
    </div>
  </div><!-- end table-responsive-->


  <div class="row justify-content-between">
    <div class="col-md-5">
      <h4 class="">Amount Details:</h4>
      <div class="row align-items-center justify-content-between">
        <label class="col-4 form-label mb-0">Sub Total:</label>
        <div class="col-5 p-0">
          <input type="text" class="text-end p-1 d-inline-block fw-bold" style="width: calc(100% - 1rem);"
            name="sub_total" placeholder="00.00" v-model="subTotal" />
          <span class="">Tk</span>
        </div>
      </div>

      <div class="discount-wrapper">
        <a v-if="!discount.amount" @click="toggleDiscount" class="text-blue d-inline-block" tabindex="0" role="button">
          <span class="mdi mdi-tag-plus-outline fs-5"> Add Discount</span>
        </a>
        <a v-else="discount.amount" @click="toggleDiscount" class="text-blue" tabindex="0" role="button">
          <div class="d-flex justify-content-between align-items-center p-0 w-100">
            <span class="mdi mdi-tag-edit-outline fs-5 p-0"> Change Discount</span>
            <span class="p-0 text-success fw-bold" style="margin-right: -.6rem;"> - {{ discount.amount }} Tk</span>
          </div>
        </a>
        <div class="discount-container" :class="{ 'd-none': !discount.isActive }">
          <h5 class="title">Add Discount</h5>
          <div class="px-2">
            <div class="d-flex align-items-center justify-content-center">
              <div class="row w-75 mx-auto">
                <label class="form-label mb-0 p-0">Discount</label>
                <div class="col-5 p-0">
                  <input type="text" name="discount"
                    class="w-100 border-top border-bottom border-start border-1 text-center rounded-0 rounded-start h-100 "
                    placeholder="0" v-model="discount.amount" aria-label="Rate" aria-describedby="tax-addon1">
                </div>
                <div class="col-3 p-0 py-1 ps-1 align-self-center border-end border-top border-bottom "
                  style="background: var(--ct-gray-200);">
                  <span class="mdi p-0 text-success"
                    :class="[discount.isFixed ? 'mdi-currency-bdt' : 'mdi-percent-outline']"
                    style="font-size: 18px;"></span>
                </div>
                <div class="col-4 bg-blue p-0 py-1 ps-2 align-self-center border rounded-end" @click="toggleDiscountType">
                  <span class="mdi mdi-swap-horizontal p-0 text-white " style="font-size: 18px;cursor: pointer;"></span>
                </div>
                <div class="col-12">
                  <div class='d-flex justify-content-center align-items-center gap-2 my-3'>
                    <button @click="toggleDiscount" type="button" class="btn btn-soft-info py-1">Close</button>
                    <button @click="calcDiscount" type='button' class='btn btn-success py-1'>Add</button>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>
      <div class="mb-2">
        <div class="row mb-1 align-items-center justify-content-between">
          <p class="col-8 mb-0">
          <div class="">
            Taxes:
            <div v-for="item in invoiceItems" class="d-flex gap-1 flex-wrap">
              <div v-for="tax in item.taxes">
                <div v-show="totalTax > 0">{{ tax.name }}(<span class="fs-6 fw-light p-0">#{{ tax.number }}</span>),
                </div>
              </div>
              <div v-show="totalTax === 0">No taxes Added</div>
            </div>
          </div>
          </p>
          <span v-show="totalTax > 0" class="col-4 text-end p-0 text-danger fw-bold">+ {{ totalTax }} Tk</span>
        </div>
      </div>
      <div class="row mb-2 align-items-center justify-content-between border-top border-2">
        <label class="col-4 form-label mb-0">Total</label>
        <input type="text" class="col-6 text-end p-1" name="total" placeholder="00.00" v-model="total" />
      </div>

      <div>
        <label class="mb-0" for="note">Notes</label>
        <textarea class="w-100" name="note" placeholder="Write a note here(Optional)" rows="3" v-model="notes"></textarea>
      </div>
    </div>
    <div class="col-md-5">
      <h4 class="">Payment Details:</h4>
      <div class="d-flex my-1 gap-2 align-items-center mb-2">
        <select name="payment_method" class="form-select text-capitalize w-50" v-model="paymentMethod">
          <option selected disabled>Select Payment Method</option>
          <option v-for="option of options" :value="option" class="text-capitalize">{{ option }}</option>
        </select>
      </div>
      <div class="mb-2">
        <label class="mb-0" for="note">Payment Note</label>
        <textarea class="border border-2 w-100" name="payment_note"
          :placeholder="'Write a payment note...\ne.g: Card Details, Bank Details etc'"
          rows="4">{{ paymentNote }}</textarea>
      </div>

      <div class="row mb-2 align-items-center">
        <label class="col-4 form-label mb-0">Total</label>
        <input type="text" class="col-6 p-1" name="total" placeholder="00.00" v-model="total" />
      </div>
      <div class="row mb-2 align-items-center">
        <label class="col-4 form-label mb-0">Amount Paid</label>
        <input type="text" class="col-6 p-1" name="paid" placeholder="00.00" v-model="paid" />
      </div>
      <div class="row mb-2 align-items-center">
        <label class="col-4 form-label mb-0">Amount Due </label>
        <input type="text" class="col-6 p-1" name="due" placeholder="00.00" v-model="due" />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { computed, onBeforeMount, onMounted, ref, watch } from 'vue';
import $ from "jquery";
// @ts-ignore
import InvoiceItem from './components/InvoiceItem.vue';
import { useInvoice } from './composables/useInvoice';
import { useAccounts } from './composables/useAccounts';
import axios from 'axios'

const isEditMode = ref(false);

const editBtn = computed(() => {
  return isEditMode.value ? 'Cancel' : 'Edit'
})
const { invoiceItems, addNewItem, calcTaxes } = useInvoice()
const { subTotal, total, discount, paid, due, notes } = useAccounts()
const totalTax = ref(0)
const paymentMethod = ref('')
const paymentNote = ref('')
const options = ref([
  'cash', 'bkash', 'nagad', 'rocket', 'bank', 'card'
])

const toggleDiscount = () => {
  discount.value.isActive = !discount.value.isActive
}
const toggleDiscountType = () => {
  discount.value.isFixed = !discount.value.isFixed
}
const calcDiscount = () => {
  discount.value.amount = discount.value.isFixed ? discount.value.amount : subTotal.value * discount.value.amount / 100;
  toggleDiscount()
}
const toggleEditMode = () => {
  isEditMode.value = !isEditMode.value
  $('#submit-btn').toggleClass('d-none')
}
const toggleInputs = (mode) =>{
  $('#submit-form').prop('disabled', mode)
    $('input').prop('disabled', mode)
    $('select').prop('disabled', mode)
    $('.selectize').prop('disabled', mode)
    $('textarea').prop('disabled', mode)
}
onMounted(() => {
  toggleInputs(isEditMode)
  watch(isEditMode, (newVal) => {
    toggleInputs(!newVal)
    
  })


  const id = document.querySelector('#invoice-id')?.innerHTML
  const url = 'http://localhost:8000/admin/get-invoice-data/' + id

  axios.get(url)
    .then(response => {

      const items = response.data.invoiceItems
      const invoice = response.data.invoice

      invoiceItems.value = items

      subTotal.value = invoice.subTotal
      discount.value = {
        amount: invoice.discount,
        isFixed: true,
        percentage: 0,
        isActive: false
      }
      total.value = invoice.total
      notes.value = invoice.note
      paid.value = invoice.amountPaid
      due.value = invoice.amountDue
      paymentNote.value = invoice.paymentNote
      paymentMethod.value = invoice.paymentMethod
    })
    .catch(error => {
      console.log(error);
    })


  watch(invoiceItems, (newItems) => {
    let sum = 0;
    newItems.forEach((item) => {
      sum += item.total;
    });
    subTotal.value = sum;
  }, { deep: true });

  watch(invoiceItems, (newItems) => {
    let sum = 0;
    newItems.forEach((item) => {
      sum += item.tax;
    });
    totalTax.value = parseInt(sum.toFixed(2));

  }, { deep: true })

  watch([totalTax, subTotal, discount], () => {
    total.value = subTotal.value + totalTax.value - discount.value.amount
  }, { deep: true })

  watch([subTotal], () => {
    if (subTotal.value !== 0) {
      discount.value.amount = discount.value.isFixed ? discount.value.amount : subTotal.value * discount.value.amount / 100;
    }
  }, { deep: true })

  watch([total, paid], () => {
    due.value = total.value - paid.value
    due.value = parseFloat(due.value.toFixed(2))
    const dueDom = document.querySelector('#amount-due-vue') as Element
    dueDom.innerHTML = due.value + ' Tk'
  })


})

watch(invoiceItems, (newItems) => {
  newItems.forEach((item) => {
    calcTaxes(item.id)
  });
})


</script>

<style lang="css" scoped></style>