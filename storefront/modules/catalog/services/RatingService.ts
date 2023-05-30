import { round } from "lodash";
import { RatingRenderValueModel } from "../models/Rating";

export const getRatingRenderValue = (value: number): RatingRenderValueModel => {
    let stars = [1, 2, 3, 4, 5]
    let mod = value % 1;
    let half = mod > 0 && mod <= 0.5 ? 1 : 0;
    let fill = mod > 0 && mod <= 0.5 ? value - mod : round(value);
    return {
        fill: stars.slice(0, fill),
        half: stars.slice(fill, fill + half),
        outline: stars.slice(fill + half)
    }
}