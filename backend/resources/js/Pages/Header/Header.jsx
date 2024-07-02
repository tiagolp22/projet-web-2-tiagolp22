import React from 'react';
import './Header.css';
import { Link } from '@inertiajs/react';

function Header() {
  return (
    <header className="custom-header">
      <div className="wrapper">
        <div className="header-content">
          <Link href="/" className="logo">
            <img className="logo" src="../../img/logo/logo.png" alt="QuebeCar" />
          </Link>
          <nav className="nav-links">
            <Link href="/" className="nav-link">Accueil</Link>
            <Link href="/catalog" className="nav-link">Catalogue</Link>
            <Link href="/about" className="nav-link">À propos</Link>
            <Link href="/contact" className="nav-link">Nous contacter</Link>
            <div className="icones">
              <a href="https://www.google.ca/maps/place/Coll%C3%A8ge+de+Maisonneuve/@45.5508613,-73.5558744,16z/data=!3m1!4b1!4m6!3m5!1s0x4cc91bf5bacbeffd:0x68ff300997eff5c!8m2!3d45.5508613!4d-73.5532995!16zL20vMDU3dHFx?hl=fr&entry=ttu" target="_blank" rel="noopener noreferrer">
                <img className="icones_navigation" src="../../img/icones/Location.png" alt="" />
              </a>
              <div className="dropdown">
                <button className="dropdown-button">
                  <img className="icones_navigation" src="../../img/icones/Profil.png" alt="" />
                </button>
                <div className="dropdown-content">
                  <Link href="/login" className="nav-link">Connexion</Link>
                  <Link href="/register" className="nav-link">Inscription</Link>
                </div>
              </div>
              <Link href="/login"><img className="icones_navigation" src="../../img/icones/Canada.png" alt="" /></Link>
            </div>
          </nav>
        </div>
      </div>
    </header>
  );
}

export default Header;
