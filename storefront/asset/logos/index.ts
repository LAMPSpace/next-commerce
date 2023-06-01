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
import logo_hp from './logo_hp.png';
import logo_jbl from './logo_jbl.png';
import logo_realme from './logo_realme.png';
import logo_asus from './logo_asus.png';
import logo_acer from './logo_acer.png';
import logo_lenovo from './logo_lenovo.png';

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
    logo_vivo,
    logo_realme,
    logo_hp,
    logo_jbl,
    logo_acer,
    logo_asus,
    logo_lenovo
};

export default listLogos;