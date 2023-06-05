import { PictureModel } from "./CustomSwiper"

export type PictureCarouselModel = {
    name: string;
    height: number | string;
    width?: number | string;
    pictures: PictureModel[];
    showTitle?: boolean;
}