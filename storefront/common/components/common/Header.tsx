import { Container, Navbar, Nav, Offcanvas } from 'react-bootstrap';
import BrandIcon from './BrandIcon';
import NavItem from './NavItem';
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { appName, navBarItems, navItemColor } from '@/common/constants/common';

const Header = () => {
    return (
        <div className="header"
            style={{ backgroundColor: getColorCode('primary') }}
        >
            <Navbar expand={'md'} variant='dark' className="">
                <Container fluid>
                    <Navbar.Brand href="/">
                        <BrandIcon iconColor={navItemColor} iconSize={50} />
                    </Navbar.Brand>
                    <Navbar.Toggle aria-controls={`offcanvasNavbar-expand-lg`} />
                    <Navbar.Offcanvas
                        id={`offcanvasNavbar-expand-lg`}
                        aria-labelledby={`offcanvasNavbarLabel-expand-lg`}
                        placement="end"
                    >
                        <Offcanvas.Header closeButton>
                            <Offcanvas.Title id={`offcanvasNavbarLabel-expand-lg`}>
                                <BrandIcon iconColor={navItemColor} iconSize={40} />
                                {appName}
                            </Offcanvas.Title>
                        </Offcanvas.Header>
                        <Offcanvas.Body>
                            {navBarItems.map((nav, index) => {
                                return (
                                    <Nav className={'justify-' + nav['justify'] + ' flex-grow-1 pe-3'} key={'nav_' + index}>
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