import Link from "next/link";
import BrandIcon from "./BrandIcon";
import { DynamicIcon } from "@/modules/common/components";
import { appName } from "@/common/constants/common";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";

const Footer = () => {
    return (
        <div className="footer grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1"
            style={{
                backgroundColor: getColorCode('black'),
                color: getColorCode('white')
            }}>
            <div className="flex items-center justify-center">
                <div className="p-5">
                    <Link href={'/'}>
                        <BrandIcon iconColor={'white'} iconSize={100} />
                        <span className="text-2xl">{appName}</span>
                    </Link>
                </div>
            </div>
            <div className="lg:col-span-2 flex items-center">
                <div className="grid lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1">
                    <div className="lg:col-span-2 p-5">
                        <div className="text-lg font-bold py-3">CONTACT US</div>
                        <div>123 Cong Hoa Street, Tan Binh District, Ho Chi Minh City</div>
                        <div>{`(028) 12345678`}</div>
                        <div>NextCommerce@email.com</div>
                    </div>
                    <div className="p-5">
                        <div className="text-lg font-bold py-3">FOLLOW US</div>
                        <div className="flex items-center justify-left">
                            <Link href={'https://vi-vn.facebook.com/'}>
                                <DynamicIcon iconName="facebook" iconBackground={false} iconColor={'white'} iconSize={40} />
                            </Link>
                            <Link href={'https://www.instagram.com/'}>
                                <DynamicIcon iconName="instagram" iconBackground={false} iconColor={'white'} iconSize={40} />
                            </Link>
                            <Link href={'https://twitter.com/?lang=vi'}>
                                <DynamicIcon iconName="twitter" iconBackground={false} iconColor={'white'} iconSize={40} />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Footer;