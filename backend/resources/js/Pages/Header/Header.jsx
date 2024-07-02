import React, { useState } from 'react';
import './Header.css';
import { Link } from '@inertiajs/react';
import LoginModal from '../Login/LoginModal'; 

function Header() {
  const [showModal, setShowModal] = useState(false); // Estado para controlar a exibição do modal

  const openModal = () => {
    setShowModal(true);
  };

  return (
    <header className="custom-header">
      <div className="wrapper">
        <div className="header-content">
          <Link href="/" className="logo">
            <img src="../../img/logo/logo.png" alt="QuebeCar" />
          </Link>
          <nav className="nav-links">
            <Link href="/" className="nav-link">Accueil</Link>
            <Link href="/catalog" className="nav-link">Catalogue</Link>
            <Link href="/about" className="nav-link">À propos</Link>
            <Link href="/contact" className="nav-link">Nous contacter</Link>

            <div className="dropdown">
              <button className="dropdown-button">
                Plus <span className="arrow-down">&#9660;</span>
              </button>
              <div className="dropdown-content">
                <button onClick={openModal} className="nav-link">Connexion</button> 
                <Link href="/register" className="nav-link">Inscription</Link>
              </div>
            </div>
          </nav>
        </div>
      </div>

      {showModal && <LoginModal onClose={() => setShowModal(false)} />} {/* Renderiza o modal se showModal for true */}
    </header>
  );
}

export default Header;
