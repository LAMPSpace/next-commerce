import Head from "next/head";
import { useState } from "react";
import Header from "./common/Header";
import Footer from "./common/Footer";
import { appName } from "../constants/common";
import { CategoryProvider } from "@/context/CategoryContext";
import { ThemeContext } from "@/context/ThemeContext";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";


type Props = {
    children: React.ReactNode;
};

const Layout = ({ children }: Props) => {
    const [theme, setTheme] = useState<string>('light');

    return (
        <ThemeContext.Provider value={theme}>
            <CategoryProvider >
                <Head>
                    <title>{appName}</title>
                    <meta name="description" content={appName + " storefront"} />
                    <link rel="icon" href="/favicon.ico" />
                </Head>
                <Header />
                <div className="body" style={{
                    backgroundColor: getColorCode('background', theme),
                    color: getColorCode('foreground', theme)
                }}>
                    {children}
                </div>
                <Footer setTheme={setTheme} />
            </CategoryProvider>
        </ThemeContext.Provider>
    );
}

export default Layout;