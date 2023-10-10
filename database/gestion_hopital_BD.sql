create database gestion_hopital;
use gestion_hopital;
create table patient(
id_Patient int primary key not null auto_increment,
Nom varchar(25),
Prenom varchar (25),
Cin varchar(25),
Sexe varchar(25),
Telephone varchar(25),
date_naissance date,
Antécédents varchar(60),
Maladies varchar(60),
Sensibilité varchar(60)
);
create table personnel(
id_Personnel int not null auto_increment,
nom varchar(255) not null,
prenom varchar(255) not null,
rôle varchar(255) not null,
email varchar(255) not null,
motdepass varchar(255) not null,
telephone int not null,
adresse varchar(255) not null,
date_naissance date not null,
date_debut_de_travail date not null,
primary key(id_Personnel)
);
create table Medecin(
id_medecin int primary key not null auto_increment,
specialité varchar(255) not null,
id_Personnel int,
foreign key (id_Personnel) references Personnel(id_Personnel)
);
create table Consultation (
id_consultation int not null primary key auto_increment,
date_consultation date,
traitement_demandé varchar (100), 
id_medecin int,
id_patient int,
foreign key (id_medecin) references medecin (id_medecin),
foreign key (id_Patient) references Patient (id_Patient)
);
create table Chambre(
id_chambre int not null,
type_chambre varchar(25),
numéro  varchar(25),
état varchar(50),
primary key (id_chambre)
);

create table Hospitalisation(
id_hospitalisation int not null auto_increment,
date_entre date,
date_sortie date,
motif_entre varchar(50),
motif_sortie varchar(50),
id_chambre int not null,
id_patient int not null,
foreign key(id_chambre) references chambre (id_chambre),
foreign key(id_patient) references Patient (id_patient),
primary key(id_hospitalisation)
);

create table Examination
(id_medecin int not null,
id_hospitalisation int not null,
date_exam date,
decision varchar (100),
foreign key(id_medecin) references medecin (id_medecin),
foreign key(id_hospitalisation) references Hospitalisation (id_hospitalisation)
);
-- insertion des lignes
insert into Patient values
(default,'AYTAOUI','AZIZ','M435282','M',0625598741,'1956-12-15','Hypertension artérielle','Hypertension artérielle','ALLERGIE À LA PÉNICILLINE'),
(default,'Azizi','Abdelhamid','EE940534','M',0612536481,'1955-09-01','Diabète de type 2','Cardiopathies congénitales','Sans sensibilité'),
(default,'azzami','salma','AE296640','F',0614856978,'1969-07-26','hypercholestérolémie','hypercholestérolémie','Sans sensibilité'),
(default,'AZZOUZI','IMANE','FB128210','F',061485910,'1988-01-22','Père : diabète','diabète de type 2','Sans sensibilité'),
(default,'BAIKOU','Riad','UA125042','M',0648759632,'1986-12-14','sans antécédents','Rachis',"Allergie à l'aspirine"),
 (default,'Bakrim','Kaoutar','J557198','F',069874556,'1999-01-22','Hypertension artérielle','diabète de type 2',"Allergie aux piqûres d''insectes"),
 (default,'Chtioui','Ismail','I761631','M',0625598751,'1976-08-15','Père : diabète','Cancérologie digestive','Allergie au sumac vénéneux'),
 (default,'DADA','BOUJAMAA','CB301812','M',0712598741,'1983-12-09','sans antécédents','Sciatiques','sensibilité aux médicaments'),
 (default,'DADOUCH','ELMAJID','ID95265','M',0626598741,'1956-10-05','sans antécédents','Douleurs tendineuses et musculaires','Sans sensibilité'),
 (default,'GUEDDAH','HAJAR','I755130','F',069874556,'1999-01-22','sans antécédents','Sinusites aigues','ALLERGIE À LA PÉNICILLINE'),
(default,'Guelouaze','Meriem','Gk157612','F',069874556,'1999-01-22','sans antécédents','Lymphomes','Sans sensibilité'),
(default,' HABATI','YOUSSEF','SH210375','M',0678124532,'1993-06-06','Père : diabète,Leucémies','Lymphomes','Sans sensibilité'),
(default,'IMANI','Houda','CD298659','F',0612345456,'1960-11-10','Père : diabète','Leucémies','Sans sensibilité'),
(default,'ISMAILI','SAFAE','D598498','F',0612345506,'1970-11-20','Père : diabète','Proctologie médicale et chirurgicale','ALLERGIE À LA PÉNICILLINE'),
(default,'ITRBI','AHMED','Q338831','M',0698740006,'1977-04-19','sans antécédents','Rhumatologie interventionnelle','Rhumatologie'),
 (default,'JAAOUANI','ZAKARIA','N443727','M',0601245506,'1990-01-19','sans antécédents','écho-endoscopie','Sans sensibilité'),
