SELECT * FROM users;

SELECT * FROM users WHERE idusers=1;

SELECT * FROM users WHERE name = 'agustin';

SELECT * FROM users WHERE name LIKE '%a';

SELECT name, email, pets_idpets FROM users;

SELECT name, email, pets_idpets, pet 
FROM users, pets;

SELECT name, email, pets_idpets, pet 
FROM users, pets
WHERE pets.idpets = users.pets_idpets;

SELECT name, email, pets_idpets, pet
FROM users
INNER JOIN pets ON idpets = pets_idpets;


SELECT name, email, state
FROM users
INNER JOIN states ON states.idstates = users.idstate;

SELECT name, email, state
FROM users
RIGHT JOIN states ON states.idstates = users.idstate;

SELECT name, email, state
FROM users
LEFT JOIN states ON states.idstates = users.idstate;

SELECT name, email, state, city
FROM users
LEFT JOIN states ON states.idstates = users.idstate
INNER JOIN cities ON idcities = cities_idcities;


SELECT DISTINCT cities_idcities, pets_idpets 
FROM users;

INSERT INTO users (name, email, password, phone,
					cities_idcities, pets_idpets)
VALUES ('carolina', 'carolina@gmail.com', '123',
					'',1,1);


INSERT INTO users SET
					name = 'catalina',
					password = '1223',
					email = 'catalina@gmail.com',
					cities_idcities = 1, 
					pets_idpets = 2;

UPDATE users SET password = 'catalina',
				 email = 'catalina2@gmail.com'
WHERE idusers=8;

DELETE FROM users WHERE idusers IN (8,7,6);



describe SELECT DISTINCT cities_idcities, pets_idpets 
FROM users;


analyze table users;








