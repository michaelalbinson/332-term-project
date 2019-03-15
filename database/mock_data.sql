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
	(4,"silver","Alt avista"),
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
	(17,"bro nze","Borland"),
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
	(38,"sponsor", "Janna","Snyder",10),
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
	(61,"professional","Jos eph","Owen"),
	(62,"professional","Imogene","Klein"),
	(63,"professional","Mallory","Thomas"),
	(64,"pr ofessional","Dane","Mcintosh");

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

INSERT INTO Session (`id`,`start_time`,`end_time`,`conf_room`,`name`) VALUES 
	(1,"2019-12-27 04:14:49","2019-03-01 09:23:49","DUPUIS HALL","Web Development"),
	(2,"2019-01-22 19:00:33","2019-03-15 16:03:25","ARC 90","Artificial Intelligence"),
	(3,"2018-06-26 22:11:07","2019-05-16 23:47:58","DUPUIS HALL","Blockchain"),
	(4,"2019-03-05 12:37:36","2019-09-02 22:54:50","DUPUIS HALL","Neural Networks"),
	(5,"2018-12-23 16:52:05","2019-07-25 23:19:36","STIRLING 53","Blockchain"),
	(6,"2019- 02-25 21:06:52","2019-12-11 13:24:40","DUPUIS HALL","Machine Learning"),
	(7,"2018-10-17 13:26:39","2018-10-20 00:37:44","ARC 90","Neural Networks"),
	(8,"2019-11-18 08:30:03","2019-03- 19 07:40:06","DUPUIS HALL","How to Make Pasta"),
	(9,"2018-09-15 05:54:49","2019-05-26 06:38:21","ETHERINGTON 5","Neural Networks"),
	(10,"2019-11-18 14:13:38","2018-02-21 21:40:12","ETHERINGTON 5","Machine Learning"),
	(11,"2018-08-26 05:14:47","2019-10-28 22:19:38","DUNNING 101","Web Development"),
	(12,"2019-05-16 16:23:53","2018-04-16 22:22:30","DUPUIS HALL","Machine Learning"),
	(13,"2020-01-10 19:07:07","2018-12-17 04:22:32","STLIRLING 53","Blockchain"),
	(14,"2018-02-16 01:20:47","2018-10-13 11:13:56","ARC 90","Artificial Intelligence"),
	(15,"2018-08-20 12:37:26","2020-02-07 03:41:57","DUNNING 101","Machine Learning"),
	(16,"2018-04-28 08:13:42","2019-05-27 01:45:19","WALLACE 10","Blockchain");

INSERT INTO Speaking (`attendee_id`,`session_id`) VALUES 
	(49,1),
	(50,15),
	(51,3),
	(52,10),
	(53,14),
	(54,14),
	(55,5),
	(56,8),
	(57,7),
	(58,9),
	(59,9),
	(60,3),
	(61,12),
	(62,13),
	(63,11),
	(64,15);







