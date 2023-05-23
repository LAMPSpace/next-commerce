import { PictureModel } from "./CustomSwiper"

export type PictureCarouselModel = {
    height: number;
    pictures: PictureModel[];
    showTitle?: boolean;
}