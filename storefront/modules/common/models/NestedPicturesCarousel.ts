import { PictureModel } from "./CustomSwiper"

export type NestedPicturesCarouselModel = {
    name: string;
    height?: number;
    width?: number | string;
    items?: PictureModel[][];
    transform?: number;
}