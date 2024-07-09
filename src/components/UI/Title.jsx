import React from "react";

const Title = ({ children }) => {
  return (
    <h2 className="text-4xl exo2 text-primary border-l-[6px] border-[#A3ADB7] pl-4 font-semibold">
      {children}
    </h2>
  );
};

export default Title;
