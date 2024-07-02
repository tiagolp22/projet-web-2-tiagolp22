import React from 'react';
import './Register.css';
import { useForm } from '@inertiajs/inertia-react';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';
import './Register.css';

const Register = () => {
    const { data, setData, post, processing, errors } = useForm({
        prenom: '',
        nom: '',

        date_naissance: '',
        adresse: '',
        code_postal: '',
        numero_telephone: '',
        numero_portable: '',
        courriel: '',
        privileges_id: 1,  // to do | doit etre dynamique, par default user
        nom_utilisateur: '',
        mot_de_passe: '',
        villes_id_ville: 1, // to do | doit etre dynamique
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        post('/register', {
            data,
            onSuccess: () => {
                console.log('Utilisateur inscrit avec succès!');
            },
            onError: (errors) => {
                console.error('Erreur lors de l\'inscription', errors);
            },
        });
    };

    return (
        <>
            <Header />
            <div className="register-form">
                <img className='logo_formulaire' src="../../img/logo/logo.png" alt="Logo" />
                <h3 className='h3'>Créer votre compte</h3>
                <p>Accédez rapidement à toutes vos informations enregistrées depuis n'importe quel appareil, à tout moment. </p>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                       <label htmlFor="prenom">Prénom</label>

                        <input
                            type="text"
                            name="prenom"
                            id="prenom"
                            value={data.prenom}
                            onChange={(e) => setData('prenom', e.target.value)}
                        />
                        {errors.prenom && <span className="error">{errors.prenom}</span>}
                    </div>
                    <div className="form-group">
                        <label htmlFor="nom">Nom</label>

                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            value={data.nom}
                            onChange={(e) => setData('nom', e.target.value)}
                        />
                        {errors.nom && <span className="error">{errors.nom}</span>}
                    </div>
                    <div className="form-group">
                        <label>Date de naissance</label>
                        <div className="date-select">
                            <select value={data.jour} onChange={(e) => setData('jour', e.target.value)}>
                                <option value="">Jour</option>
                                {[...Array(31).keys()].map(day => (
                                    <option key={day + 1} value={day + 1}>{day + 1}</option>
                                ))}
                            </select>
                            <select value={data.mois} onChange={(e) => setData('mois', e.target.value)}>
                                <option value="">Mois</option>
                                {['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'].map((month, index) => (
                                    <option key={index + 1} value={index + 1}>{month}</option>
                                ))}
                            </select>
                            <select value={data.annee} onChange={(e) => setData('annee', e.target.value)}>
                                <option value="">Année</option>
                                {[...Array(100).keys()].map(year => (
                                    <option key={year} value={2023 - year}>{2023 - year}</option>
                                ))}
                            </select>
                        </div>
                    </div>
                    <div className="form-group">
                        <label>Adresse</label>
                        <input
                            type="text"

                            value={data.adresse}
                            onChange={(e) => setData('adresse', e.target.value)}
                        />
                        {errors.adresse && <span className="error">{errors.adresse}</span>}
                    </div>

                    <div className="form-group">
                         <label htmlFor="code_postal">Code postal</label>
                        <input
                            type="text"
                            value={data.code_postal}
                            onChange={(e) => setData('code_postal', e.target.value)}
                        />
                        {errors.code_postal && <span className="error">{errors.code_postal}</span>}
                    </div>

                    <div className="form-group">
                        <label>Numéro de téléphone</label>
                        <input
                            type="text"
                            value={data.telephone}
                            onChange={(e) => setData('telephone', e.target.value)}
                        />
                        {errors.telephone && <span className="error">{errors.telephone}</span>}
                    </div>
                    <div className="form-group">
                        <label>Courriel</label>

                        <input
                            type="email"
                            name="courriel"
                            id="courriel"
                            value={data.courriel}
                            onChange={(e) => setData('courriel', e.target.value)}
                        />
                        {errors.courriel && <span className="error">{errors.courriel}</span>}
                    </div>

                    <div className="form-group">
                        <label>Nom d'utilisateur</label>
                        <input
                            type="text"
                            value={data.nom_utilisateur}
                            onChange={(e) => setData('nom_utilisateur', e.target.value)}
                        />
                        {errors.nom_utilisateur && <span className="error">{errors.nom_utilisateur}</span>}
                    </div>
                    <div className="form-group">
                        <label>Mot de passe</label>

                        <input
                            type="text"
                            name="nom_utilisateur"
                            id="nom_utilisateur"
                            value={data.nom_utilisateur}
                            onChange={(e) => setData('nom_utilisateur', e.target.value)}
                        />
                        {errors.nom_utilisateur && <span className="error">{errors.nom_utilisateur}</span>}
                    </div>
                    <div className="form-group">
                        <label>Confirmer votre mot de passe</label>

                        <input
                            type="password"
                            name="mot_de_passe"
                            id="mot_de_passe"
                            value={data.mot_de_passe}
                            onChange={(e) => setData('mot_de_passe', e.target.value)}
                        />
                        {errors.mot_de_passe && <span className="error">{errors.mot_de_passe}</span>}
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
