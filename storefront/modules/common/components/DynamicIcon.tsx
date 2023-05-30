import { LoadableComponent } from "next/dynamic";
import loadable from "@loadable/component";
import { IconBaseProps } from "react-icons/lib";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { DynamicIconModel } from "../models/DynamicIcon";
import { getBackgroundColor, getIconName } from "../services/DynamicIconService";
import { getColorCode } from "../services/ColorSchemeService";

const DynamicIcon = ({ iconName, iconColor, iconSize, iconBackground }: DynamicIconModel) => {
    const theme = useContext(ThemeContext);

    const iconProps: IconBaseProps = { size: iconSize };
    const name = getIconName(iconName);
    const lib = name.replace(/([a-z0-9])([A-Z])/g, '$1 $2').split(" ")[0].toLocaleLowerCase();
    const ElementIcon: LoadableComponent = loadable(() => import(`react-icons/${lib}/index.js`), {
        resolveComponent: (el: JSX.Element) => el[name as keyof JSX.Element]
    });
    return (
        <div className="flex items-center justify-center p-1"
            style={{
                color: getColorCode(iconColor, theme),
                backgroundColor: iconBackground ? getBackgroundColor(iconColor, theme) : 'transparent',
                borderRadius: 8,
            }}>
            <ElementIcon {...iconProps} />
        </div>
    );
}

export default DynamicIcon;