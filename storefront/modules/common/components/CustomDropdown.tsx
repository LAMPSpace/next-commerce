import { useState } from "react";
import { ButtonGroup, Dropdown } from "react-bootstrap";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { navIconSize } from "@/common/constants/common";
import { IconText } from "@/common/components/common";
import { CustomDropdownModel, CustomDropdownItemModel } from "../models/CustomDropdown";
import { getColorCode } from "../services/ColorSchemeService";

const CustomDropdownItem = ({ item, theme }: CustomDropdownItemModel) => {
    const [color, setColor] = useState('foreground');
    return (
        <div className="col-span-1">
            {item.all_children.length === 0 &&
                <div className="dropdown-item-button">
                    <button
                        onMouseEnter={() => setColor('primary')}
                        onMouseLeave={() => setColor('foreground')}>
                        <IconText iconName={item.icon} justify="start" iconSize={navIconSize} text={item.name} color={color} />
                    </button>
                </div>
            }
            {item.all_children.length > 0 &&
                <>
                    <div className="text-md font-bold" style={{
                        color: getColorCode('primary', theme)
                    }}>{item.name}</div>
                    <>{item.all_children.map((child, index) => {
                        return (
                            <CustomDropdownItem item={child} theme={theme}
                                key={'custom_dropdown_item_level_' + [item.level, index].join("_")} />
                        );
                    })}</>
                </>
            }
        </div>
    );
}

const CustomDropdown = ({ item, drop = 'end' }: CustomDropdownModel) => {
    const theme = useContext(ThemeContext);
    const [show, setShow] = useState<boolean>(false);

    return (
        <Dropdown as={ButtonGroup} drop={drop} className="w-100"
            onMouseLeave={() => setShow(false)}
        >
            <Dropdown.Toggle id="btn-dropdown" variant="secondary" className="d-flex align-items-center border-none rounded-0 my-1"
                style={{
                    backgroundColor: show ? getColorCode('primary', theme) : getColorCode('backgroundColor', theme),
                    color: show ? getColorCode('backgroundColor', theme) : getColorCode('foreground', theme),
                }}
                onMouseEnter={() => setShow(true)}
            >
                <IconText iconName={item.icon} text={item.name} color={show ? 'background' : 'foreground'} iconSize={navIconSize} justify="start" />
            </Dropdown.Toggle>
            <Dropdown.Menu className="p-3" show={show} style={{
                backgroundColor: getColorCode('background', theme),
                boxShadow: "0px 8px 16px 0px " + getColorCode('foreground', theme) + '20'
            }}>
                <div className='grid grid-cols-3'
                    style={{ minWidth: 600 }}>
                    {item.all_children.map((child, index) => {
                        return (
                            <CustomDropdownItem item={child} theme={theme}
                                key={'custom_dropdown_' + index} />
                        )
                    })}
                </div>
            </Dropdown.Menu>
        </Dropdown>
    );
}

export default CustomDropdown;