import { ref, onMounted, onUnmounted, toRefs } from 'vue'
import data, { item } from '../data';

export function useAccounts(){
    const accounts = ref({
        subTotal: 0,
        discount: {
          percentage: 0,
          amount: 0,
        },
        total: 0,
        paid: 0,
        due: 0,
        notes:''
      })
    const { subTotal, discount, total, paid, due, notes } = toRefs(accounts.value)


    return { subTotal, discount, total, paid, due, notes }
}
