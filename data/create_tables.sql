CREATE TABLE
  `actors` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(64) NOT NULL,
    `last_name` varchar(64) NOT NULL,
    `birthdate` date NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 83 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
  `movies` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `release_year` int unsigned NOT NULL,
    `genre` varchar(64) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE
  `actors_in_movies` (
    `actor_id` int unsigned NOT NULL,
    `movie_id` int unsigned NOT NULL,
    `character` varchar(255) NOT NULL,
    PRIMARY KEY (`actor_id`, `movie_id`),
    KEY `actors_in_movies_relation_2` (`movie_id`),
    CONSTRAINT `actors_in_movies_relation_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `actors_in_movies_relation_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
