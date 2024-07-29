// mouse.js
import { ref, onMounted, onUnmounted } from "vue";
import data, { item } from "../data";
import Swal from "sweetalert2";
import $ from "jquery";
import axios from "axios";
// by convention, composable function names start with "use"
export const invoiceItems = ref(data);
export function useInvoice() {
    // state encapsulated and managed by the composable

    // a composable can update its managed state over time.

    const addNewItem = () => {
        const newItem = JSON.parse(JSON.stringify(item));
        newItem.id = invoiceItems.value.length;
        newItem.taxes.pop();

        invoiceItems.value.push(newItem);
    };

    const deleteInvoiceItem = (id: number, mode) => {
        let isCreateMode = invoiceItems.value[id].baseId === undefined;

        if (isCreateMode) {
            invoiceItems.value.splice(id, 1);
            //rewrite the ids in ascending order
            invoiceItems.value.map((item, i) => {
                item.id = i;
            });
        }

        if (mode === true) {
            Swal.fire({
                title: "Do you want to delete this item?",
                showCancelButton: true,
                showConfirmButton: true,
                cancelButtonColor: "#1abc9c",
                confirmButtonColor: "#f1556c",
                confirmButtonText: "Delete",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let deletedItem = invoiceItems.value.splice(id, 1)[0];
                    //rewrite the ids in ascending order
                    invoiceItems.value.map((item, i) => {
                        item.id = i;
                    });
                    axios
                        .delete(
                            "/admin/invoice-item/delete/" + deletedItem.baseId,
                            {
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf_token"]'
                                    ).attr("content"),
                                },
                            }
                        )
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire(response.data.message, "", "success");
                            } else {
                                Swal.fire(response.data.message, "", "error");
                            }
                        });
                } else if (result.isDismissed) {
                    Swal.fire("No changes were made", "", "info");
                }
            });
        }else{
            Toast.fire({
                icon: "error",
                title: "Switch To Edit Mode"
            })
        }
        //delete the current index
    };

    const addNewTaxItem = (id: number) => {
        const newItem = JSON.parse(JSON.stringify(invoiceItems.value[id]));
        const newTaxItem = {
            id: newItem.taxes.length,
            rate: 0,
            name: undefined,
            number: 0,
        };
        newItem.taxes.push(newTaxItem);
        invoiceItems.value.splice(id, 1, newItem);
    };

    const deleteTaxItem = (id: number, taxId: number) => {
        //delete the current index
        invoiceItems.value[id].taxes.splice(taxId, 1);
        //remap tax ids
        invoiceItems.value[id].taxes.map((item, i) => {
            item.id = i;
        });
        calcTaxes(id);
    };

    const calcTaxes = (id: number) => {
        let totalTax = 0;
        let totalPrice = invoiceItems.value[id].total;
        invoiceItems.value[id].taxes.forEach((tax) => {
            let rate = (tax.rate as number) / 100;
            totalTax += totalPrice * rate;
        });
        invoiceItems.value[id].tax = parseFloat(totalTax.toFixed(2));
    };

    const toggleTaxPicker = (id: number) => {
        invoiceItems.value[id].isTaxActive =
            !invoiceItems.value[id].isTaxActive;
    };

    // expose managed state as return value
    return {
        invoiceItems,
        addNewItem,
        deleteInvoiceItem,
        addNewTaxItem,
        deleteTaxItem,
        calcTaxes,
        toggleTaxPicker,
    };
}
