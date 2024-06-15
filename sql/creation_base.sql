-- Création de la BDD
CREATE DATABASE IF NOT EXISTS cookin_time;
USE cookin_time;

-- Création de la table users
CREATE TABLE IF NOT EXISTS users (
    user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pseudo varchar (60) NULL,
    `name` varchar (60) NOT NULL,
    last_name varchar(60) NOT NULL,
    email varchar(250) NOT NULL,
    `password` varchar(250) NOT NULL,
    age INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO users (pseudo, `name`, last_name, email, `password`, age) VALUES 
-- ('JD', 'John', 'Dorian', 'john.dorian@exemple.com', 'TyuifghJD', 28), 
-- ('Joe', 'John', 'Doe', 'john.doe@exemple.com', 'Azerty1234', 32),
-- ('Hoe', 'Jane', 'Doe', 'jane.doe@exemple.com', 'Qwerty1234', 26);

-- Création de la table recipes
CREATE TABLE IF NOT EXISTS recipes (
    recipe_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(100) NOT NULL,
    recipe TEXT NOT NULL,
    author varchar(250) NOT NULL,
    is_enabled BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into recipes (title, recipe, author, is_enabled) values ('Lasagnes', "Les lasagnes (lasagna, en italien) sont à la fois des pâtes alimentaires en forme de feuilles rectangulaires, et une recette de cuisine italienne à base de couches alternées de pâtes lasagnes, parmesan, mozzarella, ou ricotta, et de sauce bolognaise ou sauce béchamel, gratinée au four. Originaires du centre-sud italien, les lasagnes tiennent leur nom du mot italien lasagna, lui-même dérivé du grec ancien λάσανα / lásana qui signifie « trépied de cuisine ». Les Italiens employèrent ensuite le mot à partir du XIIIe siècle pour désigner le plat dans lequel les lasagnes étaient cuisinés. \n", 'john.dorian@exemple.com', 1);
insert into recipes (author, is_enabled, recipe, title) values ('john.dorian@exemple.com', 0, "Le couscous est d'une part une semoule de blé dur préparée à l'huile d'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d'épices, d'huile d'olive et de viande (rouge ou de volaille) ou de poisson.", 'Couscous');
insert into recipes (author, is_enabled, recipe, title) values ('carla.espinosa@exemple.com', 0, "La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de « sauce César » à base de parmesan râpé, huile d'olive, pâte d'anchois, ail, vinaigre de vin, moutarde, jaune d'œuf et sauce Worcestershire.", 'Salade Romaine');
insert into recipes (author, is_enabled, recipe, title) values ('chris.turk@exemple.com', 1, "L'escalope à la milanaise, ou escalope milanaise est une escalope panée, de viande de veau, traditionnellement prise dans le faux-filet. Historiquement, on la cuit avec du beurre. Elle est généralement servie avec salade ou frites, accompagnée de sauce mayonnaise. On peut y ajouter un filet de jus de citron.\n\nEn Italie, ce mets ne se sert pas avec des pâtes.", 'Escalope milanaise');

