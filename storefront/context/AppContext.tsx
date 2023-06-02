import { createContext, PropsWithChildren } from 'react';
import { CategoryProvider } from './CategoryContext';
import { BrandProvider } from './BrandContext';
import { HomeSettingProvider } from './HomeSettingContext';

export const AppContext = createContext({});

export const AppProvider = ({ children }: PropsWithChildren<{}>) => {
    return (
        <HomeSettingProvider>
            <CategoryProvider>
                <BrandProvider>
                    {children}
                </BrandProvider>
            </CategoryProvider>
        </HomeSettingProvider>
    );
}

export default AppContext;