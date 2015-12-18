INSERT INTO users VALUES ("Booker1","1bc230f214bd2069b2918e06debab8cc346d6651","Booker1","Booker1","Booker1@test.fr","Booker1","b","Booker1","https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/512x512/plain/dude3.png");
INSERT INTO users VALUES ("Booker2","1bc230f214bd2069b2918e06debab8cc346d6651","Booker2","Booker2","Booker2@test.fr","Booker2","b","Booker2","https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/512x512/plain/dude3.png");

INSERT INTO users VALUES ("Artiste1","1bc230f214bd2069b2918e06debab8cc346d6651","Artiste1","Artiste1","Artiste1@test.fr","Artiste1","a","Artiste1","https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/512x512/plain/dude3.png");
INSERT INTO users VALUES ("Artiste2","1bc230f214bd2069b2918e06debab8cc346d6651","Artiste2","Artiste2","Artiste2@test.fr","Artiste2","a","Artiste2","https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/512x512/plain/dude3.png");

INSERT INTO event(id, usernameBooker, usernameOrg, eventName, eventPlace, eventDate, infos, ready) VALUES (1, "Booker1", "Organisateur", "Nom", "Place", "Date", "Infos", 0);
INSERT INTO event(id, usernameBooker, usernameOrg, eventName, eventPlace, eventDate, infos, ready) VALUES (2, "Booker2", "Organisateur2", "Nom2", "Place2", "Date2", "Infos2", 0);

INSERT INTO eventsOfUser VALUES ("Booker1", 1);
INSERT INTO eventsOfUser VALUES ("Booker1", 2);