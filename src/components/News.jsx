import React, { useContext, useEffect, useState } from "react";
import Title from "./UI/Title";
import { getPosts } from "../services";
import AppContext from "../context";
import { findTranslation } from "../methods";
import SingleNews from "./SingleNews";

const News = () => {
  const { allTranslations, currentLang } = useContext(AppContext);

  const [news, setNews] = useState([]);
  const [isNewsOpen, setNewsOpen] = useState(false);
  const [newsImg, setNewsImg] = useState("");
  const [newsDesc, setNewsDesc] = useState("");

  const onViewNews = (img, desc) => {
    setNewsOpen(true);
    setNewsImg(img);
    setNewsDesc(desc);
  };

  useEffect(() => {
    const getAllPosts = async () => {
      const res = await getPosts();

      setNews(res);
    };

    getAllPosts();
  }, []);
  return (
    <>
      <section id="news" className="mt-16 wrapper">
        <Title>
          {findTranslation("news.title", allTranslations)?.val?.[currentLang]}
        </Title>

        <div className="flex items-center justify-center gap-4 mt-8 flex-wrap">
          {news?.map((e) => (
            <div key={e.id} className="max-w-[340px] w-full mt-4">
              <img
                className="rounded-lg h-[235px] w-full object-cover"
                src={"https://admin.ptech.uz" + "/storage/" + e.photo}
                alt="news img"
              />

              <p className="text-[#5D5D5F] my-2">{e.created_at.slice(0, 10)}</p>

              <h4
                onClick={() => onViewNews(e.photo, e.descriptions)}
                className="block text-dark font-medium hover:text-primary-content min-h-[80px] cursor-pointer"
              >
                <p className="line-clamp-3">{e.title[currentLang]}</p>
              </h4>
            </div>
          ))}
        </div>
      </section>

      {/* View news */}
      {isNewsOpen && (
        <SingleNews
          img={newsImg}
          desc={newsDesc[currentLang]}
          setOpen={setNewsOpen}
        />
      )}
    </>
  );
};

export default News;
