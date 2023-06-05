import { Dispatch, SetStateAction } from "react";
import { NestedDropdownItemModel } from "./NestedDropdown";
import { GridModel } from "@/modules/home/models/Banner";

export type MegaMenuModel = {
    items: NestedDropdownItemModel[];
    height: number;
    grid: GridModel;
    className?: string;
}

export type MegaMenuButtonModel = {
    item: NestedDropdownItemModel;
    setItemShow: Dispatch<SetStateAction<NestedDropdownItemModel | null>>;
    color: string;
}

export type MegaMenuButtonDisplayModel = {
    item: NestedDropdownItemModel;
}

export type MegaMenuContentModel = {
    items: NestedDropdownItemModel[];
    theme: string;
    height: number;
    grid: GridModel;
    className?: string;
}

export type MegaMenuContentDisplayModel = {
    item: NestedDropdownItemModel;
    theme: string;
}