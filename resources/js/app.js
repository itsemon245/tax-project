import './bootstrap';

//for vue components
import { createApp } from 'vue';
import InvoiceCreateApp from './Vue/InvoiceCreateApp.vue'
import InvoiceEditApp from './Vue/InvoiceEditApp.vue'

const invoiceCreateApp = createApp(InvoiceCreateApp);
const invoiceEditApp = createApp(InvoiceEditApp);

invoiceCreateApp.mount('#invoice-create-app');
invoiceEditApp.mount('#invoice-edit-app');