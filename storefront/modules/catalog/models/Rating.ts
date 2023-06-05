export type RatingModel = {
    value: number;
    name: string
    size?: number;
    disabled?: boolean;
}

export type RatingRenderValueModel = {
    [key: string]: number[];
}