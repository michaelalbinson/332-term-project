USE cmpe_332_project;


-- ATOMIC TABLES MUST BE INSERTED FIRST
-- i.e. room, organizer, sponsor
-- Rooms
INSERT INTO Room (`id`,`num_beds`) VALUES
	(1,2),
	(2,2),
	(3,2),
	(4,3),
	(5,2),
	(6,2),
	(7,2),
	(8,3),
	(9,3),
	(10,2);

-- Sponsors
INSERT INTO Sponsor (`id`,`tier`,`name`) VALUES
	(1,"platinum","Microsoft"),
	(2,"platinum","Sibelius"),
	(3,"platinum","Macromedia"),
	(4,"silver","Altavista"),
	(5,"silver","Microsoft"),
	(6,"platinum","Google"),
	(7,"gold","Microsoft"),
	(8,"platinum","C hami"),
	(9,"bronze","Cakewalk"),
	(10,"bronze","Yahoo"),
	(11,"bronze","Adobe"),
	(12,"bronze","Yahoo"), 
	(13,"bronze","Adobe"),
	(14,"silver","Lycos"),
	(15,"gold","Cakewalk"),
	(16,"silver","Adobe"),
	(17,"bronze","Borland"),
	(18,"silver","Microsoft"),
	(19,"bronze","Yahoo"),
	(20,"silver","Borland");

-- Student Attendees
INSERT INTO Attendee (`id`,`type`,`first_name`,`last_name`,`room_number`) VALUES 
	(65,"student","Patience","Lloyd",1),
	(66,"student","Dieter","Franco",4),
	(67,"student","Louis","Aco sta",4),
	(68,"student","Quin","Bell",3),
	(69,"student","Rajah","Frost",6),
	(70,"student","Felicia"," Hawkins",4),
	(71,"student","Ann","Vinson",3),
	(72,"student","Daphne","Ortega",3),
	(73,"student","Sha nnon","Giles",3),
	(74,"student","Ramona","Chandler",9),
	(75,"student","Madeline","Holloway",9),
	(76,"student","Rinah","Burgess",1),
	(77,"student","Macy","Mccarty",1),
	(78,"student","Harlan","Wilkerso n",7),
	(79,"student","Veronica","Welch",8),
	(80,"student","Basia","Shelton",2);

-- Sponsor Attendees
INSERT INTO Attendee (`id`,`type`,`first_name`,`last_name`,`sponsor_id`) VALUES 
	(33,"sponsor","Dominique","Long",18),
	(34,"sponsor","Blair","Burt",19),
	(35,"sponsor","Brendan","Bu sh",17),
	(36,"sponsor","Remedios","Peterson",14),
	(37,"sponsor","Illana","Suarez",8),
	(38,"sponsor","Janna","Snyder",10),
	(39,"sponsor","Jolie","Walls",12),
	(40,"sponsor","Hanna","Vang",17),
	(41,"sponsor","Tanek","Baxter",9),
	(42,"sponsor","Quincy","Mcknight",7),
	(43,"sponsor","Reese","Rodriquez",13),
	(44,"sponsor","Blossom","Benjamin",4),
	(45,"sponsor","Brittany","Burnett",16),
	(46,"sponsor","Iv ana","Grimes",6),
	(47,"sponsor","Adele","Jacobs",19),
	(48,"sponsor","Nita","Kinney",11);

-- Professional Attendees
INSERT INTO Attendee (`id`,`type`,`first_name`,`last_name`) VALUES 
	(49,"professional","Leroy","Kirkland"),
	(50,"professional","Wallace","Weiss"),
	(51,"professional","Claire","Roy"),
	(52,"professional","Demetria","Bishop"),
	(53,"professional","Georgia","Benson"),
	(54,"professional","Rudyard","Richards"),
	(55,"professional","Harper","Cardenas"),
	(56,"professional","Caleb","Mccullough"),
	(57,"professional","Leilani","Baird"),
	(58,"professional","Garrison","Fry"), 
	(59,"professional","Dillon","May"),
	(60,"professional","Madonna","Barker"),
	(61,"professional","Joseph","Owen"),
	(62,"professional","Imogene","Klein"),
	(63,"professional","Mallory","Thomas"),
	(64,"professional","Dane","Mcintosh");

-- Organizers
INSERT INTO Organizer(`id`, `first_name`, `last_name`) VALUES 
	(1, "Bob", "Jones"), 
	(2, "Lisa", "Turner"), 
	(3, "Jimmy", "Jones"), 
	(4, "Drake", "From Toronto");

