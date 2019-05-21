CREATE TABLE `users` (
	`user_id` bigint NOT NULL AUTO_INCREMENT,
	`user_email` TEXT NOT NULL,
	`user_hashed_password` TEXT NOT NULL,
	`user_nickname` TEXT NOT NULL,
	`user_rate` bigint NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `albums` (
	`album_id` bigint NOT NULL AUTO_INCREMENT,
	`album_title` TEXT NOT NULL,
	`album_author_id` bigint NOT NULL,
	`album_genre` TEXT NOT NULL,
	`album_year` year NOT NULL,
	`album_tracks` int NOT NULL,
	`album_rate` bigint NOT NULL,
	`album_authors` TEXT NOT NULL,
	PRIMARY KEY (`album_id`)
);

CREATE TABLE `songs` (
	`song_id` bigint NOT NULL AUTO_INCREMENT,
	`album_id` bigint NOT NULL,
	`song_authors` TEXT NOT NULL,
	`song_title` TEXT NOT NULL,
	`song_number` int NOT NULL,
	`song_duration` TIME NOT NULL,
	`song_plays` bigint NOT NULL,
	`song_rate` bigint NOT NULL,
	PRIMARY KEY (`song_id`)
);

ALTER TABLE `albums` ADD CONSTRAINT `albums_fk0` FOREIGN KEY (`album_author_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `songs` ADD CONSTRAINT `songs_fk0` FOREIGN KEY (`song_id`) REFERENCES ``(``);

ALTER TABLE `songs` ADD CONSTRAINT `songs_fk1` FOREIGN KEY (`album_id`) REFERENCES `albums`(`album_id`);

