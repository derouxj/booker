INSERT INTO users VALUES ("jejej","test","jeremy","carre","jeje@test.fr","maville","booker","les infos","img.png");
INSERT INTO contacts VALUES (2,"jejej","le prenom","le nom","l'email@test.fr","la-ville","son metiers","0642350091","il a plein d'info super utile qu'il ne faut pas oublier meme si s'est tres long voir trop long il faudra que ca soit beau et bien placé");
INSERT INTO contacts VALUES (3,"jejej","le prenom","le nom","l'email@test.fr","la-ville","le metiers","0"+"000642350091","il a plein d'info super utile qu'il ne faut pas oublier meme si s'est tres long voir trop long il faudra que ca soit beau et bien placé");






/*
CREATE TABLE users (
    username STRING primary key,
    password STRING,
    firstname STRING,
    lastname STRING,
    email STRING,
    place STRING,
    usertype STRING,
    infos STRING,
    profilpic STRING
);

CREATE TABLE event (
    id integer primary key AUTOINCREMENT,
    usernameBooker STRING references users(username),
    usernameOrg STRING references users(username),
    artists STRING references users(username),
    eventDate STRING,
    infos STRING
);

CREATE TABLE eventsOfUser(
    username STRING references users(username),
    id integer references event(id),
    primary key(username, id)
);

CREATE TABLE contacts(
    idC integer primary key AUTOINCREMENT,
    usernameProp STRING references users(username),
    firstname STRING,
    lastname STRING,
    email STRING,
    town STRING,
    job STRING,
    phone integer,
    other STRING
);*/