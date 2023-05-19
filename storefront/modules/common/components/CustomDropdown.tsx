import { ButtonGroup, Dropdown } from "react-bootstrap";
import { navIconSize } from "@/common/constants/common";
import IconText from "@/common/components/common/IconText";
import CustomDropdownItem from "./CustomDropdownItem";
import { CustomDropdownModel } from "../models/CustomDropdown";
import { getColorCode } from "../services/ColorSchemeService";

const CustomDropdown = ({ item }: CustomDropdownModel) => {
    return (
        <Dropdown as={ButtonGroup} drop="end" className="w-100">
            <Dropdown.Toggle id="nested-dropdown" className="d-flex align-items-center border-none rounded-0"
                style={{
                    backgroundColor: getColorCode('background'),
                    color: getColorCode('foreground'),
                }}>
                <IconText iconName={item.icon} text={item.name} color={'foreground'} iconSize={navIconSize} justify="start" />
            </Dropdown.Toggle>
            <Dropdown.Menu className="p-3" style={{
                backgroundColor: getColorCode('background'),
            }}>
                <div className='grid grid-cols-3'
                    style={{ minWidth: 600 }}>
                    {item.all_children.map((child, index) => {
                        return (
                            <CustomDropdownItem item={child}
                                key={'custom_dropdown_' + index} />
                        )
                    })}
                </div>
            </Dropdown.Menu>
        </Dropdown>
    );
}

export default CustomDropdown;