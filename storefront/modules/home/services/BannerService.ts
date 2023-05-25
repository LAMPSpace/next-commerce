import { BannerModel } from "../models/Banner";

export const banner: BannerModel = {
    height: 500,
    content: {
        left: {
            content: true,
            grid: {
                lg: 2,
                md: 3
            }
        },
        main: {
            type: "swiper",
            pictures: [
                {
                    image: 'blackfriday_1',
                    title: 'Black Friday Super Sale 1',
                    content: 'Black Friday Super Sale Content 1'
                },
                {
                    image: 'sony_1',
                    title: 'Sony',
                    content: 'High Definition. It is in your DNA'
                },
                {
                    image: 'blackfriday_2',
                    title: 'Black Friday Super Sale 2',
                    content: 'Black Friday Super Sale Content 2'
                },
                {
                    image: 'watch_2',
                    title: 'Titan watch',
                    content: 'Titan watch'
                },
                {
                    image: 'blackfriday_3',
                    title: 'Black Friday Super Sale 3',
                    content: 'Black Friday Super Sale Content 3'
                },
                {
                    image: 'asus_1',
                    title: 'Laptop ASUS',
                    content: 'Laptop ASUS'
                },
            ],
            pagination: 'title'
        },
        right: {
            content: [
                {
                    image: 'tv_1',
                    title: 'TV 1',
                },
                {
                    image: 'laptop_1',
                    title: 'Laptop 1',
                },
                {
                    image: 'refrigerator_1',
                    title: 'Refrigerator 1',
                },
                {
                    image: 'watch_1',
                    title: 'Watch 1',
                },
                {
                    image: 'phone_1',
                    title: 'Phone 1',
                },
                {
                    image: 'summersale_1',
                    title: 'Summer Sale 1',
                },
            ],
            grid: {
                lg: 2,
                md: 0
            }
        },
    }
}

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