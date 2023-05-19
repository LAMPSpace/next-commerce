import Link from "next/link";
import { IconLinkModel } from "../models/IconLink";
import { getColorCode } from "../services/ColorSchemeService";
import { navIconSize } from "@/common/constants/common";
import IconText from "@/common/components/common/IconText";

const IconLink = ({ title, link }: IconLinkModel) => {
    return (
        <Link className="flex border-none rounded-md px-3 py-2"
            href={link}
            style={{
                color: getColorCode('background'),
                backgroundColor: getColorCode('primaryLight')
            }}>
            <IconText iconName={title.toLowerCase()} text={title} color="background" iconSize={navIconSize} justify="center" />
        </Link>
    );
}

export default IconLink;