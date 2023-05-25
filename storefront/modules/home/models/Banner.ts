import { PictureModel } from "@/modules/common/models/CustomSwiper";

export type GridModel = {
    lg: number;
    md: number;
}

export type BannerModel = {
    height: number;
    content: {
        left: {
            content: boolean,
            grid: GridModel
        };
        main: {
            type: "swiper" | "carousel";
            pictures: PictureModel[];
            pagination?: 'title' | 'picture';
            centeredSlides?: boolean;
            showTitle?: boolean;
        };
        right: {
            content: PictureModel[] | null,
            grid: GridModel
        }
    };
}

export type BannerMainModel = {
    banner: BannerModel;
}

export type BanneLeftModel = {
    height: number;
    grid: GridModel;
}

export type BanneRightModel = {
    items: PictureModel[];
    height: number;
    grid: GridModel;
}
