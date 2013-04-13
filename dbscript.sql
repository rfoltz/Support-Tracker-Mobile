-- Source File: dbscript.sql
-- Name:Robert Foltz
-- Last Modified By: Robert Foltz
-- Website Name: Support Tracker
-- File Description: This is the script used to create the database for Support Tracker with some dummy inserts.

CREATE DATABASE robertfo_stracker;

CREATE TABLE robertfo_stracker.techs
(
UserID INT NOT NULL AUTO_INCREMENT,
Firstname VARCHAR(30) NOT NULL,
Lastname VARCHAR(30) NOT NULL,
Username VARCHAR(30) NOT NULL,
Password VARCHAR(40) NOT NULL,
PRIMARY KEY (UserID)
);

CREATE TABLE robertfo_stracker.category
(
CatID INT NOT NULL AUTO_INCREMENT,
Catname VARCHAR(60) NOT NULL, 
PRIMARY KEY (CatID)
);

CREATE TABLE robertfo_stracker.tickets
(
Num INT NOT NULL AUTO_INCREMENT,
Created DATETIME NOT NULL,
Updated DATETIME NOT NULL,
CEmail VARCHAR(120) NOT NULL,
CName VARCHAR(120) NOT NULL,
CCountry VARCHAR(120) NOT NULL,
Issue LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
Technician INT,
Category INT NOT NULL,
Completed CHAR default 'N',
PRIMARY KEY (Num),
FOREIGN KEY (Category) REFERENCES robertfo_stracker.category(CatID),
FOREIGN KEY (Technician) REFERENCES robertfo_stracker.techs(UserID)
);


INSERT INTO robertfo_stracker.techs (Firstname, Lastname, Username, Password)
VALUES ('Robert','Foltz','rfoltz','09c0a300a137693e18d4b80aa23bbcaf74247090'), -- Password = 123456
('Kaitlyn','Gray','kgray','09c0a300a137693e18d4b80aa23bbcaf74247090'), -- Password = 123456
('Tom','Tsiliopoulos','ttsiliopoulos','09c0a300a137693e18d4b80aa23bbcaf74247090'), -- Password = 123456
('What','Demo','demo','09c0a300a137693e18d4b80aa23bbcaf74247090'); -- Password = 123456


INSERT INTO robertfo_stracker.category (Catname)
VALUES ('General Issues'),
('Product Questions'),
('Motherboard'),
('Graphics Card'),
('Network Card'),
('Sound Card'),
('Software'),
('Operating System'),
('Other');

INSERT INTO robertfo_stracker.tickets (Created, Updated, CEmail, CName, CCountry, Issue, Technician, Category)
VALUES ('2013-04-02 13:00:00','2013-04-05 12:01','rfoltz@mail.com','Robert Foltz', 'Canada', 'I just wanted to know about Product X', NULL, 2),
('2013-04-03 13:00:00','2013-04-05 12:01','bharris@mail.com','Bob Harris', 'Canada', 'I''m Having an issue with Product Y', NULL, 1),
('2013-04-04 13:00:00','2013-04-05 12:01','alock@mail.com','Amanda Lock', 'Canada', 'I just wanted to know about Product X', NULL, 2),
('2013-04-05 13:00:00','2013-04-05 12:01','ksmith@mail.com','Kevin Smith', 'Canada', 'I''m Having an issue with Product Y', NULL, 1),
('2013-04-06 13:00:00','2013-04-06 12:01','jlannister@mail.com','Jamie Lannister', 'Canada', 'I just wanted to know about Product X', 2, 2),
('2013-04-07 13:00:00','2013-04-07 12:01','nstark@mail.com','Ned Stark', 'Canada', 'I''m Having an issue with Product Y', 1, 1),
('2013-04-08 13:00:00','2013-04-08 12:01','gmartin@mail.com','George Martin', 'Canada', 'I just wanted to know about Product X', 2, 2),
('2013-04-09 13:00:00','2013-04-09 12:01','rjordan@mail.com','Robert Jordan', 'Canada', 'I''m Having an issue with Product Y', 1, 1),
('2013-04-10 13:00:00','2013-04-10 12:01','bsanderson@mail.com','Brandon Sanderson', 'Canada', 'I just wanted to know about Product X', 3, 2),
('2013-04-07 13:00:00','2013-04-07 12:01','nstark@mail.com','Ned Stark', 'Canada', 'I''m Having an issue with Product Y', 4, 1),
('2013-04-08 13:00:00','2013-04-08 12:01','gmartin@mail.com','George Martin', 'Canada', 'I just wanted to know about Product X', 4, 2),
('2013-04-09 13:00:00','2013-04-09 12:01','rjordan@mail.com','Robert Jordan', 'Canada', 'I''m Having an issue with Product Y', 4, 1),
('2013-04-10 13:00:00','2013-04-10 12:01','bsanderson@mail.com','Brandon Sanderson', 'Canada', 'I just wanted to know about Product X', 4, 2);
