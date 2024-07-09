import React, { useContext } from "react";
import Title from "./UI/Title";
import { postForm } from "../services";
import AppContext from "../context";
import { findTranslation } from "../methods";

const Contact = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  const submitForm = async (e) => {
    e.preventDefault();

    const first_name = e.target.first_name.value;
    const last_name = e.target.last_name.value;
    const phone_number = e.target.phone_number.value;
    const email = e.target.email.value;
    const company = e.target.company.value;
    const descriptions = e.target.descriptions.value;

    const res = await postForm(
      first_name,
      last_name,
      phone_number,
      email,
      company,
      descriptions
    );

    alert("Xabar jo'natildi!");

    e.target.reset();

    console.log(res);
  };

  return (
    <section id="contact" className="wrapper mt-20">
      <iframe
        className="border-none rounded-lg w-full h-[300px] sm:h-[500px]"
        src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5990.991142282984!2d69.263784!3d41.341581!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDIwJzI5LjciTiA2OcKwMTUnNDkuNiJF!5e0!3m2!1sen!2s!4v1720427079592!5m2!1sen!2s"
        loading="lazy"
        referrerPolicy="no-referrer-when-downgrade"
      ></iframe>

      <div className="mt-16">
        <Title>
          {
            findTranslation("Contacts.title", allTranslations)?.val?.[
              currentLang
            ]
          }
        </Title>

        <div className="flex flex-wrap md:flex-nowrap items-center gap-4 mt-8">
          <form onSubmit={submitForm} className="max-w-[720px] w-full">
            <div className="flex gap-4">
              <input
                name="first_name"
                required
                className="outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark"
                type="text"
                placeholder={
                  findTranslation("Form.firstname", allTranslations)?.val?.[
                    currentLang
                  ]
                }
              />
              <input
                name="last_name"
                required
                className="outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark"
                type="text"
                placeholder={
                  findTranslation("Form.lastname", allTranslations)?.val?.[
                    currentLang
                  ]
                }
              />
            </div>

            <input
              name="company"
              required
              className="my-6 outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark"
              type="text"
              placeholder={
                findTranslation("Form.company", allTranslations)?.val?.[
                  currentLang
                ]
              }
            />

            <div className="flex gap-4">
              <input
                name="email"
                required
                className="outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark"
                type="email"
                placeholder={
                  findTranslation("Form.email", allTranslations)?.val?.[
                    currentLang
                  ]
                }
              />
              <input
                name="phone_number"
                required
                className="outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark"
                type="tel"
                placeholder={
                  findTranslation("Form.phone", allTranslations)?.val?.[
                    currentLang
                  ]
                }
              />
            </div>

            <textarea
              name="descriptions"
              required
              rows={3}
              className="mt-6 outline-none border-b-2 py-2 w-full border-[#A3ADB7] focus:border-dark resize-none"
              placeholder={
                findTranslation("Form.message", allTranslations)?.val?.[
                  currentLang
                ]
              }
            ></textarea>

            <button
              type="submit"
              className="bg-primary text-white p-3 px-6 rounded-lg block ml-auto mt-4 hover:bg-primary/80 transition-colors"
            >
              {
                findTranslation("Contacts.sendbtn", allTranslations)?.val?.[
                  currentLang
                ]
              }{" "}
              <i className="fa-solid fa-arrow-right ml-2"></i>
            </button>
          </form>

          <div className="w-full border rounded-lg p-6">
            <div className="flex flex-wrap gap-6">
              <div className="max-w-[300px] w-full">
                {/* <span className="text-primary-content font-medium">
                  {
                    findTranslation("Contacts.addresstitle", allTranslations)
                      ?.val?.[currentLang]
                  }
                </span> */}
                <h6 className="mt-2">
                  {
                    findTranslation("Contacts.address", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </h6>
              </div>

              <div className="max-w-[300px] w-full">
                <span className="text-primary-content font-medium">
                {
                    findTranslation("Contacts.foryoutitle", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </span>
                <h6 className="mt-2">  {
                    findTranslation("Contacts.foryou", allTranslations)?.val?.[
                      currentLang
                    ]
                  }</h6>
              </div>

              <div className="max-w-[300px] w-full">
                <span className="text-primary-content font-medium">
                  {
                    findTranslation("Contacts.contact", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </span>
                <a href="tel:+998555011501" className="mt-2 block">+998 55 501 15 01</a>
              </div>

              <div className="max-w-[300px] w-full">
                <span className="text-primary-content font-medium">
                  {
                    findTranslation("Form.email", allTranslations)?.val?.[
                      currentLang
                    ]
                  }
                </span>

                <div className="mt-2">
                <a href="mailto:sales@ptech.uz" className="text-lg">sales@ptech.uz</a>
                </div>
              </div>
            </div>

            <img
            width={300}
              className="block ml-auto mt-10"
              src="/logo.png"
              alt="PTech logo"
            />
          </div>
        </div>
      </div>
    </section>
  );
};

export default Contact;
