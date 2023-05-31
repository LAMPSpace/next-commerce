import ImageWrapper from "./ImageWrapper";

type Props = {
    image: string;
    height: number;
}

const ImageBadge = ({ image, height }: Props) => {
    return (
        <ImageWrapper className="px-3 py-1 m-1" image={image} style={{
            height: height,
            borderRadius: height,
            border: '1px solid lightgray',
            display: 'inline-block'
        }} />
    );
}

export default ImageBadge;