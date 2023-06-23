import Link from "next/link";
import { useContext } from "react";
import { Card } from "react-bootstrap";
import { ThemeContext } from "@/context/ThemeContext";
import { TextBadge, IconTooltip, ImageWrapper } from "@/common/components/common";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";

import { ProductCardModel } from "../models/ProductCard";
import { currencyUnit } from "../services/ProductService";
import Rating from "./Rating";

const ProductCard = ({ item, height = 500 }: ProductCardModel) => {
    const theme = useContext(ThemeContext);
    return (
        <div className="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-3"
            style={{
                borderRadius: 8,
                backgroundColor: 'transparent',
                color: getColorCode('foreground', theme),
            }}>
            <Link href={`/products/${item.id}`}
                style={{
                    borderRadius: 8,
                }}>
                <Card className="hover-effect product-card" style={{
                    borderRadius: 8,
                    border: '1px solid lightgray',
                    color: getColorCode('foreground', theme),
                    backgroundColor: getColorCode('background', theme),
                    height: height,
                }}>
                    <ImageWrapper image={item.cover_photo.default} style={{
                        borderRadius: "8px 8px 0px 0px",
                        backgroundColor: 'transparent',
                        height: height * 3 / 5,
                        width: '100%'
                    }} />
                    <Card.Body>
                        <div className="px-1">
                            <Card.Title className="text-truncate">{item.name}</Card.Title>
                            <div className="flex items-center justify-start product-card-rating">
                                <div className="product-final-price text-lg">
                                    <div style={{
                                        fontWeight: 'bold',
                                        color: getColorCode('primary', theme)
                                    }}>{item.final_price + currencyUnit}</div>
                                </div>
                                {item.final_price !== item.price &&
                                    <div className="product-price text-sm pl-2">
                                        <div style={{
                                            textDecoration: 'line-through'
                                        }}>{item.price + currencyUnit}</div>
                                    </div>
                                }
                            </div>
                            <div className="flex product-badges py-1">
                                <TextBadge content="Freeship" size={12} color="primary" />
                            </div>
                        </div>
                        <div className="flex items-center justify-center product-card-rating">
                            <div className="mr-auto">
                                <Rating value={item.rating_star} name={(item.id).toString()} size={30} disabled />
                            </div>
                        </div>
                        <div className="flex items-center justify-center product-card-rating">
                            <div className="ml-auto">
                                <button>
                                    <IconTooltip color={'primary'} iconName="favorite-outline" iconSize={40} iconBackground={false} content="Favorite" placement="top" />
                                </button>
                                <button>
                                    <IconTooltip color={'primary'} iconName="add-to-cart" iconSize={40} iconBackground={false} content="Add to cart" placement="top" />
                                </button>
                            </div>
                        </div>
                    </Card.Body>
                    {item.final_price !== item.price &&
                        <div className="discount-tag w-full"
                            style={{
                                position: 'absolute',
                                transform: 'translate(1px, -15px)'
                            }}>
                            <ImageWrapper
                                image="price_tag_4"
                                alt="discount_tag"
                                style={{
                                    height: 60,
                                    marginLeft: 'auto'
                                }} />
                        </div>
                    }
                </Card>
            </Link>
        </div>
    );
}

export default ProductCard;