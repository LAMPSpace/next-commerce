import Link from "next/link";
import { Carousel } from "react-bootstrap";
import { ImageWrapper } from "@/common/components/common";
import { PictureCarouselModel } from "../models/PictureCarousel";

const PictureCarousel = ({ pictures, name, height, width = '100%', showTitle = false }: PictureCarouselModel) => {
    return (
        <Carousel className="w-100" style={{ borderRadius: 8, background: 'none' }}>
            {pictures.map((picture, index) => {
                return (
                    <Carousel.Item style={{ height: height, width: width }}
                        key={'picture_carousel_item_' + [name.replace(" ", "_").toLowerCase(), index].join("_")}>
                        <div className="flex items-center justify-center"
                            style={{ height: height }}>
                            {picture.link &&
                                <Link href={picture.link} className="w-full">
                                    <ImageWrapper
                                        image={picture.image}
                                        style={{ height: height, width: width, borderRadius: 8 }} />
                                </Link>}
                            {!picture.link &&
                                <ImageWrapper
                                    image={picture.image}
                                    style={{ height: height, width: width, borderRadius: 8 }} />
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