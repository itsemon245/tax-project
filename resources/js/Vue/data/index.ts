interface InvoiceItem {
    id: number;
    name: string | undefined | null;
    description: undefined | null | string;
    rate: number | undefined | null;
    qty: number;
    total: number;
    taxes: Array<{
        id: number | undefined | null;
        rate: number | undefined | null;
        name: string | undefined | null;
        number: number | undefined | null;
    }>;
}

export const item: InvoiceItem = {
    id: 0,
    name: "Item Name",
    description: undefined,
    rate: 0,
    qty: 1,
    total: 0,
    taxes: [
        {
            id: 0,
            rate: undefined,
            name: undefined,
            number: undefined,
        },
    ],
}
const InvoiceItems : Array<InvoiceItem>  = [
    {
        ...item
    }
];


export default InvoiceItems