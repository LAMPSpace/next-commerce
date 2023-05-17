import Link from "next/link";
import DynamicIcon from "./DynamicIcon";
import { IconLinkModel } from "../models/IconLink";
import { navItemColor, navIconSize } from "@/common/constants/common";
import { getColorCode } from "../services/ColorSchemeService";

const IconLink = ({ title, link }: IconLinkModel) => {
    return (
        <Link className="flex border-none rounded-md px-3 py-1"
            href={link}
            style={{
                color: navItemColor,
                backgroundColor: getColorCode('primaryLight')
            }}>
            <div>
                <DynamicIcon iconName={title.toLowerCase()} iconBackground={false} iconColor={navItemColor} iconSize={navIconSize} />
                <span className="text-sm">{title}</span>
            </div>
        </Link>
    );
}

export default IconLink;