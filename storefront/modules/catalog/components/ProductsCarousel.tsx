import { useContext } from 'react';
import { Carousel } from 'react-bootstrap';
import { chunk } from 'lodash';
import { ThemeContext } from '@/context/ThemeContext';
import ProductCard from './ProductCard';
import { ProductsCarouselModel } from '../models/ProductsCarousel';
import { getColorCode } from '@/modules/common/services/ColorSchemeService';
import { ImageWrapper } from '@/common/components/common';

const ProductsCarousel = ({
    items,
    name,
    perSlide = 4,
    backgroundColor = 'transparent',
    title = null,
    titleColor = 'black',
    banner = null,
    bannerHeight = 50,
    bannerWidth = '100%'
}: ProductsCarouselModel) => {
    const listItems = chunk(items, perSlide);
    const theme = useContext(ThemeContext);

    return (
        <div style={{
            backgroundColor: getColorCode(backgroundColor, theme),
            borderRadius: 8
        }}>
            {banner &&
                <div className='flex items-center justify-center py-3'>
                    <ImageWrapper image={banner} style={{ width: bannerWidth, height: bannerHeight }} />
                </div>
            }
            {title && <div className='py-3'>
                <div className='text-3xl px-2 font-bold'
                    style={{ color: getColorCode(titleColor, theme) }}>{title}</div>
            </div>}
            <Carousel className='p-2' style={{
                backgroundColor: 'transparent',
                borderRadius: 8
            }}>
                {listItems.map((itemsPerSlide, slideIndex) => {
                    return (
                        <Carousel.Item key={"product_carousel_" + [name.replace("-", "_").toLowerCase(), slideIndex].join("_")}
                            style={{
                                backgroundColor: getColorCode(backgroundColor, theme)
                            }}>
                            <div className='row carousel-item-row' style={{
                                backgroundColor: getColorCode(backgroundColor, theme)
                            }}>
                                {
                                    itemsPerSlide.map((item, productPerSlideIndex) => {
                                        return (
                                            <ProductCard item={item}
                                                key={'product_item_' + [name.replace("-", "_").toLowerCase(), productPerSlideIndex, item.id].join("_")} />
                                        );
                                    })
                                }
                            </div>
                        </Carousel.Item>
                    );
                })}
            </Carousel >
        </div>
    );
}

export default ProductsCarousel;