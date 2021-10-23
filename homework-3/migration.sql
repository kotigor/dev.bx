CREATE TABLE IF NOT EXISTS language
(
	ID varchar(2) not null,
	NAME varchar(50) not null,
	PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID varchar(2) not null,
	TITLE varchar(500) not null,
	PRIMARY KEY (MOVIE_ID, LANGUAGE_ID),
	FOREIGN KEY FK_TITLE_MOVIE(MOVIE_ID)
		references movie(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_TITLE_LANGUAGE_ID(LANGUAGE_ID)
		references language(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);


INSERT INTO language(ID, NAME)
VALUES ('ru', 'Русский'),
       ('en', 'English'),
       ('de', 'Deutsch');

INSERT INTO movie_title
SELECT ID, 'ru', TITLE FROM movie

ALTER TABLE movie DROP TITLE