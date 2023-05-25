import { useState, useContext } from "react";
import Link from "next/link";
import SwiperCore, { EffectCoverflow, Pagination, Thumbs } from "swiper";
import { Swiper, SwiperSlide } from "swiper/react";
import { ThemeContext } from "@/context/ThemeContext";
import { ImageWrapper } from "@/common/components/common";
import { getColorCode } from "../services/ColorSchemeService";
import { CustomSwiperModel } from "../models/CustomSwiper";

SwiperCore.use([EffectCoverflow, Pagination]);

const CustomSwiper = ({
    pictures,
    name,
    contentHeight,
    pagination = 'picture',
    paginationHeight,
    centeredSlides,
}: CustomSwiperModel) => {
    const [thumbsSwiper, setThumbsSwiper] = useState<SwiperCore | null>(null);
    const [activeSlide, setActiveSlide] = useState(0);
    const theme = useContext(ThemeContext);
    const activeBorder = "2px solid " + getColorCode('primary', theme);

    return (
        <div className="images-swiper"
            style={{ width: '100%' }}>
            <Swiper
                effect={'coverflow'}
                grabCursor={true}
                centeredSlides={true}
                slidesPerView={"auto"}
                coverflowEffect={{
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                }}
                onSlideChange={(e) => setActiveSlide(e.activeIndex)}
                pagination={true}
                modules={[Thumbs]}
                thumbs={{ swiper: thumbsSwiper }}
                className={'images-swiper-content'}
                style={{ height: contentHeight }}
            >
                {pictures.map((picture, index) => {
                    return (
                        <SwiperSlide
                            style={{
                                height: contentHeight,
                                width: '100%'
                            }}
                            key={'picture_' + [picture, index].join('_')}>
                            {picture.link &&
                                <Link href={picture.link}>
                                    <ImageWrapper image={picture.image}
                                        alt={picture.title}
                                        style={{ height: contentHeight - 20 }} />
                                </Link>
                            }
                            {!picture.link &&
                                <ImageWrapper image={picture.image}
                                    alt={picture.title}
                                    style={{ height: contentHeight - 20 }} />
                            }
                        </SwiperSlide>
                    );
                })}
            </Swiper>
            <Swiper
                grabCursor={true}
                centeredSlides={centeredSlides}
                slidesPerView={4}
                spaceBetween={20}
                pagination={true}
                modules={[Thumbs]}
                watchSlidesProgress
                onSwiper={setThumbsSwiper}
                className={'images-swiper-pagination'}
                style={{ height: paginationHeight }}
            >
                {pictures.map((picture, index) => {
                    return (
                        <SwiperSlide
                            style={{
                                height: paginationHeight,
                                width: '100%'
                            }}
                            key={'pagination_' + [name.toLowerCase().replaceAll(' ', '_'), picture, index].join('_')}>
                            {pagination === "picture" &&
                                <ImageWrapper
                                    image={picture.image}
                                    alt={picture.title}
                                    style={{
                                        height: paginationHeight - 20,
                                        border: activeSlide === index ? activeBorder : 'none'
                                    }} />
                            }
                            {pagination === "title" &&
                                <div className="flex items-center justify-center"
                                    style={{
                                        height: paginationHeight - 20,
                                        borderBottom: activeSlide === index ? activeBorder : 'none',
                                        fontWeight: activeSlide === index ? 'bold' : 'normal'
                                    }}>
                                    <div>
                                        <div className="text-center text-sm">{picture.title}</div>
                                        {picture.content &&
                                            <div className="text-center text-sm">{picture.content}</div>
                                        }
                                    </div>
                                </div>
                            }
                        </SwiperSlide>
                    );
                })}
            </Swiper>
        </div>
    );
}

export default CustomSwiper;