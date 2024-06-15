USE cookin_time;

CREATE TABLE IF NOT EXISTS comments (
    `comment_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT(11) NOT NULL,
    `recipe_id` INT(11) NOT NULL,
    `comment` TEXT NOT NULL,
    FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 

ALTER TABLE comments 
ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE comments
ADD review INT NOT NULL DEFAULT 3;
