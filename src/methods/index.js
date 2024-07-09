export const findTranslation = (key, array) => {
  return array?.find((item) => item.key === key);
};
