import MultiPicturesCarousel from "./MultiPicturesCarousel";
import PictureCarousel from "./PictureCarousel";

import { NestedPicturesCarouselModel } from "../models/NestedPicturesCarousel";

const NestedPicturesCarousel = ({ items, name, height = 500, width = '100%', transform = 100 }: NestedPicturesCarouselModel) => {
    return (
        <>
            {items && <div className="nested-pictures-carousel w-full" style={{ background: 'none' }}>
                <div className="pictures-carousel w-full"
                    style={{ transform: 'translate(0px, ' + transform / 2 + 'px)' }}>
                    <PictureCarousel name={name} pictures={items[0]} height={height} width={width} />
                </div>
                <div className="multi-pictures-carousel w-full"
                    style={{
                        transform: 'translate(0px, -' + transform / 2 + 'px)',
                        background: 'none'
                    }}>
                    <MultiPicturesCarousel name={name} items={items.slice(1)} height={height / 2} width={width} />
                </div>
            </div>}
        </>
    );
}

export default NestedPicturesCarousel;