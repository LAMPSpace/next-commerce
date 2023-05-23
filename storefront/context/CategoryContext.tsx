import { NestedDropdownItemModel } from "@/modules/common/models/NestedDropdown";
import { PropsWithChildren, createContext, useEffect, useState } from "react";
import { getData } from "@/modules/api/services/apiService";
import { getNestedDropdownItem } from "@/modules/common/services/NestedDropdownService";

export const CategoryContext = createContext<NestedDropdownItemModel[]>([]);

export const CategoryProvider = ({ children }: PropsWithChildren) => {
    const [items, setItems] = useState<NestedDropdownItemModel[]>([]);

    const nestedDropdownItem = getNestedDropdownItem('categories');

    useEffect(() => {
        nestedDropdownItem !== null && getData(nestedDropdownItem['resource'], nestedDropdownItem['params']).then(
            (data) => { setItems(data.data); }
        );
    }, []);

    return (
        <CategoryContext.Provider value={items}>{children}</CategoryContext.Provider>
    )
};