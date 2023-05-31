import { createContext, PropsWithChildren } from 'react';
import { CategoryProvider } from './CategoryContext';
import { ManufacturerProvider } from './ManufacturerContext';

export const AppContext = createContext({});

export const AppProvider = ({ children }: PropsWithChildren<{}>) => {
    return (
        <CategoryProvider>
            <ManufacturerProvider>
                {children}
            </ManufacturerProvider>
        </CategoryProvider>
    );
}

export default AppContext;