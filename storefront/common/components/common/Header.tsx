import { Container, Navbar, Nav, Offcanvas } from 'react-bootstrap';
import { useContext } from 'react';
import { ThemeContext } from '@/context/ThemeContext';
import BrandIcon from './BrandIcon';
import IconLink from './IconLink';
import Search from '../../../modules/common/components/Search';
import { NestedDropdown } from "@/modules/common/components";
import { getColorCode, getVariant } from "@/modules/common/services/ColorSchemeService";
import { appName, navBarItems, navItems } from '@/common/constants/common';

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
            {navItem && navItem.type === 'nested-dropdown' &&
                <NestedDropdown title={navItem.title} link={navItem.link} />
            }
        </div>
    );
}

const Header = () => {
    const theme = useContext(ThemeContext);

    return (
        <div className="header"
            style={{ backgroundColor: getColorCode('primary', theme) }}
        >
            <Navbar expand={'lg'} variant={getVariant(theme)}>
                <Container fluid>
                    <Navbar.Brand href="/">
                        <BrandIcon iconColor={'background'} iconSize={50} />
                    </Navbar.Brand>
                    <Navbar.Toggle aria-controls={`offcanvasNavbar-expand-lg`} />
                    <Navbar.Offcanvas
                        id={`offcanvasNavbar-expand-lg`}
                        aria-labelledby={`offcanvasNavbarLabel-expand-lg`}
                        placement="end"
                    >
                        <Offcanvas.Header closeButton>
                            <Offcanvas.Title id={`offcanvasNavbarLabel-expand-lg`}>
                                <BrandIcon iconColor={'background'} iconSize={40} />
                                {appName}
                            </Offcanvas.Title>
                        </Offcanvas.Header>
                        <Offcanvas.Body>
                            {navBarItems.map((nav, index) => {
                                return (
                                    <Nav className={'justify-content-' + nav['justify'] + ' flex-grow-1 px-1'} key={'nav_' + index}>
                                        {nav['items'].map((item, itemIndex) => {
                                            return (
                                                <NavItem name={item} key={'nav_item_index_' + itemIndex} />
                                            );
                                        })}
                                    </Nav>
                                );
                            })}
                        </Offcanvas.Body>
                    </Navbar.Offcanvas>
                </Container>
            </Navbar>
        </div>
    );
}

export default Header;