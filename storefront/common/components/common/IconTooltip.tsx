import { Tooltip, OverlayTrigger } from "react-bootstrap";
import { Placement } from "react-bootstrap/esm/types";
import { DynamicIcon } from "@/modules/common/components";

type Props = {
    placement?: Placement;
    iconName?: string;
    content: string;
    color?: string | null;
    iconSize?: number;
    iconBackground?: boolean;
}

const IconTooltip = ({ placement, iconName, content, color, iconSize, iconBackground }: Props) => {
    return (
        <OverlayTrigger
            placement={placement ? placement : 'auto'}
            overlay={
                <Tooltip id={`tooltip`}>
                    {content}
                </Tooltip>
            }
        >
            <span className="flex items-center">
                <DynamicIcon iconName={iconName ? iconName : 'tooltip'} iconBackground={iconBackground ? iconBackground : false} iconColor={color ? color : null} iconSize={iconSize} />
            </span>
        </OverlayTrigger>
    );
}

export default IconTooltip;