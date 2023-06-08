import Head from "next/head";
import { useEffect, useState } from "react";
import Header from "./common/Header";
import Footer from "./common/Footer";
import { appName } from "../constants/common";
import { AppProvider } from "@/context/AppContext";
import { ThemeContext } from "@/context/ThemeContext";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";


type Props = {
    children: React.ReactNode;
};

const Layout = ({ children }: Props) => {
    const [theme, setTheme] = useState<string>('light');

    useEffect(() => {
        if (typeof window !== undefined) {
            let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? "dark" : "light";
            setTheme(currentTheme);
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                const newTheme = event.matches ? "dark" : "light";
                setTheme(newTheme)
            });
        }
    }, [])

    return (
        <ThemeContext.Provider value={theme}>
            <AppProvider >
                <Head>
                    <title>{appName}</title>
                    <meta name="description" content={appName + " storefront"} />
                    <link rel="icon" href="/favicon.ico" />
                </Head>
                <Header />
                <div className="body flex justify-center" style={{
                    backgroundColor: getColorCode('background', theme),
                    color: getColorCode('foreground', theme)
                }}>
                    {children}
                </div>
                <Footer />
            </AppProvider>
        </ThemeContext.Provider>
    );
}

export default Layout;