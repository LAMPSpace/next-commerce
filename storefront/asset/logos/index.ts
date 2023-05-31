import { StaticImageData } from 'next/image';
import logo_apple from './logo_apple.png';
import logo_samsung from './logo_samsung.png';
import logo_sony from './logo_sony.png';
import logo_xiaomi from './logo_xiaomi.png';
import logo_dell from './logo_dell.png';
import logo_lg from './logo_lg.png';
import logo_msi from './logo_msi.png';
import logo_oppo from './logo_oppo.png';
import logo_vivo from './logo_vivo.png';

export type ListLogos = {
    [key: string]: StaticImageData;
}

const listLogos: ListLogos = {
    logo_apple,
    logo_samsung,
    logo_sony,
    logo_xiaomi,
    logo_dell,
    logo_lg,
    logo_msi,
    logo_oppo,
    logo_vivo
};

export default listLogos;