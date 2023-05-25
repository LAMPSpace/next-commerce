import { useContext } from "react";
import { ButtonGroup, Dropdown } from "react-bootstrap";
import { ThemeContext } from "@/context/ThemeContext";
import { CategoryContext } from "@/context/CategoryContext";
import CustomDropdown from "./CustomDropdown";
import { NestedDropdownModel, NestedDropdownItemModel } from "../models/NestedDropdown";
import { getColorCode } from "../services/ColorSchemeService";
import { navIconSize } from "@/common/constants/common";
import { IconText } from "@/common/components/common";

const NestedDropdown = ({ title, link }: NestedDropdownModel) => {
    const items: NestedDropdownItemModel[] = useContext<NestedDropdownItemModel[]>(CategoryContext);
    const theme = useContext(ThemeContext);

    return (
        <>
            {items.length > 0 &&
                <Dropdown as={ButtonGroup}>
                    <Dropdown.Toggle id="nested-dropdown" className="d-flex align-items-center border-none py-2"
                        style={{ backgroundColor: getColorCode('primaryLight', theme), color: getColorCode('background', theme) }}>
                        <IconText iconName={title.toLowerCase()} text={title} color="background" iconSize={navIconSize} justify="start" />
                    </Dropdown.Toggle>

                    <Dropdown.Menu style={{
                        backgroundColor: getColorCode('background', theme),
                        boxShadow: "0px 8px 16px 0px " + getColorCode('foreground', theme) + '20'
                    }}>
                        {items.map((item, index) => {
                            return item.all_children.length > 0 ? (
                                <CustomDropdown item={item} drop={'end'} key={'nested_dropdown_' + index} />
                            ) : (
                                <Dropdown.Item style={{ backgroundColor: getColorCode('background', theme) }} key={'nested_dropdown_' + index}>
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