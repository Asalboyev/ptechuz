import axios from "axios";

export const getBanners = async () => {
  const response = await axios.get(
    "https://admin.ptech.uz" + "/api/banners"
  );

  return response.data;
};

export const getPartners = async () => {
  const response = await axios.get(
    "https://admin.ptech.uz" + "/api/partners"
  );

  return response.data;
};

export const getLangs = async () => {
  const response = await axios.get("https://admin.ptech.uz" + "/api/langs");

  return response.data;
};

export const getPosts = async () => {
  const response = await axios.get("https://admin.ptech.uz" + "/api/posts");

  return response.data;
};

export const getServices = async () => {
  const response = await axios.get(
    "https://admin.ptech.uz" + "/api/services"
  );

  return response.data;
};

export const getTransations = async () => {
  const response = await axios.get(
    "https://admin.ptech.uz" + "/api/translations"
  );

  return response.data;
};

export const getTransationById = async (id) => {
  const response = await axios.get(
    "https://admin.ptech.uz" + "/api/translations/" + id
  );

  return response.data;
};

export const postForm = async (
  first_name,
  last_name,
  phone_number,
  email,
  company,
  descriptions
) => {
  const response = await axios.post(
    "https://admin.ptech.uz" + "/api/zayavkas",
    {
      first_name,
      last_name,
      phone_number,
      email,
      company,
      descriptions,
    }
  );

  return response;
};
