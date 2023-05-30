import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { getBackgroundColor } from "@/modules/common/services/DynamicIconService";

type Props = {
    content: string;
    size: number;
    color: string;
    badgeBackground?: boolean;
}

const TextBadge = ({ content, size, color, badgeBackground = false }: Props) => {
    const theme = useContext(ThemeContext);
    return (
        <span className="truncate" style={{
            padding: '2px 5px 2px 5px',
            border: '1px solid ' + getColorCode(color, theme),
            borderRadius: 8,
            fontSize: size,
            color: getColorCode(color, theme),
            backgroundColor: badgeBackground ? getBackgroundColor(color, theme) : 'transparent'
        }}>{content}</span>
    );
}

export default TextBadge;