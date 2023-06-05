import { PictureModel } from "@/modules/common/models/CustomSwiper";

export type ContentModel = {
    type: string;
    props: {
        name: string;
        items?: PictureModel[][];
        [key: string]: any;
    }
}