import Link from "next/link";
import { useContext } from "react";
import { CategoryContext } from "@/context/CategoryContext";
import { ImageWrapper } from "@/common/components/common";
import { CustomSwiper, PictureCarousel, MegaMenu } from "@/modules/common/components";
import { BanneLeftModel, BanneRightModel, BannerMainModel } from "../models/Banner";
import { banner, getBannerCols } from "../services/BannerService";

const BannerMain = ({ banner }: BannerMainModel) => {
    return (
        <>
            {banner.content.main.type === "swiper" &&
                <div className="banner-part flex items-center justify-center">
                    <CustomSwiper
                        pictures={banner.content.main.pictures}
                        name="banner_main"
                        contentHeight={banner.height * 3 / 4}
                        paginationHeight={banner.height / 4}
                        pagination={banner.content.main.pagination}
                        centeredSlides={banner.content.main.centeredSlides}
                    />
                </div>
            }
            {banner.content.main.type === "carousel" &&
                <div className="banner-part flex items-center justify-center">
                    <PictureCarousel
                        pictures={banner.content.main.pictures}
                        height={banner.height}
                        showTitle={banner.content.main.showTitle} />
                </div>
            }
        </>
    );
}

const BannerLeft = ({ grid, height }: BanneLeftModel) => {
    const categories = useContext(CategoryContext);
    return (
        <MegaMenu items={categories} height={height} grid={grid} className={"banner-left"} />
    )
}

const BannerRight = ({ items, height, grid }: BanneRightModel) => {
    return (
        <div className={"banner-right col-" + grid.lg + " px-1"}
            style={{ zIndex: 100 }}>
            <div className="banner-part flex justify-center" style={{
                border: "1px solid lightgray",
                borderRadius: 8,
                height: height,
                overflowY: 'auto',
            }}>
                <div>
                    {items.map((item, index) => {
                        return (
                            <div style={{ borderRadius: 8, padding: 10 }} key={'banner_item_' + index}>
                                {item.link && <Link href={item.link}>
                                    <ImageWrapper image={item.image} alt={item.title} style={{ borderRadius: 8 }} />
                                </Link>}
                                {!item.link &&
                                    <ImageWrapper image={item.image} alt={item.title} style={{ borderRadius: 8 }} />}
                            </div>
                        );
                    })}
                </div>
            </div>
        </div>

    )
}

const Banner = () => {
    const mainBannerCols = getBannerCols(banner);

    return (
        <div className="banner flex-row items-center justify-center p-1">
            <div className="row"
                style={{ minHeight: banner.height }}>
                {banner.content.left.content &&
                    <BannerLeft height={banner.height} grid={banner.content.left.grid} />
                }
                <div className={"col-lg-" + mainBannerCols.lg + " col-md-" + mainBannerCols.md + " col-sm-12 px-1"}>
                    <BannerMain banner={banner} />
                </div>
                {banner.content.right.content &&
                    <BannerRight items={banner.content.right.content} grid={banner.content.right.grid} height={banner.height} />
                }
            </div>
        </div>
    );
}

export default Banner;