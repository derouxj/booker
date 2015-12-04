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
    id integer primary key AUTOINCREMENT UNIQUE,
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