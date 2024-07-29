import { ref,toRefs } from 'vue'

export function useAccounts(){
    const accounts = ref({
        subTotal: 0,
        discount: {
          percentage: 0,
          amount: 0,
          isActive: false,
          isFixed: false
        },
        total: 0,
        paid: null as number | null,
        due: 0,
        notes:''
      })
    const { subTotal, discount, total, paid, due, notes } = toRefs(accounts.value)


    return { subTotal, discount, total, paid, due, notes }
}
