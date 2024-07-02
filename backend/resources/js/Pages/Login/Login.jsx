import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Login.css';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';

function Login() {
  const [courriel, setEmail] = useState('');
  const [mot_de_passe, setPassword] = useState('');
  const [errors, setErrors] = useState({});

  const handleSubmit = (e) => {
    e.preventDefault();
    Inertia.post('/login', { courriel, mot_de_passe }, {
      onError: (error) => {
        setErrors(error);
      },
    });
  };

  return (
    <>
      <Header />
      <div className="login-container">
        <div className="login-content">
          <h1>Login</h1>
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <label htmlFor="email">Email</label>
              <input
                type="email"
                id="email"
                value={courriel}
                name="courriel"
                onChange={(e) => setEmail(e.target.value)}
              />
              {errors.courriel && <span className="error-message">{errors.courriel}</span>}
            </div>
            <div className="form-group">
              <label htmlFor="password">Password</label>
              <input
                type="password"
                id="password"
                name="mot_de_passe"
                value={mot_de_passe}
                onChange={(e) => setPassword(e.target.value)}
              />
              {errors.mot_de_passe && <span className="error-message">{errors.mot_de_passe}</span>}
            </div>
            <button type="submit" className="login-button">Login</button>
          </form>
          <p>
            Pas de compte ? <InertiaLink href="/register" className="footer-link">Créer un compte</InertiaLink>
          </p>
        </div>
      </div>
      <Footer />
    </>
  );
}

export default Login;
