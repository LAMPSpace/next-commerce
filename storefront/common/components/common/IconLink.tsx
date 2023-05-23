import Link from "next/link";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { navIconSize } from "@/common/constants/common";
import IconText from "./IconText";

type Props = {
    title: string;
    link: string;
}

const IconLink = ({ title, link }: Props) => {
    const theme = useContext(ThemeContext);

    return (
        <Link className="flex border-none rounded-md px-3 py-2"
            href={link}
            style={{
                color: getColorCode('background', theme),
                backgroundColor: getColorCode('primaryLight', theme)
            }}>
            <IconText iconName={title.toLowerCase()} text={title} color="background" iconSize={navIconSize} justify="center" />
        </Link>
    );
}

export default IconLink;