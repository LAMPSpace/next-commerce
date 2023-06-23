import { BannerModel } from "./Banner";
import { ContentModel } from "./Content";

export type HomeSettingModel = {
    id: number;
    name: string;
    start_date: Date | null;
    end_date: Date | null;
    background_image: string | null;
    color: string;
    background_color: string;
    banner: BannerModel;
    content: ContentModel[];
}

export type AppHomeSettingModel = {
    homeSetting: HomeSettingModel;
}