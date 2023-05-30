import { PictureModel } from "./CustomSwiper"

export type NestedPicturesCarouselModel = {
    name: string;
    height: number;
    width?: number | string;
    pictures: PictureModel[][];
    transform?: number;
}