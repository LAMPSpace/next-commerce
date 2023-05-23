import { getColorCode, getVariant } from "@/modules/common/services/ColorSchemeService";
import { Spinner } from "react-bootstrap";

const Loading = () => {
    return (
        <div className="flex items-center justify-center page">
            <Spinner variant={getVariant()} />
            <div className="text-3xl px-2"
                style={{ color: getColorCode('foreground') }}>
                Loading ...
            </div>
        </div>
    );
}

export default Loading;