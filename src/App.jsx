import React, { useEffect, useState } from "react";
import Navbar from "./components/Navbar";
import Header from "./components/Header";
import About from "./components/About";
import Services from "./components/Services";
import Industries from "./components/Industries";
import News from "./components/News";
import Contact from "./components/Contact";
import Footer from "./components/Footer";
import GoToTopButton from "./components/UI/GoToTopButton";
import AppContext from "./context";
import { getTransations } from "./services";
import Partners from "./components/Partners";
import Advantages from "./components/Advantages";

const App = () => {
  const [currentLang, setLang] = useState("ru");
  const [allTranslations, setAllTranslations] = useState([]);

  useEffect(() => {
    const getAllTranslations = async () => {
      const res = await getTransations();

      setAllTranslations(res);
      console.log(res);
    };

    getAllTranslations();
  }, []);

  const value = { currentLang, setLang, allTranslations };

  return (
    <AppContext.Provider value={value}>
      <Navbar />
      <Header />
      <About />
      <Services />
      <Industries />
      <Partners />
      <Advantages />
      <News />
      <Contact />
      <Footer />

      <GoToTopButton />
    </AppContext.Provider>
  );
};

export default App;
