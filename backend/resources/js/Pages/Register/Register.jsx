import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Register.css';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';
import { useForm } from '@inertiajs/inertia-react';

const Register = () => {
    const { data, setData, post, processing, errors } = useForm({
        prenom: '',
        nom: '',
        courriel: '',
        mot_de_passe: '',
        mot_de_passe_confirmation: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        post('/register', {
            onSuccess: () => {
                // Redirection après inscription réussie
                console.log('Utilisateur inscrit avec succès!');
            },
        });
    };

    return (
        <>
            <Header />
            <div className="register-form">
                <h2>Inscription</h2>
                <form onSubmit={handleSubmit}>
                    <div>
                        <label>Prénom</label>
                        <input
                            type="text"
                            value={data.prenom}
                            onChange={(e) => setData('prenom', e.target.value)}
                        />
                        {errors.prenom && <span className="error">{errors.prenom}</span>}
                    </div>
                    <div>
                        <label>Nom</label>
                        <input
                            type="text"
                            value={data.nom}
                            onChange={(e) => setData('nom', e.target.value)}
                        />
                        {errors.nom && <span className="error">{errors.nom}</span>}
                    </div>
                    <div>
                        <label>Courriel</label>
                        <input
                            type="email"
                            value={data.courriel}
                            onChange={(e) => setData('courriel', e.target.value)}
                        />
                        {errors.courriel && <span className="error">{errors.courriel}</span>}
                    </div>
                    <div>
                        <label>Mot de passe</label>
                        <input
                            type="password"
                            value={data.mot_de_passe}
                            onChange={(e) => setData('mot_de_passe', e.target.value)}
                        />
                        {errors.mot_de_passe && <span className="error">{errors.mot_de_passe}</span>}
                    </div>
                    <div>
                        <label>Confirmation du mot de passe</label>
                        <input
                            type="password"
                            value={data.mot_de_passe_confirmation}
                            onChange={(e) => setData('mot_de_passe_confirmation', e.target.value)}
                        />
                        {errors.mot_de_passe_confirmation && <span className="error">{errors.mot_de_passe_confirmation}</span>}
                    </div>
                    <button type="submit" disabled={processing}>
                        S'inscrire
                    </button>
                </form>
            </div>
            <Footer />
        </>
    );
};

export default Register;