(default,'jabi','majda','BK720226','F',0626314485,'1977-10-05','Père : diabète','Cancérologie digestive','ALLERGIE À LA PÉNICILLINE'),
(default,'JABRANE','MOHAMED','BA10262','M',0697745541,'1957-05-03','hypercholestérolémie','hypercholestérolémie','Sans sensibilité'),
(default,'MOKDAD','CHERKOUI','IB241069','M',0678745541,'1967-11-11','diabète','Cancérologie digestive','Allergie au sumac vénéneux'),
(default,'WARID','ABDE NNOUR','U207088','M',0698745506,'1977-01-19','sans antécédents','Douleurs tendineuses et musculaires','Sans sensibilité'),
(default,'YASSINE','SANAE','I745492','F',0626314785,'1987-10-05','sans antécédents','Rhumatologie interventionnelle','Rhumatologie'),
(default,'ZAHID','Youssef','Y503141','M',0698745541,'1997-01-09','sans antécédents','Lymphomes','Sans sensibilité'),
(default,'Smayou','Imane','JE318461','F',0626352145,'2000-12-25','Père : diabète','Cancérologie digestive','ALLERGIE À LA PÉNICILLINE');

insert into Personnel values 
(default,"Alami","Ahmed","infirmier","ahmedAlami@gamil.com","A2009",0652779280,"fes","1998-05-31","2019-12-01"),
(default,"madani","saad","Medecin","madaniSaad@gamil.com","B2008",0645756982,"taza","1994-02-03","2020-10-11"),
(default,"alariss","ayoyb","Medecin","alAriss@gamil.com","C2007",0641693527,"fes","1995-02-15","2019-12-01"),
(default,"saidi","soufiane","infirmier","saiddi12@gamil.com","D2006",0614759630,"meknes","1990-02-15","2015-02-17"),
(default,"dahbi","sanae","Medecin","DocSanae@gamil.com","E2005",0645632108,"fes","1994-12-19","2016-10-09"),
(default,"sahiri","mouna","chargé de réception","Mouna0208@gamil.com","F2003",0678963214,"fes","2001-12-26","2020-10-10"),
(default,"karom","abdo","Medecin","abdouKarom01@gamil.com","G2002",0685967412,"fes","2000-12-15","2021-12-10"),
(default,"sadik","ismail","infirmier","isooSadik@gamil.com","H2001",0653214569,"fes","1995-02-14","2018-02-19"),
(default,"diouri","asmae","infirmier","DiouriAsmae@gamil.com","I2000",0689857410,"taza","1994-07-12","2015-10-07"),
(default,"achibane","chaimae","Medecin","AchibaneChaimae@gamil.com","J1999",0667913452,"fes","1998-04-10","2020-08-02"),
(default,"alaoui","hamid","Administrateur","alaouihamid@gamil.com","cd12199",0667911402,"fes","1967-09-11","2000-08-02");

insert into medecin values
(default,"Rhumatologie",2),
(default,"gynecologist",3),
(default,"générale",5),
(default,"ophtalmologue",7),
(default,"ORL et cervico-faciale",10);

insert into Consultation values
(default,'2023-01-22','description de traitement 1',1,1 ),
(default,'2023-01-22','description de traitement 2',1,2 ),
(default,'2023-01-22','description de traitement 3',1,3 ),
(default,'2023-02-22','description de traitement 4',2,4 ),
(default,'2023-01-12','description de traitement 5',2,5 ),
(default,'2023-01-22','description de traitement 6',2,6 ),
(default,'2023-01-22','description de traitement 7',3,7 ),
(default,'2023-01-22','description de traitement 8',3,8 ),
(default,'2023-01-22','description de traitement 9',3,9 ),
(default,'2022-03-22','description de traitement 10',4,10),
(default,'2023-04-22','description de traitement 11',4,11 ),
(default,'2022-03-22','description de traitement 12',4,13 ),
(default,'2023-2-23','description de traitemen 13' ,5,14 );

insert into chambre values
(1,'simple','A1','disponible'),
(2,'simple','A2','non disponible'),
(3,'simple','A3','disponible'),
(4,'simple','A5','non disponible'),
(5,'simple','A5','disponible'),
(6,'simple','B1','non disponible'),
(7,'simple','B2','disponible'),
(8,'simple','B3','non disponible'),
(9,'simple','B4','disponible'),
(10,'simple','B5','disponible'),
(11,'simple','C1','non disponible'),
(12,'simple','C2','disponible'),
(13,'simple','C3','non disponible'),
(14,'simple','C4','disponible'),
(15,'simple','C5','non disponible'),
(16,'urgence','D1','disponible'),
(17,'urgence','D2','non disponible'),
(18,'urgence','D3','disponible'),
(19,'urgence','D4','non disponible'),
(20,'urgence','D5','disponible');

insert into Hospitalisation values
(default,'2023-01-01','2023-01-02','Chirurgie','more',11,7);
insert into Hospitalisation(date_entre,motif_entre,id_chambre,id_patient) values
('2023-01-12','douleur',2,15),
('2023-01-22','Chirurgie',4,3),
('2023-01-15','douleur',6,5);

insert into Examination values 
(1,1,'0000-00-00',""),
(1,2,'0000-00-00',""),
(2,3,'0000-00-00',""),
(2,4,'0000-00-00',""),
(4,4,'0000-00-00',"");