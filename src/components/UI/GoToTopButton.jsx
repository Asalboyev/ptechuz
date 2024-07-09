import React, { useState, useEffect } from "react";

const GoToTopButton = () => {
  const [isVisible, setIsVisible] = useState(false);

  // Show button when page is scrolled down
  const toggleVisibility = () => {
    if (window.pageYOffset > 300) {
      setIsVisible(true);
    } else {
      setIsVisible(false);
    }
  };

  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  };

  useEffect(() => {
    window.addEventListener("scroll", toggleVisibility);
    return () => {
      window.removeEventListener("scroll", toggleVisibility);
    };
  }, []);

  return (
    <div>
      {isVisible && (
        <button
          onClick={scrollToTop}
          className="fixed bottom-3 right-3 p-3 px-5 text-lg bg-primary border-2 border-white text-white rounded-full cursor-pointer z-50"
        >
          <i className="fa-solid fa-arrow-up"></i>
        </button>
      )}
    </div>
  );
};

export default GoToTopButton;
