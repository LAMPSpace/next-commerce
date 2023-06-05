import { StaticImageData } from 'next/image';

import default_image from './default_image.png';

import xiaomi_1 from './xiaomi_1.png';
import xiaomi_2 from './xiaomi_2.png';
import xiaomi_3 from './xiaomi_3.png';
import xiaomi_4 from './xiaomi_4.png';
import xiaomi_5 from './xiaomi_5.png';
import xiaomi_6 from './xiaomi_6.png';
import watch_1 from './watch_1.png';
import price_tag_1 from './price_tag_1.png';
import price_tag_2 from './price_tag_2.png';
import price_tag_3 from './price_tag_3.png';
import price_tag_4 from './price_tag_4.png';
import banner_ocb from './banner_ocb.png';
import banner_vib from './banner_vib.png';
import banner_2 from './banner_2.png';
import banner_3 from './banner_3.png';
import banner_1 from './banner_1.gif';
import blackfriday_4 from './blackfriday_4.gif';
import blackfriday_1 from './blackfriday_1.jpg';
import blackfriday_2 from './blackfriday_2.jpg';
import blackfriday_3 from './blackfriday_3.jpg';
import asus_1 from './asus_1.jpg';
import sony_1 from './sony_1.jpg';
import watch_2 from './watch_2.jpg';
import refrigerator_1 from './refrigerator_1.jpg';
import laptop_1 from './laptop_1.jpg';
import tv_1 from './tv_1.jpg';
import summersale_1 from './summersale_1.jpg';
import phone_1 from './phone_1.jpg';
import banner_hsbc from './banner_hsbc.jpg';
import banner_vcb from './banner_vcb.jpg';
import springsale_1 from './springsale_1.jpg';
import ad_1 from './ad_1.jpg';
import flashsale_1 from './flashsale_1.jpg';

type ListImages = {
    [key: string]: StaticImageData;
}

const listImages: ListImages = {
    default_image,
    blackfriday_1,
    blackfriday_2,
    blackfriday_3,
    blackfriday_4,
    refrigerator_1,
    laptop_1,
    tv_1,
    summersale_1,
    phone_1,
    xiaomi_1,
    xiaomi_2,
    xiaomi_3,
    xiaomi_4,
    xiaomi_5,
    xiaomi_6,
    watch_1,
    watch_2,
    sony_1,
    asus_1,
    price_tag_1,
    price_tag_2,
    price_tag_3,
    price_tag_4,
    banner_1,
    banner_2,
    banner_3,
    banner_hsbc,
    banner_ocb,
    banner_vib,
    banner_vcb,
    springsale_1,
    ad_1,
    flashsale_1
};

export default listImages;