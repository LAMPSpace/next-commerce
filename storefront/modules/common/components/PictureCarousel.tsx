import Link from "next/link";
import { Carousel } from "react-bootstrap";
import ImageWrapper from "@/common/components/common/ImageWrapper";
import { PictureCarouselModel } from "../models/PictureCarousel";

const PictureCarousel = ({ pictures, height, showTitle = false }: PictureCarouselModel) => {
    return (
        <Carousel >
            {pictures.map(picture => {
                return (
                    <Carousel.Item style={{ height: height }}>
                        <div className="flex items-center justify-center"
                            style={{ height: height }}>
                            {picture.link &&
                                <Link href={picture.link}>
                                    <ImageWrapper
                                        image={picture.image}
                                        style={{ height: height }} />
                                </Link>}
                            {!picture.link &&
                                <ImageWrapper
                                    image={picture.image}
                                    style={{ height: height }} />
                            }
                            {showTitle &&
                                <Carousel.Caption>
                                    <h3>{picture.title}</h3>
                                    {picture.content &&
                                        <p>{picture.content}</p>}
                                </Carousel.Caption>
                            }
                        </div>
                    </Carousel.Item>
                );
            })}
        </Carousel>
    )
}

export default PictureCarousel;