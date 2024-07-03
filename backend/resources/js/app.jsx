import './bootstrap';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import '../styles/index.css';
import i18n from '../../public/locales/i18n'; 
import { I18nextProvider } from 'react-i18next';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });
    return pages[`./Pages/${name}/${name}.jsx`];
  },
  setup({ el, App, props }) {
    createRoot(el).render(
      <I18nextProvider i18n={i18n}>
        <App {...props} />
      </I18nextProvider>
    );
  },
});
