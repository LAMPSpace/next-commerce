import Link from "next/link";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import ImageWrapper from "./ImageWrapper";


type ImageBadgeProps = {
    image: string;
    height: number;
    link?: string;
    className?: string;
}

type ListImageBadgeProps = {
    items: ImageBadgeProps[];
    name: string;
    height?: number;
    title?: string;
    titleColor?: string;
}

const ImageBadge = ({ image, height, link, className }: ImageBadgeProps) => {
    return link ? (
        <Link href={link}>
            <ImageWrapper className={"px-3 py-1 m-1 " + className} image={image} style={{
                height: height,
                borderRadius: height,
                border: '1px solid lightgray',
                display: 'inline-block'
            }} />
        </Link>
    ) : (
        <ImageWrapper className={"px-3 py-1 m-1 " + className} image={image} style={{
            height: height,
            borderRadius: height,
            border: '1px solid lightgray',
            display: 'inline-block'
        }} />
    );
}

export const ListImageBadges = ({ items, name, title, titleColor = 'foreground', height = 40 }: ListImageBadgeProps) => {
    const theme = useContext(ThemeContext);
    return (
        <div className="py-1" style={{
            borderRadius: 8,
            backgroundColor: getColorCode('background', theme)
        }}>
            {title && <div className='py-3'>
                <div className='text-3xl px-2 font-bold'
                    style={{ color: getColorCode(titleColor, theme) }}>{title}</div>
            </div>}
            <div>
                {items.map((item, index) => {
                    return (
                        <ImageBadge image={item.image} height={height} link={item.link} className={"hover-effect"} key={'home_brand_' + [name, index].join("_")} />
                    );
                })}
            </div>
        </div>
    );
}

export default ImageBadge;