export type CustomSwiperModel = {
    pictures: PictureModel[];
    name: string;
    contentHeight: number;
    pagination?: 'picture' | 'title';
    paginationHeight: number;
    centeredSlides?: boolean;
}

export type PictureModel = {
    image: string;
    title: string;
    content?: string;
    link?: string;
}