import React, { useContext, useEffect, useState } from "react";
import Title from "./UI/Title";
import ContactCard from "./UI/ContactCard";
import { getServices } from "../services";
import AppContext from "../context";
import { findTranslation } from "../methods";

const Services = () => {
  const [services, setServices] = useState([]);
  const { currentLang, allTranslations } = useContext(AppContext);

  useEffect(() => {
    const getAllServices = async () => {
      const res = await getServices();

      setServices(res);
    };

    getAllServices();
  }, []);
  return (
    <section id="services" className="wrapper">
      <Title>
        {findTranslation("services.title", allTranslations)?.val?.[currentLang]}
      </Title>

      <div className="grid xl:grid-cols-2 grid-cols-1 gap-6 mt-8">
        {services?.map((e) => (
          <div
            key={e.id}
            className="flex sm:flex-nowrap justify-center flex-wrap border border-[#EBEBEB] rounded-lg overflow-hidden shadow-sm"
          >
            <img
              className="rounded-lg sm:w-auto w-full min-w-[300px] h-[340px] object-cover"
              src={"https://admin.ptech.uz" + "/storage/" + e.photo}
              alt={e.title[currentLang]}
            />
            <div className="p-4 sm:p-6">
              <h5 className="exo2 font-semibold text-2xl text-primary">
                {e.title[currentLang]}
              </h5>
              <p
                dangerouslySetInnerHTML={{
                  __html: e.descriptions[currentLang],
                }}
                className="mt-4 text-primary-content"
              ></p>
            </div>
          </div>
        ))}
      </div>

      <div className="bg-[#A3ADB7] w-full h-[1px] my-20" />

      <div id="equipment" className="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div className="serviceBg rounded-lg h-[400px] flex flex-col justify-end p-8 text-white overflow-hidden">
          <h4 className="exo2 relative font-semibold text-2xl border-l-[6px] border-[#ffffff63] pl-2 max-w-[600px]">
          {findTranslation("serviceCards.text1", allTranslations)?.val?.[currentLang]}
          </h4>
        </div>

        <div className="serviceBg rounded-lg h-[400px] flex flex-col justify-end p-8 text-white overflow-hidden">
          <h4 className="exo2 relative font-semibold text-2xl border-l-[6px] border-[#ffffff63] pl-2 max-w-[600px]">
          {findTranslation("serviceCards.text2", allTranslations)?.val?.[currentLang]}
          </h4>
        </div>
      </div>

      <ContactCard />
    </section>
  );
};

export default Services;
