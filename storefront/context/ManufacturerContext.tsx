import { ManufacturerModel } from "@/modules/catalog/models/Manufacturer";
import { PropsWithChildren, createContext, useEffect, useState } from "react";
import { getData } from "@/modules/api/services/apiService";

export const ManufacturerContext = createContext<ManufacturerModel[]>([]);

export const ManufacturerProvider = ({ children }: PropsWithChildren) => {
    const [items, setItems] = useState<ManufacturerModel[]>([]);

    const params = {
        resource: 'manufacturers',
        params: [
            {
                key: 'sort-by',
                value: 'name'
            },
            {
                key: 'sort',
                value: 'asc'
            },
            {
                key: 'status',
                value: '1'
            },
            {
                key: 'per-page',
                value: 'all'
            }
        ]
    };

    useEffect(() => {
        getData(params['resource'], params['params']).then(
            (data) => { setItems(data.data); }
        );
    }, []);

    return (
        <ManufacturerContext.Provider value={items}>{children}</ManufacturerContext.Provider>
    )
};