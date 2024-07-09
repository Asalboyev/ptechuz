import React, { useContext } from "react";
import { findTranslation } from "../methods";
import AppContext from "../context";
import Title from "./UI/Title";

const Advantages = () => {
  const { allTranslations, currentLang } = useContext(AppContext);
  return (
    <div className="mt-16 wrapper">
      <Title>
        {
          findTranslation("advantages.title", allTranslations)?.val?.[
            currentLang
          ]
        }
      </Title>

      <div className="flex justify-center  flex-wrap lg:flex-nowrap mt-8 gap-6">
        <div className="p-4 flex items-center gap-4 rounded-md border border-[#EBEBEB] exo2 font-semibold text-sm w-full lg:max-w-[620  hover:bg-[#f5f5f5] bg-white transition-colors">
          <i className="bg-[#EBEBEB] p-4 rounded-lg fa-solid fa-file-lines"></i>
          <span>
            {
              findTranslation("advantages.card1", allTranslations)?.val?.[
                currentLang
              ]
            }
          </span>
        </div>

        <div className="p-4 flex items-center gap-4 rounded-md border border-[#EBEBEB] exo2 font-semibold text-sm w-full lg:max-w-[620  hover:bg-[#f5f5f5] bg-white transition-colors">
          <i className="bg-[#EBEBEB] p-4 rounded-lg fa-solid fa-file-invoice"></i>
          <span>
            {
              findTranslation("advantages.card2", allTranslations)?.val?.[
                currentLang
              ]
            }
          </span>
        </div>

        <div className="p-4 flex items-center gap-4 rounded-md border border-[#EBEBEB] exo2 font-semibold text-sm w-full lg:max-w-[620  hover:bg-[#f5f5f5] bg-white transition-colors">
          <i className="bg-[#EBEBEB] p-4 rounded-lg fa-solid fa-layer-group"></i>{" "}
          <span>
            {
              findTranslation("advantages.card3", allTranslations)?.val?.[
                currentLang
              ]
            }
          </span>
        </div>
      </div>
    </div>
  );
};

export default Advantages;
