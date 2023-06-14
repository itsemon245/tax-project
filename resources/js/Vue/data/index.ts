interface InvoiceItem {
    id: number;
    name: string | null;
    description: null | string;
    rate: number | null;
    qty: number;
    total: number;
    taxes: Array<{
        id: number | null;
        rate: number | null;
        name: string | null;
        number: number | null;
    }>;
}

export const item: InvoiceItem = {
    id: 0,
    name: "Item Name",
    description: null,
    rate: 0,
    qty: 1,
    total: 0,
    taxes: [
        {
            id: 0,
            rate: null,
            name: null,
            number: null,
        },
    ],
}
const InvoiceItems : Array<InvoiceItem>  = [
    {
        ...item
    }
];


export default InvoiceItems