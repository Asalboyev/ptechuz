import React, { useContext } from "react";
import Title from "./UI/Title";
import ContactCard from "./UI/ContactCard";
import AppContext from "../context";
import { findTranslation } from "../methods";

const About = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  return (
    <section id="about" className="mt-16 wrapper">
      <div
        className="flex justify-between items-center flex-wrap gap-6"
      >
        <Title>
          {findTranslation("about.title", allTranslations)?.val?.[currentLang]}
        </Title>

        <img width={300} className="mt-8" src="/logo.png" alt="PTech logo" />
      </div>

      <p className="text-primary-content mt-8">
        {findTranslation("about.desc1", allTranslations)?.val?.[currentLang]}
        <br /> <br />
        {findTranslation("about.desc2", allTranslations)?.val?.[currentLang]}
      </p>

      {/* <div className="flex justify-center flex-wrap lg:flex-nowrap mt-8 gap-6">
        <div className="p-6 rounded-md border border-[#EBEBEB] bg-[#f5f5f5] exo2 font-semibold text-lg w-full lg:max-w-[620px]  hover:bg-white transition-colors">
          {findTranslation("about.card1", allTranslations)?.val?.[currentLang]}
        </div>

        <div className="p-6 rounded-md border border-[#EBEBEB] bg-[#f5f5f5] exo2 font-semibold text-lg w-full lg:max-w-[620px]  hover:bg-white transition-colors">
          {findTranslation("about.card2", allTranslations)?.val?.[currentLang]}
        </div>

        <div className="p-6 rounded-md border border-[#EBEBEB] bg-[#f5f5f5] exo2 font-semibold text-lg w-full lg:max-w-[620px]  hover:bg-white transition-colors">
          {findTranslation("about.card3", allTranslations)?.val?.[currentLang]}
        </div>
      </div> */}

      <ContactCard />
    </section>
  );
};

export default About;
