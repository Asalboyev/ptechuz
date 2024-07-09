import React, { useContext, useEffect, useState } from "react";
import { getLangs, getTransations } from "../services";
import AppContext from "../context";
import { findTranslation } from "../methods";

const Navbar = () => {
  const [languages, setLanguages] = useState([]);
  const { setLang, currentLang, allTranslations } = useContext(AppContext);

  const toggleMenu = () => {
    const nav = document.getElementById("navbar");

    nav.classList.toggle("active");
  };

  useEffect(() => {
    // Get langsF
    const getAllLangs = async () => {
      const res = await getLangs();

      setLanguages(res);
    };

    getAllLangs();
  }, []);

  return (
    <nav className="absolute left-0 top-0 w-full z-50">
      <div className="bg-light py-4">
        <div className="wrapper">
          <div
            id="navInfo"
            className="flex justify-between items-center text-dark"
          >
            <div className="flex items-center gap-6">
              <div className="langsModal relative">
                <div className="flex items-center gap-2 cursor-pointer font-medium min-w-[120px]">
                  {languages
                    .filter(
                      (s) => s.small.toLowerCase() === currentLang.toLowerCase()
                    )
                    .map((e) => (
                      <React.Fragment key={e.id}>
                        <img
                          width={25}
                          src={`/langs/${e.small}.svg`}
                          alt={e.lang}
                        />
                        {e.lang}
                        <i className="fa-solid fa-angle-down"></i>
                      </React.Fragment>
                    ))}
                </div>

                <ul className="opacity-0 absolute left-0 top-[150%] bg-white rounded-sm -z-10">
                  {languages?.map((e) => (
                    <li
                      onClick={() => setLang(e.small)}
                      key={e.id}
                      className={`flex hover:bg-light items-center gap-2 cursor-pointer font-medium p-2 ${
                        e.small === currentLang && "bg-light"
                      }`}
                    >
                      <img
                        width={25}
                        src={`/langs/${e.small}.svg`}
                        alt="uzbek"
                      />
                      {e.lang}
                    </li>
                  ))}
                </ul>
              </div>

              <div className="contact">
                <a
                  href="mailto:sales@ptech.uz"
                  className="border-l border-r border-[#EBEBEB] px-6 mr-2"
                >
                  sales@ptech.uz
                </a>

                <a href="tel:+998555011501">+998 55 501 15 01</a>
              </div>
            </div>

            {/* <div className="social flex gap-6">
              <a href="#">
                <i className="fa-brands fa-facebook text-primary text-lg"></i>
              </a>
              <a href="#">
                <i className="fa-brands fa-linkedin text-primary text-lg"></i>
              </a>
            </div> */}

            <button
              onClick={toggleMenu}
              className="hidden bg-primary p-2 px-4 rounded-xl"
            >
              <i className="fa-solid fa-bars text-xl text-white"></i>
            </button>
          </div>
        </div>
      </div>

      <div id="navbar" className="bg-white sticky overflow-auto top-0 w-full">
        <div className="wrapper">
          <nav className="flex items-center justify-between py-6">
            <img width={300} src="/logo.png" alt="PTech logo" />

            <ul className="gap-8 flex">
              <li>
                <a
                  className="text-lg text-dark hover:text-primary transition-colors"
                  href="#about"
                >
                  {
                    findTranslation("Navbar.link1", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </a>
              </li>

              <li>
                <a
                  className="text-lg text-dark hover:text-primary transition-colors"
                  href="#services"
                >
                  {
                    findTranslation("Navbar.link2", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </a>
              </li>

              <li>
                <a
                  className="text-lg text-dark hover:text-primary transition-colors"
                  href="#partners"
                >
                  {
                    findTranslation("Navbar.link3", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </a>
              </li>

              <li>
                <a
                  className="text-lg text-dark hover:text-primary transition-colors"
                  href="#contact"
                >
                  {
                    findTranslation("Navbar.link4", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
