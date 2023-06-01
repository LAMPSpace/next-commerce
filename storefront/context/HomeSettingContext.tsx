import { HomeSettingModel } from "@/modules/home/models/HomeSetting";
import { PropsWithChildren, createContext, useEffect, useState } from "react";
import { getData } from "@/modules/api/services/apiService";

export const HomeSettingContext = createContext<HomeSettingModel | undefined>(undefined);

export const HomeSettingProvider = ({ children }: PropsWithChildren) => {
    const [item, setItem] = useState<HomeSettingModel | undefined>();

    const params = {
        resource: 'home-settings',
        params: [
            {
                key: 'sort-by',
                value: 'start_date'
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
                value: '1'
            }
        ]
    };

    useEffect(() => {
        getData(params['resource'], params['params']).then(
            (data) => { setItem(data.data[0]); }
        );
    }, []);

    return (
        <HomeSettingContext.Provider value={item}>{children}</HomeSettingContext.Provider>
    )
};