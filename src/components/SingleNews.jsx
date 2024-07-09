import React from "react";

const SingleNews = ({ img, desc, setOpen }) => {
  return (
    <div className="p-4 bg-white fixed left-0 top-0 w-full h-full z-50 overflow-y-auto">
      <button
        onClick={() => setOpen(false)}
        type="submit"
        className="mb-4 bg-primary text-white p-3 px-6 rounded-lg block ml-auto mt-4 hover:bg-primary/80 transition-colors"
      >
        <i className="fa-solid fa-x"></i>
      </button>

      <div dangerouslySetInnerHTML={{ __html: desc }}></div>

      <img
        className="w-full mt-4 rounded-sm object-cover max-h-[800px]"
        src={"https://admin.ptech.uz" + "/storage/" + img}
        alt="news image"
      />
    </div>
  );
};

export default SingleNews;
