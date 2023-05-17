import { LoadableComponent } from "next/dynamic";
import loadable from "@loadable/component";
import { IconBaseProps } from "react-icons/lib";
import { DynamicIconModel } from "../models/DynamicIcon";
import { getIconBackgroundColor, getIconName } from "../services/DynamicIconService";
import { getColorCode } from "../services/ColorSchemeService";

const DynamicIcon = ({ iconName, iconColor, iconSize, iconBackground }: DynamicIconModel) => {
    const iconProps: IconBaseProps = { size: iconSize };
    const name = getIconName(iconName);
    const lib = name.replace(/([a-z0-9])([A-Z])/g, '$1 $2').split(" ")[0].toLocaleLowerCase();
    const ElementIcon: LoadableComponent = loadable(() => import(`react-icons/${lib}/index.js`), {
        resolveComponent: (el: JSX.Element) => el[name as keyof JSX.Element]
    });
    return (
        <div className="flex items-center justify-center p-1"
            style={{
                color: getColorCode(iconColor),
                backgroundColor: iconBackground ? getIconBackgroundColor(iconColor) : 'transparent',
                borderRadius: 8,
            }}>
            <ElementIcon {...iconProps} />
        </div>
    );
}

export default DynamicIcon;