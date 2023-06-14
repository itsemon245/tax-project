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
const InvoiceItems : Array<InvoiceItem>  = [
    {
        id: 1,
        name: "Item Name",
        description: null,
        rate: 0,
        qty: 1,
        total: 0,
        taxes: [
            {
                id: 1,
                rate: null,
                name: null,
                number: null,
            },
        ],
    },
];


export default InvoiceItems