export type ProductModel = {
    id: number;
    category_id: number;
    brand_id: number;
    discount_id: number | null;
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