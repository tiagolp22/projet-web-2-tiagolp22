import React, { useState } from 'react';
import './Header.css';
import { Link } from '@inertiajs/react';
import LoginModal from '../Login/LoginModal';
import { useTranslation } from 'react-i18next';

function Header() {
  const [showModal, setShowModal] = useState(false); // État pour contrôler l'affichage du modal
  const { t, i18n } = useTranslation(); // Initialiser useTranslation

  const openModal = () => {
    setShowModal(true);
  };

  // Fonction pour changer la langue
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };

  return (
    <header className="custom-header">
    <div className="wrapper">
      <div className="header-content">
        <div className="logo-section">
          <Link href="/" className="logo">
            <img className="logo" src="../../img/logo/logo.png" alt="Logo QuebeCar" />
          </Link>
        </div>
        <div className="nav-section">
          <nav className="nav-links">
            <Link href="/" className="nav-link">{t('header.home')}</Link>
            <Link href="/voitures" className="nav-link">{t('header.catalogue')}</Link>
            <Link href="/about" className="nav-link">{t('header.about')}</Link>
            <Link href="/contact" className="nav-link">{t('header.contact')}</Link>
            <div className="icones">
              <a href="https://www.google.ca/maps/place/Coll%C3%A8ge+de+Maisonneuve/@45.5508613,-73.5558744,16z/data=!3m1!4b1!4m6!3m5!1s0x4cc91bf5bacbeffd:0x68ff300997eff5c!8m2!3d45.5508613!4d-73.5532995!16zL20vMDU3dHFx?hl=fr&entry=ttu" target="_blank" rel="noopener noreferrer">
                <img className="icones_navigation" src="../../img/icones/Location.png" alt="" />
              </a>
              <div className="dropdown">
                <button className="dropdown-button">
                  <img className="icones_navigation" src="../../img/icones/Profil.png" alt="" />
                </button>
                <div className="dropdown-content">
                  <button onClick={openModal} className="dropdown-button nav-link">{t('header.login')}</button> 
                  <Link href="/register" className="nav-link">{t('header.register')}</Link>
                </div>
              </div>
              <button className="language-button" onClick={() => changeLanguage('en')} aria-label="English">
                <img className="icones_navigation" src={i18n.language === 'en' ? "../../img/icones/Canada_active.png" : "../../img/icones/Canada.png"} alt="" />
              </button>
              <button className="language-button" onClick={() => changeLanguage('fr')} aria-label="Français">
                <img className="icones_navigation" src={i18n.language === 'fr' ? "../../img/icones/France_active.png" : "../../img/icones/France.png"} alt="" />
              </button>

            </div>
            <Link href="/login">
              <img className="icones_navigation" src="../../img/icones/Canada.png" alt="Drapeua do Canada" />
            </Link>
          </div>
        </div>
      </div>
      {showModal && <LoginModal onClose={() => setShowModal(false)} />} {/* Affiche le modal si showModal est true */}
    </header>

  );
}

export default Header;
