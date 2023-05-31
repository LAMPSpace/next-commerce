import { Image } from "react-bootstrap";
import { CSSProperties } from "react";
import clsx from 'clsx';
import asset from "@/asset";

type Props = {
    image: string;
    className?: string;
    alt?: string;
    style?: CSSProperties;
}

const ImageWrapper = ({ image, className, alt, style }: Props) => {
    const imageSource: string = Object.keys(asset).includes(image) ? image : 'default_image';
    return (
        <Image
            className={clsx(className)}
            src={asset[imageSource].src}
            alt={alt}
            style={style}
        />
    );
}

export default ImageWrapper;