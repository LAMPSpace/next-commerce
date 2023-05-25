import { IconList } from "../models/DynamicIcon";
import { getColorCode } from "./ColorSchemeService";

const backgroundOpacity = '20';

const iconList: IconList = {
    'next-commerce': 'SiNextdotjs',
    'facebook': 'FaFacebook',
    'instagram': 'FaInstagram',
    'twitter': 'FaTwitter',
    'cart': 'RiShoppingCartFill',
    'login': 'FaUserCircle',
    'search': 'FaSearch',
    'orders': 'TbTruckDelivery',
    'stores': 'MdStore',
    'not-found': 'TbError404',
    'categories': 'MdCategory',
    'tooltip': 'IoMdInformationCircle',
    'light': 'MdLightMode',
    'dark': 'MdDarkMode',
    'right-arrow': 'MdKeyboardDoubleArrowRight'
}

export const getIconName = (iconName: string): string => {
    return Object.keys(iconList).includes(iconName) ? iconList[iconName] : iconName;
}

export const getIconBackgroundColor = (color: string | null, theme: string = 'light'): string => {
    return color && color !== null ? getColorCode(color, theme) + backgroundOpacity : 'transparent';
}