import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Footer.css';

function Footer() {
  return (
    <footer className="footer">
      <div className="footer-content">
         <div className="footer-column">
             <img className='logo' src="../../../img/logo/logo.png" alt="logo"  />
        </div>
        <div className="footer-column">
          <h4>Rechercher</h4>
          <InertiaLink href="/search" className="footer-link">VUS</InertiaLink>
          <InertiaLink href="/search/trucks" className="footer-link">Camions</InertiaLink>
          <InertiaLink href="/search/cars" className="footer-link">Voitures</InertiaLink>
        </div>
        <div className="footer-column">
          <h4>Bon à savoir</h4>
          <InertiaLink href="/faq" className="footer-link">FAQ</InertiaLink>
          <InertiaLink href="/tips" className="footer-link">Conseils</InertiaLink>
          <InertiaLink href="/guides" className="footer-link">Guides</InertiaLink>
        </div>
        <div className="footer-column">
          <h4>À propos</h4>
          <InertiaLink href="/about" className="footer-link">Notre histoire</InertiaLink>
          <InertiaLink href="/team" className="footer-link">Équipe</InertiaLink>
          <InertiaLink href="/contact" className="footer-link">Nous contacter</InertiaLink>
        </div>
      </div>
      <div className="footer-text">
        &copy; 2024 QuebeCar. Tous droits réservés.
      </div>
    </footer>
  );
}

export default Footer;
