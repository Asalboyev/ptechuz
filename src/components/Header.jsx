import React, { useContext, useEffect, useState } from "react";
import { getBanners } from "../services";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import AppContext from "../context";

const Header = () => {
  const [banners, setBanners] = useState([]);
  const { currentLang } = useContext(AppContext);

  const settings = {
    dots: true,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
  };

  useEffect(() => {
    const getAllBanners = async () => {
      const res = await getBanners();

      setBanners(res);
    };

    getAllBanners();
  }, []);

  return (
    <header id="header">
      <Slider {...settings}>
        {banners?.map((banner) => (
          <div key={banner.id} className="h-dvh relative">
            <img
              className="absolute top-0 left-0 w-full h-full object-cover -z-10"
              src={"https://admin.ptech.uz" + "/storage/" + banner.photo}
              alt="banner img"
            />

            <div className="headerWrapper absolute bottom-0 left-0 backdrop-blur-md bg-black/30 py-6 border-t border-white w-full">
              <div className="wrapper">
                <div className="headerContent flex items-center gap-4 text-white">
                  {/* <img src="/logo.svg" alt="ptech logo" /> */}
                  <div>
                    {/* <h1 className="exo2 font-semibold text-5xl">
                      Our expertise – your added value
                    </h1> */}

                    <p className="mt-4 text-2xl max-w-[1160px]">{banner.title[currentLang]}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ))}
      </Slider>
    </header>
  );
};

export default Header;
