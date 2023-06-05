import { useEffect, useState } from "react";
import { RatingModel } from "../models/Rating";
import { getRatingRenderValue } from "../services/RatingService";
import { DynamicIcon } from "@/modules/common/components";
import { navIconSize } from "@/common/constants/common";

const Rating = ({ value, name, size = navIconSize, disabled = false }: RatingModel) => {
    const [rating, setRating] = useState(value);
    const ratingRenderValue = getRatingRenderValue(rating);
    useEffect(() => {
        setRating(value);
    }, [value])
    return (
        <div className="flex items-center">
            {
                Object.keys(ratingRenderValue).map((key, index) => {
                    return (
                        <div className="flex items-center" key={'rating_' + name + '_' + index}>
                            {ratingRenderValue[key].map((star) => {
                                return disabled ? (
                                    <span key={'rating_' + [name, index, star].join("_")}>
                                        <DynamicIcon
                                            iconName={'star-' + key}
                                            iconColor={'yellow'}
                                            iconBackground={false}
                                            iconSize={size}
                                        />
                                    </span>
                                ) : (
                                    <span onMouseEnter={() => setRating(star)} key={'rating_' + [name, index, star].join("_")}>
                                        <DynamicIcon
                                            iconName={'star-' + key}
                                            iconColor={'yellow'}
                                            iconBackground={false}
                                            iconSize={size}
                                        />
                                    </span>
                                );
                            })}
                        </div>
                    );
                })
            }
        </div>
    );
}

export default Rating;