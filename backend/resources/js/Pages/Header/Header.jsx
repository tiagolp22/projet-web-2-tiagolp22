import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Header.css'; 

function Header() {
  return (
    
      <header className="custom-header">
      <div className="wrapper">
        <div className="header-content">
          <InertiaLink href="/" className="logo">
            <img src="../../img/logo/logo.png" alt="QuebeCar" srcSet="" />
          </InertiaLink>
          <nav className="nav-links">
            <InertiaLink href="/" className="nav-link">Accueil</InertiaLink>
            <InertiaLink href="/catalog" className="nav-link">Catalogue</InertiaLink>
            <InertiaLink href="/about" className="nav-link">À propos</InertiaLink>
            <InertiaLink href="/contact" className="nav-link">Nous contacter</InertiaLink>
            
            <div className="dropdown">
              <button className="dropdown-button">
                Plus <span className="arrow-down">&#9660;</span>
              </button>
              <div className="dropdown-content">
                <InertiaLink href="/login" className="nav-link">Connexion</InertiaLink>
                <InertiaLink href="/register" className="nav-link">Inscription</InertiaLink>
              </div>
            </div>
          </nav>
        </div>
        </div>
      </header>
    
  );
}

export default Header;
