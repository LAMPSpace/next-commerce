import { NextPage } from "next";
import { useContext } from "react";
import { ThemeContext } from "@/context/ThemeContext";
import { HomeSettingContext } from "@/context/HomeSettingContext";
import { Banner, Content } from "@/modules/home/components";
import { getColorCode } from "@/modules/common/services/ColorSchemeService";
import { Loading } from "@/common/components/common";


const Home: NextPage = (props) => {
  const homeSetting = useContext(HomeSettingContext);
  const theme = useContext(ThemeContext);

  return (
    <>
      {!homeSetting && <Loading />}
      {homeSetting &&
        <>
          {!homeSetting.background_image &&
            <div className="container" style={{
              backgroundColor: getColorCode(homeSetting.background_color, theme),
              color: getColorCode(homeSetting.color, theme)
            }}>
              <Banner homeSetting={homeSetting} />
              <Content homeSetting={homeSetting} />
            </div>
          }
          {homeSetting.background_image &&
            <div className="container" style={{
              backgroundImage: 'url(' + homeSetting.background_image + ')',
              color: getColorCode(homeSetting.color, theme)
            }}>
              <Banner homeSetting={homeSetting} />
              <Content homeSetting={homeSetting} />
            </div>
          }
        </>
      }
    </ >
  )
}

export default Home;