import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Login.css';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';

function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [errors, setErrors] = useState({});

  const handleSubmit = (e) => {
    e.preventDefault();
    Inertia.post('/login', { email, password }, {
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
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
              {errors.email && <span className="error-message">{errors.email}</span>}
            </div>
            <div className="form-group">
              <label htmlFor="password">Password</label>
              <input
                type="password"
                id="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
              />
              {errors.password && <span className="error-message">{errors.password}</span>}
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
