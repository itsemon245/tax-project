<template>
    <tr>
        <th scope="row">{{ props.item.id + 1 }}</th>
        <td>
            <div>
                <input aria-label="item-name" name="item_names[]" type="text" v-model="props.item.name" />
                <input aria-label="item-descriptions" name="item_descriptions[]" type="text"
                    placeholder="Item Description (optional)" />
            </div>
        </td>
        <td>
            <span class="me-2">Tk</span>
            <input aria-label="item-rate" class="d-inline-block" name="item_rates[]" type="text" placeholder="00"
                v-model="props.item.rate" style="width: 6rem;" />
            <div class="tax-wrapper">
                <a @click="toggleTaxPicker(props.item.id)" class="text-blue p-1 d-inline-block" tabindex="0" role="button">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <span class="mdi mdi-plus fs-5"></span>Taxes
                        </p>
                    </div>
                </a>
                <div ref="taxPicker" class="tax-container" :class="{ 'd-none': !props.item.isTaxActive }">
                    <div @click="toggleTaxPicker(props.item.id)" class="close-icon d-inline-block" style="cursor: pointer;">
                        <CloseIcon class="" width="24" height="24"></CloseIcon>
                    </div>
                    <h5 class="title">Add Taxes</h5>
                    <div class="px-2">
                        <div v-for="tax in props.item.taxes" :key="tax.id as number" class="d-flex align-items-center gap-1 mb-2">
                            <div class="w-50">
                                <label class="form-label mb-0">Rate</label>
                                <div class="d-flex">
                                    <input type="text" :name="'tax-' + props.item.id + '-rates[]'"
                                        class="w-100 border border-1 text-center rounded-0 rounded-start" placeholder="0"
                                        v-model="tax.rate" aria-label="Rate" aria-describedby="tax-addon1">
                                    <span
                                        class="bg-light rounded-0 rounded-end p-1 d-flex justify-content-center align-items-center text-dark fw-bold fs-5"
                                        id="tax-addon1">%</span>
                                </div>
                            </div>
                            <div class="">
                                <label class="form-label mb-0">Name</label>
                                <input type="text" :name="'tax-' + props.item.id + '-names[]'"
                                    class="w-100 border border-1 text-center p-1" placeholder="Tax Name" v-model="tax.name"
                                    aria-label="Tax Name">
                            </div>
                            <div class="w-50">
                                <label class="form-label mb-0">Number</label>
                                <input type="text" :name="'tax-' + props.item.id + '-numbers[]'"
                                    class="w-100 border border-1 text-center p-1" placeholder="Number" v-model="tax.number"
                                    aria-label="Tax Number">
                            </div>
                            <div class="align-self-end">
                                <span @click="deleteTaxItem(props.item.id, tax.id as number)"
                                    class="mdi mdi-trash-can-outline text-danger" style="cursor: pointer;"></span>
                            </div>
                        </div>

                        <div class='d-flex justify-content-center align-items-center gap-2 my-3'>
                            <button @click="toggleTaxPicker(props.item.id)" type="button"
                                class="btn btn-soft-info py-1">Close</button>
                            <button @click="addNewTaxItem(props.item.id)" type='button' class='btn btn-success py-1'>Add
                                New</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <input aria-label="item-qty" name="item_qtys[]" type="text" v-model="props.item.qty" class="d-inline-block"
                style="width: 3rem;" />
        </td>
        <td>
            <div class="d-flex align-items-start">
                <span class="me-2">Tk</span>
                <input aria-label="item-total" id="item-total-0" data-index="0" name="item_totals[]" type="text"
                    v-model="props.item.total" placeholder="00" class="d-inline-block" style="width: 7rem;" disabled />
                <span @click="deleteInvoiceItem(props.item.id)" data-index="0"
                    class="mdi mdi-trash-can-outline text-danger item-delete-btn"></span>
            </div>
        </td>
    </tr>
</template>

<script setup lang="ts">
import CloseIcon from './icons/CloseIcon.vue';
import { useInvoice } from '../composables/useInvoice';
import { watch} from 'vue';



const props = defineProps(['item'])



const {
    invoiceItems,
    deleteInvoiceItem,
    addNewTaxItem,
    deleteTaxItem } = useInvoice()


const toggleTaxPicker = (id: number) => {
    invoiceItems.value[id].isTaxActive = !invoiceItems.value[id].isTaxActive
}

    watch([()=> props.item.rate, ()=>props.item.qty],() => {
      props.item.total = props.item.rate * props.item.qty
    })


</script>

<style scoped></style>