INSERT INTO Job (`id`,`sponsor_id`,`title`,`city`,`province`,`pay_rate`) VALUES 
	(1,1,"Mechanical Engineer","Hody","British Columbia",36),
	(2,2,"civil Engineer","Ripabottoni","Alberta",21),
	(3,3,"Chemical Engineer","Hamm","British Columbia",32),
	(4,4,"Computer Engineer","Castlegar","British Columbia",21),
	(5,5,"Computer Engineer","Chonchi","Manitoba ",22),
	(6,6,"Chemical Engineer","Chelsea","British Columbia",31),
	(7,7,"Software Dev","Auburn","Alberta",40),
	(8,8,"Chemical Engineer","Pietrasanta","Alberta",37),
	(9,9,"Computer Engineer","Louth","Ontario",29),
	(10,10,"Domputer Engineer","Montenero Val Cocchiara","Quebec",28),
	(11,11,"Software Dev","Ponoka","British Columbia",24),
	(12,12,"Mechanical Engineer","Richmond","Ontario",41),
	(13,13,"Computer Engineer","Rocky Mountain House","Ontario",34),
	(14,14,"Mechanical Engineer","Fahler","Quebec",22),
	(15,15,"Civil Engineer","Vito d'Asio","Alberta",46),
	(16,16,"Chemical Engineer","Murdochville","Manitoba ",25),
	(17,17,"Mechanical Engineer","Aguacaliente (San Francisco)","Alberta",37),
	(18,18,"Chemical Engineer","Chiusa/Klausen","Alberta",24),
	(19,19,"Mechanical Engineer","Etalle","Alberta",51),
	(20,20,"Computer Engineer","Minto","Manitoba ",59);

INSERT INTO Subcommittee (`id`,`name`,`chair`) VALUES 
	(1,"Techincal Outreach",1),
	(2,"Snacks",2),
	(3,"Events",3),
	(4,"Sponsorship",4),
	(5,"Website",1),
	(6,"Delegates",3),
	(7,"Drake Concert",4);

INSERT INTO On_Committee (`organizer_id`,`subcommittee_id`) VALUES 
	(1,5),
	(2,5),
	(3,4),
	(4,4),
	(1,6),
	(2,4),
	(3,7),
	(4,3),
	(1,1),
	(2,2),
	(3,1),
	(4,6),
	(1,6),
	(2,6),
	(3,3);

-- "2019-04-05" Friday
-- "2019-04-06" Saturday

INSERT INTO Session (`id`,`start_time`,`end_time`,`conf_room`,`name`) VALUES 
	(1,"2019-04-05 18:00:00","2019-04-05 19:00:00","DUPUIS HALL","Welcoming Ceremonies"),
	(2,"2019-04-05 19:00:00","2019-04-05 20:00:00","ARC 90","Artificial Intelligence"),
	(3,"2019-04-05 19:00:00","2019-04-05 20:00:00","DUPUIS HALL","Blockchain"),
	(4,"2019-04-05 20:00:00","2019-04-05 21:00:00","DUPUIS HALL","Neural Networks"),
	(5,"2019-04-05 20:00:00","2019-04-05 21:00:00","STIRLING 53","Blockchain"),
	(6,"2019-04-05 21:00:00","2019-04-05 22:00:00","DUPUIS HALL","Friday Keynote"),
	(7,"2019-04-06 08:00:00","2019-04-06 10:00:00","ARC 90","Morning Welcome"),
	(8,"2019-04-06 10:00:00","2019-04-06 12:00:00","DUPUIS HALL","Speaker: How to Make Pasta"),
	(9,"2019-04-06 12:00:00","2019-04-06 13:00:00","ETHERINGTON 5","Lunch"),
	(10,"2019-04-06 13:00:00","2019-04-06 15:00:00","ETHERINGTON 5","Machine Learning"),
	(11,"2019-04-06 13:00:00","2019-04-06 15:00:00","DUNNING 101","Web Development"),
	(12,"2019-04-06 15:00:00","2019-04-06 16:00:00","DUPUIS HALL","Machine Learning"),
	(13,"2019-04-06 15:00:00","2019-04-06 16:00:00","STLIRLING 53","Blockchain"),
	(14,"2019-04-06 16:00:00","2019-04-06 18:00:00","ARC 90","Artificial Intelligence"),
	(15,"2019-04-06 18:00:00","2019-04-06 20:00:00","DUNNING 101","Dinner + Saturday Keynote"),
	(16,"2019-04-06 20:00:00","2019-04-06 21:00:00","WALLACE 10","Drake Concert");

INSERT INTO Speaking (`attendee_id`,`session_id`) VALUES 
	(49,1),
	(59,2),
	(51,3),
	(52,4),
	(55,5),
	(52,6),
	(57,7),
	(56,8),
	(58,9),
	(52,10),
	(63,11),
	(61,12),
	(62,13),
	(54,14),
	(50,15);
	







