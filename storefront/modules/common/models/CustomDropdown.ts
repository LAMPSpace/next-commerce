import { DropDirection } from "react-bootstrap/esm/DropdownContext";
import { NestedDropdownItemModel } from "./NestedDropdown";

export type CustomDropdownModel = {
    item: NestedDropdownItemModel;
    drop: DropDirection | undefined;
}

export type CustomDropdownItemModel = {
    item: NestedDropdownItemModel;
    theme: string;
}