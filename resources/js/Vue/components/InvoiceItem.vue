<template>
    <tr>
        <th scope="row">{{ item?.id + 1 }}</th>
        <td>
            <div>
                <input aria-label="item-name" name="item_names[]" type="text" :value="item.name" />
                <input aria-label="item-descriptions" name="item_descriptions[]" type="text"
                    :placeholder="item.description + ' (optional)'" />
            </div>
        </td>
        <td>
            <span class="me-2">Tk</span>
            <input aria-label="item-rate" class="d-inline-block" name="item_rates[]" type="text" placeholder="00"
                :value="item?.rate" style="width: 6rem;" />
            <div class="tax-wrapper">
                <a @click="toggleTaxPicker" id="tax-picker-0" data-toggle="#tax-picker-container-0"
                    class="text-blue d-inline-block" tabindex="0" role="button">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <span class="mdi mdi-plus fs-5"></span>Taxes
                        </p>
                    </div>
                </a>
                <div ref="taxPicker" id="tax-picker-container-0" class="tax-container" :class="{ 'd-none': !isTaxActive }">
                    <h5 class="title">Add Taxes {{ item.id }}</h5>
                    <div class="px-2">
                        <div v-for="tax in item.taxes" :key="tax.id" class="d-flex align-items-center gap-1 mb-2">
                            <div class="w-50">
                                <label class="form-label mb-0">Rate</label>
                                <div class="d-flex">
                                    <input type="text" :name="'tax-'+tax.id+'-rates[]'"
                                        class="w-100 border border-1 text-center rounded-0 rounded-start" placeholder="0"
                                        :value="tax.rate" aria-label="Rate" aria-describedby="tax-addon1">
                                    <span
                                        class="bg-light rounded-0 rounded-end p-1 d-flex justify-content-center align-items-center text-dark fw-bold fs-5"
                                        id="tax-addon1">%</span>
                                </div>
                            </div>
                            <div class="">
                                <label class="form-label mb-0">Name</label>
                                <input type="text" :name="'tax-'+tax.id+'-names[]'" class="w-100 border border-1 text-center p-1"
                                    placeholder="Tax Name" :value="tax.name" aria-label="Tax Name">
                            </div>
                            <div class="w-50">
                                <label class="form-label mb-0">Number</label>
                                <input type="text" :name="'tax-'+tax.id+'-numbers[]'" class="w-100 border border-1 text-center p-1"
                                    placeholder="Number" :value="tax.number" aria-label="Tax Number">
                            </div>
                            <div class="align-self-end">
                                <span  @click="$emit('deleteTaxItem', item.id, tax.id)" class="mdi mdi-trash-can-outline text-danger"></span>
                            </div>
                        </div>
                        <button @click="$emit('addTaxItem', item.id)" type='button' class='border-1 rounded bg-transparent w-100 fw-bold'>Add a
                            line</button>
                        <div class='d-flex justify-content-center align-items-center gap-2 mt-2'>
                            <button @click="toggleTaxPicker" type="button"
                                class="btn btn-soft-success btn-sm rounded rounded-3">Close</button>
                            <button id="add-tax" type="button" class="btn btn-success rounded btn-sm rounded-3">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <input aria-label="item-qty" name="item_qtys[]" type="text" :value="item.qty" class="d-inline-block"
                style="width: 3rem;" />
        </td>
        <td>
            <div class="d-flex align-items-start">
                <span class="me-2">Tk</span>
                <input aria-label="item-total" id="item-total-0" data-index="0" name="item_totals[]" type="text"
                    :value="item.total" placeholder="00" class="d-inline-block" style="width: 7rem;" disabled />
                <span @click="$emit('deleteItem', item.id)"  data-index="0" class="mdi mdi-trash-can-outline text-danger item-delete-btn"
                    style="cursor: pointer;"></span>
            </div>
        </td>
    </tr>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
const props = defineProps(['item'])
defineEmits(['deleteItem', 'deleteTaxItem', 'addTaxItem'])

const isTaxActive = ref(false)

const toggleTaxPicker = () => isTaxActive.value = !isTaxActive.value
onMounted(() => {
    //   console.log(props.item);

})

</script>

<style scoped></style>