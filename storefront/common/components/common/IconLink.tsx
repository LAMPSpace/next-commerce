import Link from "next/link";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { navIconSize } from "@/common/constants/common";
import IconText from "./IconText";

type Props = {
    title: string;
    link: string;
}

const IconLink = ({ title, link }: Props) => {
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