-- Création de la BDD
CREATE DATABASE IF NOT EXISTS `cookin_time`;
USE `cookin_time`;

-- Création de la table recipes
CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(128) NOT NULL,
    `recipe` TEXT NOT NULL,
    `author` varchar(255) NOT NULL,
    `is_enabled` BOOLEAN NOT NULL,
    PRIMARY KEY (`recipe_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de la table users
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `pseudo` varchar (64) NOT NULL,
    `nom` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `age` INT NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

delete from `users`;
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (34, 'john.dorian@exemple.com', 'John Dorian', 'Jdorian90', 1);
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (32, 'chris.turk@exemple.com', 'Chris Turk', 'Cturk92', 2);
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (28, 'carla.espinosa@exemple.com', 'Carla Espinosa', 'Cespinosa96', 3);

delete from `recipes`;
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('john.dorian@exemple.com', 1, "Les lasagnes (lasagna, en italien) sont à la fois des pâtes alimentaires en forme de feuilles rectangulaires, et une recette de cuisine italienne à base de couches alternées de pâtes lasagnes, parmesan, mozzarella, ou ricotta, et de sauce bolognaise ou sauce béchamel, gratinée au four. Originaires du centre-sud italien, les lasagnes tiennent leur nom du mot italien lasagna, lui-même dérivé du grec ancien λάσανα / lásana qui signifie « trépied de cuisine ». Les Italiens employèrent ensuite le mot à partir du XIIIe siècle pour désigner le plat dans lequel les lasagnes étaient cuisinés. \n", 1, 'Lasagnes');
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('john.dorian@exemple.com', 0, "Le couscous est d'une part une semoule de blé dur préparée à l'huile d'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d'épices, d'huile d'olive et de viande (rouge ou de volaille) ou de poisson.", 2, 'Couscous');
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('carla.espinosa@exemple.com', 0, "La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de « sauce César » à base de parmesan râpé, huile d'olive, pâte d'anchois, ail, vinaigre de vin, moutarde, jaune d'œuf et sauce Worcestershire.", 4, 'Salade Romaine');
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('chris.turk@exemple.com', 1, "L'escalope à la milanaise, ou escalope milanaise est une escalope panée, de viande de veau, traditionnellement prise dans le faux-filet. Historiquement, on la cuit avec du beurre. Elle est généralement servie avec salade ou frites, accompagnée de sauce mayonnaise. On peut y ajouter un filet de jus de citron.\n\nEn Italie, ce mets ne se sert pas avec des pâtes.", 3, 'Escalope milanaise');
