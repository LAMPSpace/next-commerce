import Head from "next/head";
import Header from "./common/Header";
import Footer from "./common/Footer";
import { appName } from "../constants/common";

type Props = {
    children: React.ReactNode;
};

const Layout = ({ children }: Props) => {
    return (
        <>
            <Head>
                <title>{appName}</title>
                <meta name="description" content={appName + " storefront"} />
                <link rel="icon" href="/favicon.ico" />
            </Head>
            <Header />
            <div className="body">
                {children}
            </div>
            <Footer />
        </>
    );
}

export default Layout;