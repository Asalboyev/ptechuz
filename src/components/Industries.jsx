import React, { useContext } from "react";
import Title from "./UI/Title";
import AppContext from "../context";
import { findTranslation } from "../methods";

const Industries = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  return (
    <>
      <section className="wrapper mt-16">
        <Title>
          {
            findTranslation("learning.title", allTranslations)?.val?.[
              currentLang
            ]
          }
        </Title>
        <p className="text-primary-content mt-4">
          {
            findTranslation("learning.desc", allTranslations)?.val?.[
              currentLang
            ]
          }
          <br /> <br />
          {
            findTranslation("learning.desc2", allTranslations)?.val?.[
              currentLang
            ]
          }
          <br /> <br />
          {
            findTranslation("learning.desc3", allTranslations)?.val?.[
              currentLang
            ]
          }
          <a
            className="ml-2 text-blue-500"
            href="https://www.openmind-tech.com/ru/cam/product-overview/"
          >
            https://www.openmind-tech.com/ru/cam/product-overview/
          </a>
        </p>

        <div className="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between items-center gap-4 mt-8 lg:mt-0">
          <div className="industryCard"></div>
          <div className="industryCard mt-0 lg:mt-20"></div>
          <div className="industryCard"></div>
          <div className="industryCard mt-0 lg:mt-20"></div>
        </div>
      </section>
    </>
  );
};

export default Industries;
