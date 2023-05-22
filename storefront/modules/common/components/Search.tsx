import { Form, InputGroup, Button } from "react-bootstrap";
import { DynamicIcon } from "@/modules/common/components";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { navIconSize } from "../../../common/constants/common";

const Search = () => {
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
                    backgroundColor: getColorCode('primaryLight'),
                    border: 'none'
                }}>
                    <DynamicIcon iconName='search' iconBackground={false} iconColor={'background'} iconSize={navIconSize} />
                </Button>
            </InputGroup>
        </Form>
    );
}

export default Search;