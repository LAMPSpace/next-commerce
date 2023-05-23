import { StaticImageData } from 'next/image';

import default_image from './default_image.png';

import xiaomi_1 from './xiaomi_1.png';
import xiaomi_2 from './xiaomi_2.png';
import xiaomi_3 from './xiaomi_3.png';
import xiaomi_4 from './xiaomi_4.png';
import xiaomi_5 from './xiaomi_5.png';
import xiaomi_6 from './xiaomi_6.png';
import watch_1 from './watch_1.png';
import blackfriday_1 from './blackfriday_1.jpg';
import blackfriday_2 from './blackfriday_2.jpg';
import blackfriday_3 from './blackfriday_3.jpg';
import refrigerator_1 from './refrigerator_1.jpg';
import laptop_1 from './laptop_1.jpg';
import tv_1 from './tv_1.jpg';
import summersale_1 from './summersale_1.jpg';
import phone_1 from './phone_1.jpg';

type ListImages = {
    [key: string]: StaticImageData;
}

const listImages: ListImages = {
    default_image,
    blackfriday_1,
    blackfriday_2,
    blackfriday_3,
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
};

export default listImages;