import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import './Login.css';

function LoginModal({ onClose }) {
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

  // Função para login com Google
  const handleGoogleLogin = () => {
    Inertia.get('/login/google');
  };

  // Função para login com Facebook
  const handleFacebookLogin = () => {
    Inertia.get('/login/facebook');
  };

  return (
    <div className="modal">
      <div className="modal-content">
        <span className="close" onClick={onClose}>&times;</span> 
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
        <div className="social-login">
        <button className="google-button" onClick={handleGoogleLogin}>
            Login with Google
          </button>
          <button className="facebook-button" onClick={handleFacebookLogin}>
            Login with Facebook
          </button>
        </div>
        <p>Pas de compte ? <a href="/register" className="footer-link" onClick={onClose}>Créer un compte</a></p>
      </div>
    </div>
  );
}

export default LoginModal;
