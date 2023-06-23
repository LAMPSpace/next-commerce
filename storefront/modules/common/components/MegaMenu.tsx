import { useState, useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { HomeSettingContext } from "@/context/HomeSettingContext";
import {
    MegaMenuButtonModel,
    MegaMenuContentModel,
    MegaMenuModel,
    MegaMenuButtonDisplayModel,
    MegaMenuContentDisplayModel
} from "../models/MegaMenu";
import { NestedDropdownItemModel } from "../models/NestedDropdown";
import { getColorCode } from "../services/ColorSchemeService";
import { IconText } from "@/common/components/common";
import { navIconSize } from "@/common/constants/common";
import DynamicIcon from "./DynamicIcon";

const MegaMenuButton = ({ item, color, setItemShow }: MegaMenuButtonModel) => {

    return (
        <div className="w-full p-2" >
            <button className="w-full"
                onMouseEnter={() => setItemShow(item)}
            >
                <div className="flex items-center">
                    <div className="mr-auto">
                        <IconText
                            iconName={item.icon}
                            justify="start"
                            iconSize={navIconSize}
                            text={item.name}
                            color={color} />

                    </div>
                    <div className="ml-auto">
                        <DynamicIcon
                            iconName={'right-arrow'}
                            iconSize={navIconSize}
                            iconBackground={false}
                            iconColor={color} />
                    </div>
                </div>
            </button>
        </div>
    );
}

const MegaMenuButtonDisplay = ({ item }: MegaMenuButtonDisplayModel) => {

    return (
        <div className="w-full p-2">
            <button className="w-full">
                <IconText
                    iconName={item.icon}
                    justify="start"
                    iconSize={navIconSize}
                    text={item.name}
                    color={'transparent'} />
            </button>
        </div>
    );
}

const MegaMenuContent = ({ items, theme, height, grid, className }: MegaMenuContentModel) => {
    const homeSetting = useContext(HomeSettingContext);
    const color = homeSetting?.color ? homeSetting.color : 'foreground';
    const [itemShow, setItemShow] = useState<NestedDropdownItemModel | null>(null);

    const getButtonColor = (item: NestedDropdownItemModel): string => {
        return itemShow && itemShow.id === item.id ? 'background' : color;
    }

    return (
        <div className={"row pr-0 " + className}
            style={{ position: "absolute", maxWidth: 1536 }}
            onMouseLeave={() => setItemShow(null)}>
            <div className={"col-lg-" + grid.lg + " col-md-" + grid.md + " px-1"}
                style={{
                    height: height,
                    zIndex: 100
                }}>
                <div className="w-full p-1 hide-scroll"
                    style={{
                        borderRadius: 8,
                        height: height,
                        overflowY: 'auto'
                    }}>
                    <>
                        {items.length > 0 && items.map((item, index) => {
                            return (
                                <div className="my-2" key={'mega_menu_button_' + index}
                                    style={{
                                        backgroundColor: item === itemShow ? getColorCode('primary', theme) : 'transparent',
                                    }}>
                                    {item && <MegaMenuButton item={item} color={getButtonColor(item)} setItemShow={setItemShow} />}
                                </div>
                            );
                        })}
                    </>
                </div>
            </div>
            {(itemShow && itemShow.all_children.length > 0) && <div className={"col-lg-" + (12 - grid.lg) + " col-md-" + (12 - grid.md)}
                style={{
                    zIndex: 1000,
                    border: "1px solid lightgray",
                    borderRadius: 8,
                    height: height,
                    overflowY: 'auto',
                    backgroundColor: getColorCode('background', theme),
                    color: getColorCode('foreground', theme)
                }}>
                <div className="row p-3">
                    {itemShow.all_children.map((item, index) => {
                        return (
                            <div className="col-lg-4 col-md-6 col-sm-12" key={'mega_menu_content_' + index} >
                                <MegaMenuContentDisplay item={item} theme={theme} />
                            </div>
                        );
                    })}
                </div>
            </div>}
        </div>
    );
}

const MegaMenuContentDisplay = ({ item, theme }: MegaMenuContentDisplayModel) => {
    const [color, setColor] = useState('foreground');
    return (
        <>
            {item.all_children.length === 0 &&
                <div className="mega-menu-content-item w-full">
                    <button className="w-full"
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
                    <div className="w-full">
                        {item.all_children.map((child, index) => {
                            return (
                                <MegaMenuContentDisplay item={child} theme={theme}
                                    key={'mega_menu_content_item_level_' + [item.level, index].join("_")} />
                            );
                        })}
                    </div>
                </>
            }
        </>
    )
}

const MegaMenu = ({ items, height, grid, className }: MegaMenuModel) => {
    const theme = useContext(ThemeContext);

    return (
        <>
            <div className={"col-lg-" + grid.lg + " col-md-" + grid.md + " px-1 " + className} style={{ position: "relative" }}>
                <div className="banner-part hide-scroll p-1 w-full"
                    style={{
                        border: "1px solid lightgray",
                        borderRadius: 8,
                        height: height,
                        overflowY: 'auto',
                    }}>
                    <>
                        {items.length > 0 && items.map((item, index) => {
                            return (
                                <div className="my-2" key={'mega_button_display_' + index}>
                                    <MegaMenuButtonDisplay item={item} />
                                </div>
                            );
                        })}
                    </>
                </div>
            </div>
            <MegaMenuContent items={items} grid={grid} theme={theme} height={height} className={className} />
        </>
    );
}

export default MegaMenu;