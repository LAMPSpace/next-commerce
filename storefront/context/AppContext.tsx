import { createContext, PropsWithChildren } from 'react';
import { CategoryProvider } from './CategoryContext';
import { ManufacturerProvider } from './ManufacturerContext';
import { HomeSettingProvider } from './HomeSettingContext';

export const AppContext = createContext({});

export const AppProvider = ({ children }: PropsWithChildren<{}>) => {
    return (
        <HomeSettingProvider>
            <CategoryProvider>
                <ManufacturerProvider>
                    {children}
                </ManufacturerProvider>
            </CategoryProvider>
        </HomeSettingProvider>
    );
}

export default AppContext;