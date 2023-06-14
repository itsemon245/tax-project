import './bootstrap';

//for vue components
import { createApp } from 'vue';
import Invoice from './Vue/InvoiceApp.vue'

const app = createApp(Invoice);

app.mount('#invoice-vue-app');