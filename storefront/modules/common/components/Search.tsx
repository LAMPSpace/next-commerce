import { Form, InputGroup, Button } from "react-bootstrap";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { DynamicIcon } from "@/modules/common/components";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { navIconSize } from "../../../common/constants/common";

const Search = () => {
    const theme = useContext(ThemeContext);

    return (
        <Form className="d-flex">
            <InputGroup>
                <Form.Control
                    size="lg"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                />
                <Button style={{
                    backgroundColor: getColorCode('primaryLight', theme),
                    border: 'none'
                }}>
                    <DynamicIcon iconName='search' iconBackground={false} iconColor={'background'} iconSize={navIconSize} />
                </Button>
            </InputGroup>
        </Form>
    );
}

export default Search;