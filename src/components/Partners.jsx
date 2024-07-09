import React, { useContext, useEffect, useState } from "react";
import AppContext from "../context";
import { getPartners } from "../services";
import Title from "./UI/Title";
import { findTranslation } from "../methods";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/free-mode";
import "swiper/css/pagination";

// import required modules
import { Autoplay, FreeMode, Pagination } from "swiper/modules";
import { useMediaQuery } from "react-responsive";

const Partners = () => {
  const [partners, setPartners] = useState([]);
  const { allTranslations, currentLang } = useContext(AppContext);
  const mediaSm = useMediaQuery({
    query: '(min-width: 640px)'
  })

  useEffect(() => {
    const getAllPartners = async () => {
      const res = await getPartners();

      setPartners(res);
    };

    getAllPartners();
  }, []);

  return (
    <div id="partners" className="mt-16">
      <div className="wrapper">
        <Title>
          {
            findTranslation("partners.title", allTranslations)?.val?.[
              currentLang
            ]
          }
        </Title>
      </div>

      <div className="w-[1550px] mx-auto mt-12">
        <Swiper
          slidesPerView={4}
          spaceBetween={!mediaSm ? -650 : -250}
          autoplay={{
            delay: 2000,
            disableOnInteraction: false,
            reverseDirection: true,
          }}
          loop={true}
          freeMode={true}
          pagination={false}
          modules={[FreeMode, Pagination, Autoplay]}
        >
          {partners?.map((partner) => (
            <SwiperSlide key={partner.id}>
              <a
                className="sm:w-[350px] sm:h-[350px] w-[250px] h-[250px] p-10 border rounded-full grid place-content-center"
                target="_blank"
                href={partner.link}
              >
                <img
                  className="inline-block  object-contain "
                  src={"https://admin.ptech.uz" + "/storage/" + partner.photo}
                  alt={partner.title.ru}
                />
              </a>
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </div>
  );
};

export default Partners;
