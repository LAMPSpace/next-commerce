import { BrandModel } from "@/modules/catalog/models/Brand";
import { PropsWithChildren, createContext, useEffect, useState } from "react";
import { getData } from "@/modules/api/services/apiService";

export const BrandContext = createContext<BrandModel[]>([]);

export const BrandProvider = ({ children }: PropsWithChildren) => {
    const [items, setItems] = useState<BrandModel[]>([]);

    const params = {
        resource: 'brands',
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
        <BrandContext.Provider value={items}>{children}</BrandContext.Provider>
    )
};