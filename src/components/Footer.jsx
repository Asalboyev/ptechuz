import React, { useContext } from "react";
import AppContext from "../context";
import { findTranslation } from "../methods";

const Footer = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  return (
    <footer className="mt-20 bg-primary py-6">
      <div className="wrapper">
        <div className="flex justify-between flex-wrap gap-6">
          <div className="max-w-[300px] mx-auto w-full">
            {/* <span className="text-white font-medium">
              {" "}
              {
                findTranslation("Contacts.addresstitle", allTranslations)
                  ?.val?.[currentLang]
              }
            </span> */}
            <h6 className="mt-2 text-white">
              {
                findTranslation("Contacts.address", allTranslations)?.val?.[
                  currentLang
                ]
              }
            </h6>
          </div>

          <div className="max-w-[300px] mx-auto w-full">
            <span className="text-white font-medium">
              {
                findTranslation("Contacts.foryoutitle", allTranslations)?.val?.[
                  currentLang
                ]
              }
            </span>
            <h6 className="mt-2 text-white">
              {" "}
              {
                findTranslation("Contacts.foryou", allTranslations)?.val?.[
                  currentLang
                ]
              }
            </h6>
          </div>

          <div className="max-w-[300px] mx-auto w-full">
            <span className="text-white font-medium">
              {
                findTranslation("Contacts.contact", allTranslations)?.val?.[
                  currentLang
                ]
              }
            </span>
            <a href="tel:+998555011501" className="text-white mt-2 block">+998 55 501 15 01</a>
          </div>

          <div className="max-w-[300px] mx-auto w-full">
            <span className="text-white font-medium">
              {" "}
              {
                findTranslation("Form.email", allTranslations)?.val?.[
                  currentLang
                ]
              }
            </span>
            <div className="mt-2">
              <a href="mailto:sales@ptech.uz" className="text-white text-lg">sales@ptech.uz</a>
            </div>
          </div>
        </div>

        <div className="text-white border-t pt-6 mt-8">
          <h6>
            {
              findTranslation("Contacts.rights", allTranslations)?.val?.[
                currentLang
              ]
            }
          </h6>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
