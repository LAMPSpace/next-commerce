import { useContext } from "react";
import { BrandContext } from "@/context/BrandContext";
import { NestedPicturesCarousel, MultiPicturesCarousel } from "@/modules/common/components";
import { PictureModel } from "@/modules/common/models/CustomSwiper";
import { ProductsCarousel } from "@/modules/catalog/components";
import { ListImageBadges } from "@/common/components/common";
import { getItemsByConstant, exampleProducts } from "../services/ContentService";
import { AppHomeSettingModel } from "../models/HomeSetting";

type PicturesContentItemProps = {
    type: string;
    props: {
        items?: PictureModel[][];
        name: string;
        [key: string]: any;
    };
}

const PicturesContentItem = ({ type, props }: PicturesContentItemProps) => {
    const colSize: string = props.col ? ['col-lg-' + props.col, 'col-md-' + props.col, 'col-sm-12', 'col-xs-12'].join(' ') : 'col-12';
    return (
        <div className={colSize + ' py-1'}>
            {
                (type === 'multi_pictures_carousel' && props.items) &&
                <MultiPicturesCarousel {...props} />
            }
            {
                (type === 'nested_pictures_carousel' && props.items) &&
                <NestedPicturesCarousel {...props} />
            }
        </div>
    );
}

type OtherContentItemProps = {
    type: string;
    props: {
        name: string;
        [key: string]: any;
    };
    items: any[];
}

const OtherContentItem = ({ type, props, items }: OtherContentItemProps) => {
    return (
        <div className="w-full py-1">
            {
                (type === 'products_carousel' && items) &&
                <ProductsCarousel {...props} items={items} />
            }
            {
                (type === 'list_image_badges' && items) &&
                <ListImageBadges {...props} items={items} />
            }
        </div>
    );
}

const Content = ({ homeSetting }: AppHomeSettingModel) => {
    const brands = useContext(BrandContext);
    const products = exampleProducts;

    return (
        <div className="content flex items-center justify-center p-2">

            <div className="row">
                {
                    homeSetting.content.map((item, index) => {
                        return item.props.items !== undefined ? (
                            <PicturesContentItem
                                type={item.type}
                                props={item.props}
                                key={item.type + "_" + index} />
                        ) : (
                            <OtherContentItem
                                type={item.type}
                                props={item.props}
                                items={eval(getItemsByConstant(item.props.name))}
                                key={item.type + "_" + index} />
                        );
                    })
                }
            </div>
        </div>
    );
}

export default Content;