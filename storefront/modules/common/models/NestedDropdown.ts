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