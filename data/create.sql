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
    eventName STRING,
    eventPlace STRING,
    eventDate DATE,
    infos STRING,
    ready integer
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
    phone STRING,
    other STRING
);
