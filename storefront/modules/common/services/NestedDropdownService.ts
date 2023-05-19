import { ParamModel } from "@/modules/api/models/Param";

type NestedDropdownItems = {
    [key: string]: {
        resource: string;
        params: ParamModel[]
    }
}

const nestedDropdownItems: NestedDropdownItems = {
    categories: {
        resource: 'categories',
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
                key: 'level',
                value: '1'
            },
            {
                key: 'per-page',
                value: 'all'
            }
        ]
    }
}

export const getNestedDropdownItem = (name: string) => {
    let key = name.toLowerCase();
    return Object.keys(nestedDropdownItems).includes(key) ? nestedDropdownItems[key] : null;
}