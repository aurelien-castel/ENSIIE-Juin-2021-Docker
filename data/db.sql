/*
CREATE TABLE "user" (
    id SERIAL PRIMARY KEY ,
    firstname VARCHAR NOT NULL ,
    lastname VARCHAR NOT NULL ,
    birthday date
);

INSERT INTO "user"(firstname, lastname, birthday) VALUES ('John', 'Doe', '1967-11-22');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Yvette', 'Angel', '1932-01-24');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Amelia', 'Waters', '1981-12-01');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Manuel', 'Holloway', '1979-07-25');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Alonzo', 'Erickson', '1947-11-13');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Otis', 'Roberson', '1995-01-09');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Jaime', 'King', '1924-05-30');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Vicky', 'Pearson', '1982-12-12)');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Silvia', 'Mcguire', '1971-03-02');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Brendan', 'Pena', '1950-02-17');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Jackie !!!!', 'Cohen', '1967-01-27');
INSERT INTO "user"(firstname, lastname, birthday) VALUES ('Delores', 'Williamson', '1961-07-19');
*/

CREATE TABLE "user" (
   user_id SERIAL PRIMARY KEY,
   user_name VARCHAR NOT NULL ,
   user_email VARCHAR NOT NULL ,
   user_password VARCHAR NOT NULL ,
   user_level INT NOT NULL
);

INSERT INTO "user" ("user_id","user_name", "user_email", "user_password", "user_level") VALUES
(100,'mulder', '1@1', 'e10adc3949ba59abbe56e057f20f883e', '0'),
(101,'eurelien', '2@2', 'e10adc3949ba59abbe56e057f20f883e', '0'),
(102,'iseline', 'papa@iseline', 'a47a7f88040614dfb7106a9c82dd3190', '0'),
(103,'test', '123@123', '$2y$14$mDyewTI1oSYcB/Pl8yhQxu2IubN6fQKnvMoJOhVPHJaezCiqGBGaO', '0');


CREATE TABLE "form" (
   form_id SERIAL PRIMARY KEY,
   user_id INT,
   form_name VARCHAR NOT NULL ,
   form_password VARCHAR NOT NULL ,
   form_description VARCHAR,
   form_expiration_date DATE NOT NULL
);

INSERT INTO "form" ("form_id","user_id", "form_name","form_password", "form_description","form_expiration_date") VALUES
(100, 103, 'Formulaire test numero 1', 'abc', 'description1', '08-12-2021'),
(101, 103, 'Formulaire test numero 2', 'qwerty', 'description2', '01-02-2021');


CREATE TABLE "question" (
   question_id SERIAL PRIMARY KEY,
   form_id INT,
   question_type VARCHAR NOT NULL,
   question_value VARCHAR NOT NULL,
   question_is_required BOOLEAN NOT NULL
);

INSERT INTO "question" ("question_id","form_id","question_type","question_value","question_is_required") VALUES
(100, 100, 'radio', 'Musique prefere ?', true),
(102, 101, 'radio', 'Musique prefere ?', true),
(103, 100, 'select', 'Sexe  ?', false),
(104, 101, 'select', 'Voter ?', false),
(105, 100, 'text', 'Details ? ',true),
(106, 101, 'select', 'Badaboom ?',true);

CREATE TABLE "possible_answer" (
   possible_answer_id SERIAL PRIMARY KEY,
   question_id INT,
   possible_answer_value VARCHAR NOT NULL
);

INSERT INTO "possible_answer" ("possible_answer_id","question_id","possible_answer_value") VALUES
(100, 100, 'Rap'),
(102, 100, 'Jazz'),
(103, 100, 'Rock'),
(104, 102, 'Metal'),
(105, 102, 'Classique'),
(106, 102, 'Lyrique'),
(107,103 , 'F'),
(108,103 , 'M'),
(109,104 , 'Non'),
(110,104, 'Oui'),
(111,106, 'Boom boom'),
(112,106, 'Boom');

CREATE TABLE "user_answer" (
   user_answer_id SERIAL PRIMARY KEY,
   question_id INT,
   user_answer_value VARCHAR NOT NULL
);

INSERT INTO "user_answer" ("question_id","user_answer_value") VALUES
( 100, 'Rap'),( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rock'),
( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rap'),( 100, 'Rock'),
( 100, 'Jazz'),( 100, 'Rock'),( 100, 'Rock'),( 100, 'Jazz'),
( 100, 'Rap'),( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rock'),
( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rap'),( 100, 'Rock'),
( 100, 'Rap'),( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rock'),
( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rap'),( 100, 'Rock'),
( 100, 'Jazz'),( 100, 'Rock'),( 100, 'Rock'),( 100, 'Jazz'),
( 100, 'Rap'),( 100, 'Rock'),( 100, 'Jazz'),( 100, 'Rock'),
( 105, 'voici des details'),
( 105, 'Nulla fringilla lectus non nibh molestie congue.'),
( 105, 'Aliquam sollicitudin est vitae mauris fermentum mollis.');
