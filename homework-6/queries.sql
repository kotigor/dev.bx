#1. Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
#Формат: ID фильма, Название на русском языке, Имя режиссёра.
SELECT m.ID,
       mt.TITLE,
       d.NAME
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
	     INNER JOIN director d on m.DIRECTOR_ID = d.ID
	     INNER JOIN movie_actor ma on m.ID = ma.MOVIE_ID
	AND ma.ACTOR_ID IN (1, 3)
WHERE mt.LANGUAGE_ID = 'ru'
GROUP BY 1, 2, 3
HAVING COUNT(m.ID) = 2;

#1. Второй сопсоб. Показалось, что он более наглядный и правильный
SELECT m.ID,
       mt.TITLE,
       d.NAME
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
	     INNER JOIN director d on m.DIRECTOR_ID = d.ID
	     INNER JOIN movie_actor ma1 on m.ID = ma1.MOVIE_ID AND ma1.ACTOR_ID = 1
	     INNER JOIN movie_actor ma2 on m.ID = ma2.MOVIE_ID AND ma2.ACTOR_ID = 3
WHERE mt.LANGUAGE_ID = 'ru';

#2. Вывести список названий фильмов на англйском языке с "откатом" на русский,
#в случае если название на английском не задано.
#Формат: ID фильма, Название.
SELECT m.ID,
       IFNULL(mt.TITLE,
              (SELECT mt2.TITLE
               FROM movie_title mt2
               WHERE mt2.MOVIE_ID = m.ID)
	       ) as TITLE
FROM movie m
	     LEFT JOIN movie_title mt on m.ID = mt.MOVIE_ID
	AND mt.LANGUAGE_ID = 'en';

#3. Вывести самый длительный фильм Джеймса Кэмерона*.
#Формат: ID фильма, Название на русском языке, Длительность.
#Решение с подзапросом
SELECT m.ID,
       mt.TITLE,
       m.LENGTH
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
WHERE m.LENGTH =
      (SELECT MAX(m2.LENGTH)
       FROM movie m2
       WHERE m2.DIRECTOR_ID = 1)
  AND mt.LANGUAGE_ID = 'ru';

#3. Решение без подзапроса
SELECT m.ID,
       mt.TITLE,
       m.LENGTH
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
WHERE m.DIRECTOR_ID = 1
  AND mt.LANGUAGE_ID = 'ru'
ORDER BY 3 DESC
LIMIT 1;

#4. Вывести список фильмов с названием, сокращённым до 10 символов.
#Если название короче 10 символов – оставляем как есть.
#Если длиннее – сокращаем до 10 символов и добавляем многоточие.
#Формат: ID фильма, сокращённое название
SELECT m.ID,
       IF(CHAR_LENGTH(mt.TITLE) > 10,
          CONCAT(SUBSTR(mt.TITLE, 1, 10), '...'),
          mt.TITLE)
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
	AND mt.LANGUAGE_ID = 'ru';

#5. Вывести количество фильмов, в которых снимался каждый актёр.
#Формат: Имя актёра, Количество фильмов актёра.
SELECT a.NAME,
       COUNT(*) COUNT_MOVIES
FROM actor a
	     INNER JOIN movie_actor ma on a.ID = ma.ACTOR_ID
GROUP BY 1;

#6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
#Формат: ID жанра, название
SELECT g.ID,
       g.NAME
FROM movie_actor ma
	     INNER JOIN movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID
	AND ma.ACTOR_ID = 1
	     RIGHT JOIN genre g on g.ID = mg.GENRE_ID
WHERE ma.ACTOR_ID IS NULL;

#7. Вывести список фильмов, у которых больше 3-х жанров.
#Формат: ID фильма, название на русском языке
SELECT m.ID, mt.TITLE
FROM movie m
	     INNER JOIN movie_genre mg on m.ID = mg.MOVIE_ID
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID = 'ru'
	     INNER JOIN genre g on mg.GENRE_ID = g.ID
GROUP BY 1
HAVING COUNT(*) >= 3;

#8. Вывести самый популярный жанр для каждого актёра.
#Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.
SELECT count.a_name actor_name, MAX(count.g_name) genre
FROM (SELECT a.NAME a_name, g.NAME g_name, COUNT(*) count
      FROM genre g
	           INNER JOIN movie_genre mg on g.ID = mg.GENRE_ID
	           INNER JOIN movie_actor ma on mg.MOVIE_ID = ma.MOVIE_ID
	           INNER JOIN actor a on ma.ACTOR_ID = a.ID
      GROUP BY 1, 2) count
	     INNER JOIN (SELECT a_name, MAX(count) max
	                 FROM (SELECT a.NAME a_name, g.NAME g_name, COUNT(*) count
	                       FROM genre g
		                            INNER JOIN movie_genre mg on g.ID = mg.GENRE_ID
		                            INNER JOIN movie_actor ma on mg.MOVIE_ID = ma.MOVIE_ID
		                            INNER JOIN actor a on ma.ACTOR_ID = a.ID
	                       GROUP BY 1, 2) count
	                 GROUP BY 1) max on max.a_name = count.a_name
WHERE max.max = count.count
GROUP BY 1