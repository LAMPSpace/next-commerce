import { PictureModel } from "./CustomSwiper"

export type MultiPicturesCarouselModel = {
    name: string;
    height: number;
    width?: number | string;
    slides: PictureModel[][];
}