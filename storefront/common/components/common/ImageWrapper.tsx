import { Image } from "react-bootstrap";
import { CSSProperties } from "react";
import clsx from 'clsx';
import listImages from "@/asset/images";

type Props = {
    image: string;
    className?: string;
    alt?: string;
    style?: CSSProperties;
}
const ImageWrapper = ({ image, className, alt, style }: Props) => {
    const imageSource: string = Object.keys(listImages).includes(image) ? image : 'default_image';
    return (
        <Image
            className={clsx(className)}
            src={listImages[imageSource].src}
            alt={alt}
            style={style}
        />
    );
}

export default ImageWrapper;