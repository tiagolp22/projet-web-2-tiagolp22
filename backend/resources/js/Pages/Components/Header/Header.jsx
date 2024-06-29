import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';

function Header() {
  return (
    <header className="bg-gray-800 text-white p-4">
      <div className="container mx-auto flex justify-between items-center">
        <InertiaLink href="/" className="text-xl font-bold">
          VEHICULES D'OCCASION INC.
        </InertiaLink>
        <nav className="flex space-x-4">
          <InertiaLink href="/" className="hover:underline">
            Accueil
          </InertiaLink>
          <InertiaLink href="/catalog" className="hover:underline">
            Catalogue
          </InertiaLink>
          <InertiaLink href="/about" className="hover:underline">
            À propos
          </InertiaLink>
          <InertiaLink href="/contact" className="hover:underline">
            Nous contacter
          </InertiaLink>
          <InertiaLink href="/login" className="hover:underline">
            Connexion
          </InertiaLink>
          <InertiaLink href="/register" className="hover:underline">
            Inscription
          </InertiaLink>
        </nav>
      </div>
    </header>
  );
}

export default Header;
