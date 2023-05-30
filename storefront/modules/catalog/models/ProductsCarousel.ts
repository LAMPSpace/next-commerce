import { ProductModel } from "./Product"

export type ProductsCarouselModel = {
    items: ProductModel[];
    name: string;
    perSlide?: number;
    backgroundColor?: string;
    title?: string | null;
    titleColor?: string;
    banner?: string | null;
    bannerHeight?: number;
    bannerWidth?: number | string;
}