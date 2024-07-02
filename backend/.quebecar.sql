-- Création du schéma quebecar s'il n'existe pas
CREATE SCHEMA IF NOT EXISTS `quebecar` DEFAULT CHARACTER SET utf8mb4;
USE `quebecar`;

-- -----------------------------------------------------
-- Table quebecar.pays
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.pays (
  id_pays INT(11) NOT NULL AUTO_INCREMENT,
  nom_pays JSON NOT NULL,
  PRIMARY KEY (id_pays),
  UNIQUE INDEX nom_pays_UNIQUE (nom_pays ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.provinces
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.provinces (
  id_province INT(11) NOT NULL AUTO_INCREMENT,
  nom_province VARCHAR(50) NOT NULL,
  pays_id INT(11) NOT NULL,
  PRIMARY KEY (id_province),
  UNIQUE INDEX nom_province_UNIQUE (nom_province ASC),
  INDEX pays_id (pays_id ASC),
  CONSTRAINT provinces_ibfk_1
    FOREIGN KEY (pays_id)
    REFERENCES quebecar.pays (id_pays)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.taxes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.taxes (
  id INT NOT NULL AUTO_INCREMENT,
  GST_HST DECIMAL(5,2) NOT NULL,
  PST DECIMAL(5,2) NOT NULL,
  provinces_id_province INT(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_taxes_provinces_idx (provinces_id_province ASC),
  CONSTRAINT fk_taxes_provinces
    FOREIGN KEY (provinces_id_province)
    REFERENCES quebecar.provinces (id_province)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table quebecar.constructeurs
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.constructeurs (
  id_constructeur INT(11) NOT NULL AUTO_INCREMENT,
  nom_constructeur VARCHAR(100) NOT NULL,
  pays_origine VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (id_constructeur),
  UNIQUE INDEX nom_constructeur_UNIQUE (nom_constructeur ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.modeles
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.modeles (
  id_modele INT(11) NOT NULL AUTO_INCREMENT,
  nom_modele VARCHAR(50) NOT NULL,
  constructeur_id INT(11) NOT NULL,
  PRIMARY KEY (id_modele),
  INDEX constructeur_id (constructeur_id ASC),
  CONSTRAINT modeles_ibfk_1
    FOREIGN KEY (constructeur_id)
    REFERENCES quebecar.constructeurs (id_constructeur)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.transmissions
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.transmissions (
  id_transmission INT(11) NOT NULL AUTO_INCREMENT,
  type_transmission JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_transmission)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.groupesmotopropulseurs
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.groupesmotopropulseurs (
  id_groupe_motopropulseur INT(11) NOT NULL AUTO_INCREMENT,
  type_groupe_motopropulseur JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_groupe_motopropulseur)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.typescarburant
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.typescarburant (
  id_type_carburant INT(11) NOT NULL AUTO_INCREMENT,
  type_carburant JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_type_carburant)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.carrosseries
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.carrosseries (
  id_carrosserie INT(11) NOT NULL AUTO_INCREMENT,
  type_carrosserie JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_carrosserie)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.privileges
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.privileges (
  id_privilege INT(11) NOT NULL AUTO_INCREMENT,
  nom_privilege JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_privilege),
  UNIQUE INDEX nom_privilege_UNIQUE (nom_privilege ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.villes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.villes (
  id_ville INT(11) NOT NULL AUTO_INCREMENT,
  nom_ville VARCHAR(50) NOT NULL,
  province_id INT(11) NOT NULL,
  PRIMARY KEY (id_ville),
  UNIQUE INDEX nom_ville_UNIQUE (nom_ville ASC),
  INDEX province_id (province_id ASC),
  CONSTRAINT villes_ibfk_1
    FOREIGN KEY (province_id)
    REFERENCES quebecar.provinces (id_province)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.utilisateurs
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.utilisateurs (
  id_utilisateur INT(11) NOT NULL AUTO_INCREMENT,
  prenom VARCHAR(50) NOT NULL,
  nom VARCHAR(50) NOT NULL,
  date_naissance DATE NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  code_postal VARCHAR(10) NOT NULL,
  numero_telephone VARCHAR(20) NOT NULL,
  numero_portable VARCHAR(20) NULL DEFAULT NULL,
  courriel VARCHAR(100) NOT NULL,
  privileges_id INT(11) NOT NULL,
  nom_utilisateur VARCHAR(50) NOT NULL,
  mot_de_passe VARCHAR(255) NOT NULL,
  derniere_connexion DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  villes_id_ville INT(11) NOT NULL,
  PRIMARY KEY (id_utilisateur),
  UNIQUE INDEX nom_utilisateur_UNIQUE (nom_utilisateur ASC),
  UNIQUE INDEX courriel_UNIQUE (courriel ASC),
  INDEX privileges_id (privileges_id ASC),
  INDEX fk_utilisateurs_villes1_idx (villes_id_ville ASC),
  CONSTRAINT utilisateurs_ibfk_2
    FOREIGN KEY (privileges_id)
    REFERENCES quebecar.privileges (id_privilege),
  CONSTRAINT fk_utilisateurs_villes1
    FOREIGN KEY (villes_id_ville)
    REFERENCES quebecar.villes (id_ville)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.status
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.status (
  id_status INT(11) NOT NULL AUTO_INCREMENT,
  nom_status JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_status),
  UNIQUE INDEX nom_status_UNIQUE (nom_status ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.methodespaiement
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.methodespaiement (
  id_methode_paiement INT(11) NOT NULL AUTO_INCREMENT,
  nom_methode_paiement JSON NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_methode_paiement),
  UNIQUE INDEX nom_methode_paiement_UNIQUE (nom_methode_paiement ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.methodesexpedition
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.methodesexpedition (
  id_methode_expedition INT(11) NOT NULL AUTO_INCREMENT,
  nom_methode_expedition JSON NOT NULL,
  prix_fixe DECIMAL(10,2) NOT NULL,
  description JSON NULL DEFAULT NULL,
  PRIMARY KEY (id_methode_expedition),
  UNIQUE INDEX nom_methode_expedition_UNIQUE (nom_methode_expedition ASC)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.commandes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.commandes (
  id_commande INT(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur INT(11) NOT NULL,
  date_commande DATE NOT NULL,
  prix_total DECIMAL(10,2) NOT NULL,
  status_commande_id INT(11) NOT NULL,
  mode_paiement_id INT(11) NOT NULL,
  mode_expedition_id INT(11) NOT NULL,
  date_paiement DATE NULL DEFAULT NULL,
  date_expedition DATE NULL DEFAULT NULL,
  commentaires TEXT NULL DEFAULT NULL,
  PRIMARY KEY (id_commande),
  INDEX fk_commandes_utilisateurs1_idx (id_utilisateur ASC),
  INDEX fk_commandes_status1_idx (status_commande_id ASC),
  INDEX fk_commandes_methodespaiement1_idx (mode_paiement_id ASC),
  INDEX fk_commandes_methodesexpedition1_idx (mode_expedition_id ASC),
  CONSTRAINT fk_commandes_utilisateurs1
    FOREIGN KEY (id_utilisateur)
    REFERENCES quebecar.utilisateurs (id_utilisateur),
  CONSTRAINT fk_commandes_status1
    FOREIGN KEY (status_commande_id)
    REFERENCES quebecar.status (id_status),
  CONSTRAINT fk_commandes_methodespaiement1
    FOREIGN KEY (mode_paiement_id)
    REFERENCES quebecar.methodespaiement (id_methode_paiement),
  CONSTRAINT fk_commandes_methodesexpedition1
    FOREIGN KEY (mode_expedition_id)
    REFERENCES quebecar.methodesexpedition (id_methode_expedition)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.voitures
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.voitures (
  id_voiture INT(11) NOT NULL AUTO_INCREMENT,
  modele_id INT(11) NOT NULL,
  annee INT(11) NOT NULL,
  date_arrivee DATE NOT NULL,
  prix_achat DECIMAL(10,2) NOT NULL,
  prix_vente DECIMAL(10,2) NOT NULL,
  couleur JSON NOT NULL,
  type_transmission_id INT(11) NOT NULL,
  groupe_motopropulseur_id INT(11) NOT NULL,
  type_carburant_id INT(11) NOT NULL,
  carrosserie_id INT(11) NOT NULL,
  nombre_portes INT(11) NOT NULL,
  nombre_places INT(11) NOT NULL,
  kilometrage INT(11) NOT NULL,
  description TEXT NULL DEFAULT NULL,
  etat_vehicule JSON NOT NULL,
  commandes_id_commande INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (id_voiture),
  INDEX modele_id (modele_id ASC),
  INDEX type_transmission_id (type_transmission_id ASC),
  INDEX groupe_motopropulseur_id (groupe_motopropulseur_id ASC),
  INDEX type_carburant_id (type_carburant_id ASC),
  INDEX carrosserie_id (carrosserie_id ASC),
  INDEX fk_voitures_commandes1_idx (commandes_id_commande ASC),
  CONSTRAINT voitures_ibfk_2
    FOREIGN KEY (modele_id)
    REFERENCES quebecar.modeles (id_modele),
  CONSTRAINT voitures_ibfk_3
    FOREIGN KEY (type_transmission_id)
    REFERENCES quebecar.transmissions (id_transmission),
  CONSTRAINT voitures_ibfk_4
    FOREIGN KEY (groupe_motopropulseur_id)
    REFERENCES quebecar.groupesmotopropulseurs (id_groupe_motopropulseur),
  CONSTRAINT voitures_ibfk_5
    FOREIGN KEY (type_carburant_id)
    REFERENCES quebecar.typescarburant (id_type_carburant),
  CONSTRAINT voitures_ibfk_6
    FOREIGN KEY (carrosserie_id)
    REFERENCES quebecar.carrosseries (id_carrosserie),
  CONSTRAINT fk_voitures_commandes1
    FOREIGN KEY (commandes_id_commande)
    REFERENCES quebecar.commandes (id_commande)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.photo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.photo (
  id INT NOT NULL AUTO_INCREMENT,
  photos VARCHAR(255) NOT NULL,
  voitures_id_voiture INT(11) NOT NULL,
  ordre INT NULL,
  PRIMARY KEY (id),
  INDEX fk_photo_voitures1_idx (voitures_id_voiture ASC),
  CONSTRAINT fk_photo_voitures1
    FOREIGN KEY (voitures_id_voiture)
    REFERENCES quebecar.voitures (id_voiture)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table quebecar.commandes_has_taxes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.commandes_has_taxes (
  commandes_id_commande INT(11) NOT NULL,
  taxes_id INT NOT NULL,
  PRIMARY KEY (commandes_id_commande, taxes_id),
  INDEX fk_commandes_has_taxes_taxes1_idx (taxes_id ASC),
  INDEX fk_commandes_has_taxes_commandes1_idx (commandes_id_commande ASC),
  CONSTRAINT fk_commandes_has_taxes_commandes1
    FOREIGN KEY (commandes_id_commande)
    REFERENCES quebecar.commandes (id_commande),
  CONSTRAINT fk_commandes_has_taxes_taxes1
    FOREIGN KEY (taxes_id)
    REFERENCES quebecar.taxes (id)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- -----------------------------------------------------
-- Table quebecar.journaldebord
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS quebecar.journaldebord (
  id_journal INT(11) NOT NULL AUTO_INCREMENT,
  date_heure TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  type_action VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  utilisateur_id INT(11) NOT NULL,
  PRIMARY KEY (id_journal),
  INDEX fk_journaldebord_utilisateurs1_idx (utilisateur_id ASC),
  CONSTRAINT fk_journaldebord_utilisateurs1
    FOREIGN KEY (utilisateur_id)
    REFERENCES quebecar.utilisateurs (id_utilisateur)
) ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4;

-- Populate table quebecar.pays
INSERT INTO quebecar.pays (nom_pays) VALUES
    ('{"en": "Canada", "fr": "Canada"}'),
    ('{"en": "United States", "fr": "États-Unis"}');

-- Populate table quebecar.provinces
INSERT INTO quebecar.provinces (nom_province, pays_id) VALUES
    ('Québec', 1),
    ('Ontario', 1);

-- Populate table quebecar.taxes
INSERT INTO quebecar.taxes (GST_HST, PST, provinces_id_province) VALUES
    (5.00, 9.975, 1),
    (13.00, 0.00, 2);

-- Populate table quebecar.constructeurs
INSERT INTO quebecar.constructeurs (nom_constructeur, pays_origine) VALUES
    ('Toyota', 'Japon'),
    ('Ford', 'États-Unis');

-- Populate table quebecar.modeles
INSERT INTO quebecar.modeles (nom_modele, constructeur_id) VALUES
    ('Corolla', 1),
    ('Mustang', 2);

-- Populate table quebecar.transmissions
INSERT INTO quebecar.transmissions (type_transmission, description) VALUES
    ('{"en": "Automatic", "fr": "Automatique"}', '{"en": "Smooth and easy", "fr": "Douce et facile"}'),
    ('{"en": "Manual", "fr": "Manuelle"}', '{"en": "For enthusiasts", "fr": "Pour les passionnés"}');

-- Populate table quebecar.groupesmotopropulseurs
INSERT INTO quebecar.groupesmotopropulseurs (type_groupe_motopropulseur, description) VALUES
    ('{"en": "Hybrid", "fr": "Hybride"}', '{"en": "Eco-friendly", "fr": "Écologique"}'),
    ('{"en": "Electric", "fr": "Électrique"}', '{"en": "Zero emissions", "fr": "Zéro émission"}');

-- Populate table quebecar.typescarburant
INSERT INTO quebecar.typescarburant (type_carburant, description) VALUES
    ('{"en": "Petrol", "fr": "Essence"}', '{"en": "Common fuel", "fr": "Carburant commun"}'),
    ('{"en": "Diesel", "fr": "Diesel"}', '{"en": "Efficient for long distances", "fr": "Efficace pour les longues distances"}');

-- Populate table quebecar.carrosseries
INSERT INTO quebecar.carrosseries (type_carrosserie, description) VALUES
    ('{"en": "Sedan", "fr": "Berline"}', '{"en": "Comfortable family car", "fr": "Voiture familiale confortable"}'),
    ('{"en": "SUV", "fr": "VUS"}', '{"en": "Spacious and powerful", "fr": "Spacieux et puissant"}');

-- Populate table quebecar.privileges
INSERT INTO quebecar.privileges (nom_privilege, description) VALUES
    ('{"en": "Admin", "fr": "Administrateur"}', '{"en": "Full access", "fr": "Accès complet"}'),
    ('{"en": "User", "fr": "Utilisateur"}', '{"en": "Limited access", "fr": "Accès limité"}');

-- Populate table quebecar.villes
INSERT INTO quebecar.villes (nom_ville, province_id) VALUES
    ('Montréal', 1),
    ('Toronto', 2);

-- Populate table quebecar.utilisateurs
INSERT INTO quebecar.utilisateurs (prenom, nom, date_naissance, adresse, code_postal, numero_telephone, numero_portable, courriel, privileges_id, nom_utilisateur, mot_de_passe, villes_id_ville) VALUES
    ('Jean', 'Dupont', '1985-05-15', '123 Rue Principale', 'H1A 1A1', '514-555-1234', '514-555-5678', 'jean.dupont@example.com', 1, 'jdupont', 'password123', 1),
    ('Marie', 'Martin', '1990-10-25', '456 Avenue des Fleurs', 'M5B 2L3', '416-555-9876', NULL, 'marie.martin@example.com', 2, 'mmartin', 'password456', 2);

-- Populate table quebecar.status
INSERT INTO quebecar.status (nom_status, description) VALUES
    ('{"en": "Pending", "fr": "En attente"}', '{"en": "Awaiting approval", "fr": "En attente de validation"}'),
    ('{"en": "Completed", "fr": "Complété"}', '{"en": "Transaction completed", "fr": "Transaction terminée"}');

-- Populate table quebecar.methodespaiement
INSERT INTO quebecar.methodespaiement (nom_methode_paiement, description) VALUES
    ('{"en": "Credit Card", "fr": "Carte de crédit"}', '{"en": "Fast and secure", "fr": "Rapide et sécurisé"}'),
    ('{"en": "PayPal", "fr": "PayPal"}', '{"en": "Convenient online payment", "fr": "Paiement en ligne pratique"}');

-- Populate table quebecar.methodesexpedition
INSERT INTO quebecar.methodesexpedition (nom_methode_expedition, prix_fixe, description) VALUES
    ('{"en": "Standard Shipping", "fr": "Expédition standard"}', 10.00, '{"en": "Delivers in 5-7 days", "fr": "Livraison en 5-7 jours"}'),
    ('{"en": "Express Shipping", "fr": "Expédition express"}', 20.00, '{"en": "Delivers in 1-2 days", "fr": "Livraison en 1-2 jours"}');

-- Populate table quebecar.commandes
INSERT INTO quebecar.commandes (id_utilisateur, date_commande, prix_total, status_commande_id, mode_paiement_id, mode_expedition_id, date_paiement, date_expedition, commentaires) VALUES
    (1, '2023-05-01', 15000.00, 2, 1, 2, '2023-05-02', '2023-05-03', 'Voiture livrée rapidement.'),
    (2, '2023-06-15', 25000.00, 1, 2, 1, NULL, NULL, 'En attente de paiement.');

-- Populate table quebecar.voitures
INSERT INTO quebecar.voitures (modele_id, annee, date_arrivee, prix_achat, prix_vente, couleur, type_transmission_id, groupe_motopropulseur_id, type_carburant_id, carrosserie_id, nombre_portes, nombre_places, kilometrage, description, etat_vehicule, commandes_id_commande) VALUES
    (1, 2020, '2023-04-10', 10000.00, 15000.00, '{"en": "Black", "fr": "Noir"}', 1, 1, 1, 1, 4, 5, 20000, 'Bien entretenue, faible kilométrage.', '{"en": "Available", "fr": "Disponible"}', NULL),
    (2, 2018, '2023-04-12', 18000.00, 25000.00, '{"en": "Red", "fr": "Rouge"}', 2, 2, 2, 2, 2, 4, 30000, 'Voiture en excellent état.', '{"en": "Sold", "fr": "Vendu"}', 1);

-- Populate table quebecar.photo
INSERT INTO quebecar.photo (photos, voitures_id_voiture, ordre) VALUES
    ('voiture1_1.jpg', 1, 1),
    ('voiture1_2.jpg', 1, 2),
    ('voiture2_1.jpg', 2, 1),
    ('voiture2_2.jpg', 2, 2);

-- Populate table quebecar.commandes_has_taxes
INSERT INTO quebecar.commandes_has_taxes (commandes_id_commande, taxes_id) VALUES
    (1, 1),
    (1, 2),
    (2, 1);

-- Populate table quebecar.journaldebord
INSERT INTO quebecar.journaldebord (date_heure, type_action, description, utilisateur_id) VALUES
    ('2023-05-01 10:00:00', 'Création', 'Création de la commande 1', 1),
    ('2023-06-15 14:30:00', 'Mise à jour', 'Mise à jour du statut de la commande 2', 2);