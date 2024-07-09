import React, { useContext } from "react";
import AppContext from "../../context";
import { findTranslation } from "../../methods";

const ContactCard = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  return (
    <div className="my-20 bg-primary rounded-lg p-8 flex lg:justify-between justify-center items-center flex-wrap gap-8">
      <div className="flex flex-wrap justify-center text-center lg:text-left items-center gap-4">
        <img src="/logo-contact.svg" alt="Ptech logo" />

        <div>
          <h5 className="text-white exo2 font-semibold text-2xl">
            {
              findTranslation("about.moreinformation", allTranslations)?.val?.[
                currentLang
              ]
            }
          </h5>
          {/* <p className="text-[#A3ADB7] mt-2">{
              findTranslation("about.weinsocial", allTranslations)?.val?.[
                currentLang
              ]
            }</p> */}
        </div>
      </div>

      <div className="flex gap-8 flex-wrap justify-center">
        <a href="mailto:sales@ptech.uz" className="text-white exo2 font-semibold text-2xl">
          sales@ptech.uz
        </a>
        <a href="tel:+998555011501" className="text-white exo2 font-semibold text-2xl">
          +998 55 501 15 01
        </a>
      </div>
    </div>
  );
};

export default ContactCard;
