import Link from "next/link";
import { Carousel } from "react-bootstrap";
import { ImageWrapper } from "@/common/components/common";

import { MultiPicturesCarouselModel } from "../models/MultiPicturesCarousel";

const MultiPicturesCarousel = ({ items, name, height = 300, width = '100%' }: MultiPicturesCarouselModel) => {
    const getColumnSize = (slide: any[]) => {
        return 12 / slide.length;
    }
    return (
        <Carousel className="w-100" style={{ borderRadius: 8, background: 'none' }}>
            {items && items.map((slide, slideIndex) => {
                return (
                    <Carousel.Item style={{ height: height, width: width, borderRadius: 8 }}
                        key={'picture_carousel_slide_' + [name.replace(" ", "_").toLowerCase(), slideIndex].join('_')}>
                        <div className="flex items-center justify-center"
                            style={{ height: height, borderRadius: 8 }}>
                            <div className="row w-full" style={{ borderRadius: 8 }}>
                                {slide.map((picture, pictureIndex) => {
                                    let columnSize = getColumnSize(slide)
                                    return (
                                        <div className={"col-" + columnSize}
                                            key={'picture_carousel_slide_' + [name.replace(" ", "_").toLowerCase(), slideIndex, pictureIndex].join('_')}
                                            style={{ borderRadius: 8 }}>
                                            {picture.link &&
                                                <Link href={picture.link}>
                                                    <ImageWrapper
                                                        image={picture.image}
                                                        style={{ height: height, width: width, borderRadius: 8 }} />
                                                </Link>}
                                            {!picture.link &&
                                                <ImageWrapper
                                                    image={picture.image}
                                                    style={{ height: height, width: width, borderRadius: 8 }} />
                                            }
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                    </Carousel.Item>
                );
            })}
        </Carousel>
    );
}
export default MultiPicturesCarousel;