import { BannerModel } from "../models/Banner";

export const getBannerCols = (banner: BannerModel) => {
    let bannerCols = {
        lg: 12,
        md: 12
    };
    if (banner.content.left.content !== false) {
        bannerCols.lg -= banner.content.left.grid.lg;
        bannerCols.md -= banner.content.left.grid.md;
    }
    if (banner.content.right.content !== null) {
        bannerCols.lg -= banner.content.right.grid.lg;
    }
    return bannerCols;
}