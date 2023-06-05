import { PictureModel } from "./CustomSwiper"

export type MultiPicturesCarouselModel = {
    name: string;
    height?: number;
    width?: number | string;
    items?: PictureModel[][];
}