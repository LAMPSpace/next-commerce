export type ProductModel = {
    uuid: string;
    category_uuid: string;
    brand_uuid: string;
    discount_uuid: string | null;
    status: number;
    name: string;
    summary: string;
    price: number;
    final_price: number;
    rating_star: number;
    cover_photo: {
        default: string,
        list_images: string[]
    },
    quantity: number,
    delete_at: null | Date
}