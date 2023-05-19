import { CustomDropdownModel } from "../models/CustomDropdown";
import { getColorCode } from "../services/ColorSchemeService";
import { navIconSize } from "@/common/constants/common";
import IconText from "@/common/components/common/IconText";

const CustomDropdownItem = ({ item }: CustomDropdownModel) => {
    return (
        <div>
            {item.all_children.length === 0 &&
                <div className="dropdown-item-button">
                    <button>
                        <IconText iconName={item.icon} justify="start" iconSize={navIconSize} text={item.name} color="foreground" />
                    </button>
                </div>
            }
            {item.all_children.length > 0 &&
                <>
                    <div className="text-md font-bold" style={{
                        color: getColorCode('primary')
                    }}>
                        {item.name}
                    </div>

                    <>
                        {item.all_children.map((child, index) => {
                            return (
                                <CustomDropdownItem item={child}
                                    key={'custom_dropdown_item_level_' + [item.level, index].join("_")} />
                            );
                        })}
                    </>
                </>
            }
        </div>
    );
}

export default CustomDropdownItem;