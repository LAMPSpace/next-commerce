import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { DynamicIcon } from "@/modules/common/components";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";

type Props = {
    text: string;
    iconName: string | null;
    color: string;
    iconSize?: number;
    justify: "start" | "end" | "center";
}

const IconText = ({ text, iconName, color, iconSize, justify }: Props) => {
    const theme = useContext(ThemeContext);
    return (
        <div className={"flex items-center py-1 w-full justify-" + justify}>
            {iconName &&
                <DynamicIcon iconName={iconName} iconBackground={false} iconColor={color} iconSize={iconSize} />
            }
            <span className='text-sm' style={{ color: getColorCode(color, theme) }}>{text}</span>
        </div>);
}

export default IconText;