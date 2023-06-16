// mouse.js
import { ref, onMounted, onUnmounted } from "vue";
import data, { item } from "../data";

// by convention, composable function names start with "use"
export function useInvoice() {
    // state encapsulated and managed by the composable
    const invoiceItems = ref(data);

    // a composable can update its managed state over time.

    const addNewItem = () => {
        const newItem = { ...item };
        newItem.id = invoiceItems.value.length;

        invoiceItems.value.push(newItem);
    };

    const deleteInvoiceItem = (id: number) => {
        //delete the current index
        invoiceItems.value.splice(id, 1);

        //rewrite the ids in ascending order
        invoiceItems.value.map((item, i) => {
            item.id = i;
        });
    };

    const addNewTaxItem = (id: number) => {
        // const newItem = { ...item }
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
        calcTaxes(id)
    };

    const calcTaxes = (id: number) => {
        let totalTax = 0;
        let totalPrice = invoiceItems.value[id].total;
        invoiceItems.value[id].taxes.forEach((tax) => {
            let rate = (tax.rate as number) / 100;
            totalTax += totalPrice * rate;
        });
        invoiceItems.value[id].tax = parseFloat(totalTax.toFixed(2));
        toggleTaxPicker(id);
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
