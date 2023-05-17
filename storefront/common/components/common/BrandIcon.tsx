import { DynamicIcon } from "@/modules/common/components";

type Props = {
    iconColor: string | null;
    iconSize: number | undefined;
}

const BrandIcon = ({ iconColor, iconSize }: Props) => {
    return (
        <DynamicIcon
            iconName={'next-commerce'}
            iconColor={iconColor}
            iconSize={iconSize}
            iconBackground={false} />
    );
}

export default BrandIcon;