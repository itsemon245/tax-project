export interface InvoiceItem {
    id: number;
    baseId?: number;
    name: string | undefined | null;
    description: undefined | null | string;
    rate: number | undefined;
    qty: number;
    total: number | undefined;
    taxes: Array<{
        id: number | undefined | null;
        rate: number | undefined | null;
        name: string | undefined | null;
        number: number | undefined | null;
    }>;
    isTaxActive: boolean;
    tax: number | undefined;
}

export const item: InvoiceItem = {
    id: 0,
    name: "Item Name",
    description: undefined,
    rate: undefined,
    qty: 1,
    total: undefined,
    taxes: [
        {
            id: 0,
            rate: undefined,
            name: undefined,
            number: undefined,
        },
    ],
    isTaxActive: false,
    tax: undefined
}
const InvoiceItems : Array<InvoiceItem>  = [
    {
        ...item
    }
];


export default InvoiceItems
