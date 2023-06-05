import { ParamModel } from "@/modules/api/models/Param";

export type NestedDropdownModel = {
    title: string;
    link: string;
}

export type NestedDropdownItemModel = {
    name: string;
    icon: string | null;
    level: number;
    all_children: NestedDropdownItemModel[];
    [key: string]: any;
}

export type NestedDropdownItemsListModel = {
    [key: string]: {
        resource: string;
        params: ParamModel[]
    }
}