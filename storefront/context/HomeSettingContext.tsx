import { HomeSettingModel } from "@/modules/home/models/HomeSetting";
import { PropsWithChildren, createContext, useEffect, useState } from "react";
import { getData } from "@/modules/api/services/apiService";

export const HomeSettingContext = createContext<HomeSettingModel | undefined>(undefined);

export const HomeSettingProvider = ({ children }: PropsWithChildren) => {
    const [item, setItem] = useState<HomeSettingModel | undefined>();

    const params = {
        resource: 'current-home-setting',
        params: []
    };

    useEffect(() => {
        getData(params['resource'], params['params']).then(
            (data) => { setItem(data.data); }
        ).catch((err) => console.log(err));
    }, []);

    return (
        <HomeSettingContext.Provider value={item}>{children}</HomeSettingContext.Provider>
    )
};