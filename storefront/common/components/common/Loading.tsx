import { getColorCode, getVariant } from "@/modules/common/services/ColorSchemeService";
import { Spinner } from "react-bootstrap";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";

const Loading = () => {
    const theme = useContext(ThemeContext);

    return (
        <div className="flex items-center justify-center page">
            <Spinner variant={getVariant(theme)} />
            <div className="text-3xl px-2"
                style={{ color: getColorCode('foreground', theme) }}>
                Loading ...
            </div>
        </div>
    );
}

export default Loading;