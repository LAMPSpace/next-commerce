import { Nav } from "react-bootstrap";
import Search from "../Search";
import { IconLink } from "@/modules/common/components";
import { navItems } from "@/common/constants/common";

type Props = {
    name: string;
}

const NavItem = ({ name }: Props) => {
    const navItem = navItems[name];
    return (
        <div className="d-flex align-items-center m-1">
            {navItem && navItem.type === 'link' &&
                <Nav.Link href={navItem.link}>{navItem.title}</Nav.Link>
            }
            {navItem && navItem.type === 'search' &&
                <Search />
            }
            {navItem && navItem.type === 'icon-link' &&
                <IconLink title={navItem.title} link={navItem.link} />
            }
        </div>
    );
}

export default NavItem;