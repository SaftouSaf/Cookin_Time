-- Création de la table utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `pseudo` varchar (64) NOT NULL,
    `nom` varchar(64) NOT NULL,
    `prenom` varchar(64) NOT NULL,
    `mdp` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `age` int(11) NOT NULL, 
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;