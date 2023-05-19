import { useEffect, useState } from "react";
import { ButtonGroup, Dropdown } from "react-bootstrap";
import CustomDropdown from "./CustomDropdown";
import { NestedDropdownModel, NestedDropdownItemModel } from "../models/NestedDropdown";
import { getNestedDropdownItem } from "../services/NestedDropdownService";
import { getColorCode } from "../services/ColorSchemeService";
import { getData } from "@/modules/api/services/apiService";
import { navIconSize } from "@/common/constants/common";
import IconText from "@/common/components/common/IconText";

const NestedDropdown = ({ title, link }: NestedDropdownModel) => {
    const [items, setItems] = useState<NestedDropdownItemModel[]>([]);

    const nestedDropdownItem = getNestedDropdownItem(title);

    useEffect(() => {
        nestedDropdownItem !== null && getData(nestedDropdownItem['resource'], nestedDropdownItem['params']).then(
            (data) => { setItems(data.data); }
        );
    }, []);

    return (
        <>
            {items.length > 0 &&
                <Dropdown as={ButtonGroup}>
                    <Dropdown.Toggle id="nested-dropdown" className="d-flex align-items-center border-none py-2"
                        style={{ backgroundColor: getColorCode('primaryLight'), color: getColorCode('background') }}>
                        <IconText iconName={title.toLowerCase()} text={title} color="background" iconSize={navIconSize} justify="start" />
                    </Dropdown.Toggle>

                    <Dropdown.Menu style={{ backgroundColor: getColorCode('background') }}>
                        {items.map((item, index) => {
                            return item.all_children.length > 0 ? (
                                <CustomDropdown item={item} drop={'end'} key={'nested_dropdown_' + index} />
                            ) : (
                                <Dropdown.Item style={{ backgroundColor: getColorCode('background') }} key={'nested_dropdown_' + index}>
                                    <IconText iconName={item.icon} text={item.name} color="foreground" iconSize={navIconSize} justify="start" />
                                </Dropdown.Item>
                            );
                        })}
                    </Dropdown.Menu>
                </Dropdown >
            }
        </>
    );
}

export default NestedDropdown;