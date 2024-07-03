import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';
import global_en from '../locales/en/global.json';
import global_fr from '../locales/fr/global.json';

i18n.use(initReactI18next).init({
  resources: {
    en: { translation: global_en },
    fr: { translation: global_fr },
  },
  lng: 'en', // langue par défaut
  fallbackLng: 'en',
  interpolation: {
    escapeValue: false,
  },
});

export default i18n;