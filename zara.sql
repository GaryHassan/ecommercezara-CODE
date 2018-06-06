DROP DATABASE IF EXISTS zara_bdd;

CREATE DATABASE IF NOT EXISTS zara_bdd;

USE zara_bdd;


#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: PRODUIT
#------------------------------------------------------------

CREATE TABLE PRODUIT(
        id_produit             Int (11) Auto_increment  NOT NULL ,
        id_categorie           Int ,
        id_sous_ctg            Int ,
        id_sous_produit        Int ,
        id_photo               Int ,
        titre_pdt              Varchar (100) ,
        photos_pdt             Varchar (100) ,
        prix_pdt               Varchar (100) ,
        description_pdt        Varchar (255) ,
        
        PRIMARY KEY (id_produit),
        FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie),
        FOREIGN KEY (id_sous_ctg) REFERENCES sous_categorie(id_sous_ctg),
        FOREIGN KEY (id_sous_produit) REFERENCES sous_produit(id_sous_produit),
        FOREIGN KEY (id_photo) REFERENCES photo(id_photo)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE USER(
        id_user     int (11) Auto_increment  NOT NULL ,
        nom_user    Varchar (100) ,
        prenom_user Varchar (100) ,
        pseudo_user Varchar (100) ,
        age_user    Varchar (100) ,
        email_user  Varchar (255) ,
        mdp_user    Varchar (255) ,
        PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SOUS_CATEGORIE
#------------------------------------------------------------

CREATE TABLE SOUS_CATEGORIE(
        id_sous_ctg   int (11) Auto_increment  NOT NULL ,
        type_sous_ctg Varchar (50) ,
        PRIMARY KEY (id_sous_ctg)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE CATEGORIE(
        id_categorie    int (11) Auto_increment  NOT NULL ,
        designation_ctg Varchar (100) ,
        PRIMARY KEY (id_categorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PHOTO
#------------------------------------------------------------

CREATE TABLE PHOTO(
        id_photo           int (11) Auto_increment  NOT NULL ,
        id_produit         Int (11),
        image              Varchar (100) ,
        PRIMARY KEY (id_photo),
        FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COMMANDE
#------------------------------------------------------------

CREATE TABLE COMMANDE(
        id_commande  int (11) Auto_increment  NOT NULL ,
        id_user      Int (11),
        id_adresse   Int (11),
        date_cmd     Date ,
        PRIMARY KEY (id_commande),
        FOREIGN KEY (id_user) REFERENCES user(id_user),
        FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ADRESSE
#------------------------------------------------------------

CREATE TABLE ADRESSE(
        id_adresse      int (11) Auto_increment  NOT NULL ,
        numero_adr      Mediumint ,
        rue_adr         Varchar (100) ,
        ville           Varchar (100) ,
        pays            Varchar (100) ,
        code_postal_adr Int ,
        complement_adr  Text ,
        PRIMARY KEY (id_adresse)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FACTURE
#------------------------------------------------------------

CREATE TABLE FACTURE(
        id_facture Int (11) Auto_increment  NOT NULL ,
        id_user    Int (11),
        PRIMARY KEY (id_facture),
        FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SOUS_PRODUIT
#------------------------------------------------------------

CREATE TABLE SOUS_PRODUIT(
        id_sous_produit int (11) Auto_increment  NOT NULL ,
        id_sous_ctg     Int(11) ,
        designation     Varchar (100) ,
        PRIMARY KEY (id_sous_produit),
        FOREIGN KEY (id_sous_ctg) REFERENCES sous_categorie(id_sous_ctg)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VETEMENT
#------------------------------------------------------------

CREATE TABLE VETEMENT(
        taille     Varchar (100) ,
        id_produit Int (11) NOT NULL ,
        PRIMARY KEY (id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CHAUSSURE
#------------------------------------------------------------

CREATE TABLE CHAUSSURE(
        couleur    Varchar (100) ,
        id_produit Int (11) NOT NULL ,
        PRIMARY KEY (id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PARFUM
#------------------------------------------------------------

CREATE TABLE PARFUM(
        quantite   Varchar (25) ,
        id_produit Int (11) NOT NULL ,
        PRIMARY KEY (id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ACHETER
#------------------------------------------------------------

CREATE TABLE ACHETER(
        id_user    Int (11) NOT NULL ,
        id_produit Int (11) NOT NULL ,
        PRIMARY KEY (id_user),
        FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: HABITER
#------------------------------------------------------------

CREATE TABLE HABITER(
        id_adresse Int (11) NOT NULL ,
        id_user    Int (11) NOT NULL ,
        PRIMARY KEY (id_adresse),
        FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RELIER
#------------------------------------------------------------

CREATE TABLE RELIER(
        id_sous_produit Int (11) NOT NULL ,
        id_produit      Int (11) NOT NULL ,
        PRIMARY KEY (id_sous_produit),
        FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FILTRER
#------------------------------------------------------------

CREATE TABLE FILTRER(
        id_sous_produit Int (11) NOT NULL ,
        id_sous_ctg     Int (11) NOT NULL ,
        PRIMARY KEY (id_sous_produit),
        FOREIGN KEY (id_sous_ctg) REFERENCES sous_categorie(id_sous_ctg)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: LIER
#------------------------------------------------------------

CREATE TABLE LIER(
        id_sous_ctg  Int (11) NOT NULL ,
        id_categorie Int (11) NOT NULL ,
        PRIMARY KEY (id_sous_ctg),
        FOREIGN KEY (id_categorie ) REFERENCES categorie(id_categorie );
)ENGINE=InnoDB;

ALTER TABLE user
ADD CONSTRAINT FK_id_adresse_ADRESSE FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse);

ALTER TABLE PRODUIT ADD CONSTRAINT FK_PRODUIT_id_categorie_CATEGORIE FOREIGN KEY (id_categorie_CATEGORIE) REFERENCES CATEGORIE(id_categorie);
ALTER TABLE PHOTO ADD CONSTRAINT FK_PHOTO_id_produit_PRODUIT FOREIGN KEY (id_produit_PRODUIT) REFERENCES PRODUIT(id_produit);
ALTER TABLE COMMANDE ADD CONSTRAINT FK_COMMANDE_id_user_USER FOREIGN KEY (id_user_USER) REFERENCES USER(id_user);
ALTER TABLE FACTURE ADD CONSTRAINT FK_FACTURE_id_user FOREIGN KEY (id_user) REFERENCES USER(id_user);
ALTER TABLE VETEMENT ADD CONSTRAINT FK_VETEMENT_id_produit FOREIGN KEY (id_produit) REFERENCES PRODUIT(id_produit);
ALTER TABLE CHAUSSURE ADD CONSTRAINT FK_CHAUSSURE_id_produit FOREIGN KEY (id_produit) REFERENCES PRODUIT(id_produit);
ALTER TABLE PARFUM ADD CONSTRAINT FK_PARFUM_id_produit FOREIGN KEY (id_produit) REFERENCES PRODUIT(id_produit);
ALTER TABLE ACHETER ADD CONSTRAINT FK_ACHETER_id_user FOREIGN KEY (id_user) REFERENCES USER(id_user);
ALTER TABLE ACHETER ADD CONSTRAINT FK_ACHETER_id_produit FOREIGN KEY (id_produit) REFERENCES PRODUIT(id_produit);
ALTER TABLE HABITER ADD CONSTRAINT FK_HABITER_id_adresse FOREIGN KEY (id_adresse) REFERENCES ADRESSE(id_adresse);
ALTER TABLE HABITER ADD CONSTRAINT FK_HABITER_id_user FOREIGN KEY (id_user) REFERENCES USER(id_user);
ALTER TABLE RELIER ADD CONSTRAINT FK_RELIER_id_sous_produit FOREIGN KEY (id_sous_produit) REFERENCES SOUS_PRODUIT(id_sous_produit);
ALTER TABLE RELIER ADD CONSTRAINT FK_RELIER_id_produit FOREIGN KEY (id_produit) REFERENCES PRODUIT(id_produit);
ALTER TABLE FILTRER ADD CONSTRAINT FK_FILTRER_id_sous_produit FOREIGN KEY (id_sous_produit) REFERENCES SOUS_PRODUIT(id_sous_produit);
ALTER TABLE FILTRER ADD CONSTRAINT FK_FILTRER_id_sous_ctg FOREIGN KEY (id_sous_ctg) REFERENCES SOUS_CATEGORIE(id_sous_ctg);
ALTER TABLE LIER ADD CONSTRAINT FK_LIER_id_sous_ctg FOREIGN KEY (id_sous_ctg) REFERENCES SOUS_CATEGORIE(id_sous_ctg);
ALTER TABLE LIER ADD CONSTRAINT FK_LIER_id_categorie FOREIGN KEY (id_categorie) REFERENCES CATEGORIE(id_categorie);


INSERT INTO `produit` (`id_produit`, `id_categorie`, `id_sous_ctg` ,`id_sous_produit`, `id_photo`, `titre_pdt`, `photos_pdt`, `prix_pdt`, `description_pdt`) VALUES

#FEMMES

#JEANS
(1, 1, 4, 7, 0, 'JEAN KAKI AVEC BANDE LATERALE', 'jeanskinny1.jpg', '29,95', ''),
(2, 1, 4, 7, 0, 'JEAN NOIR AVEC BANDE LATERALE DORE', 'jeanskinny2.jpg', '29,95', ''),
(3, 1, 4, 8, 0, 'JEAN SLIM DELAVE GRIS', 'jeanslim1.jpg', '29,95', ''),
(4, 1, 4, 8, 0, 'JEAN SLIM BLEU', 'jeanslim2.jpg', '29,95', ''),

#JUPES
(5, 1, 5, 9, 0, 'MINI JUPE NOIRE AVEC PERLES', 'jupescourte1.jpg', '29,95', 'Mini jupe avec taille à plis et péplum avec perles. Fermeture au dos par zip invisible sur la couture.'),
(6, 1, 5, 9, 0, 'MINI JUPE NOIRE AVEC FLEURS', 'jupescourte2.jpg', '29,95', 'Mini jupe en velours avec détails fleurs brodés. Zip dissimulé dans la couture sur le côté.'),
(7, 1, 5, 10, 0, 'JUPE LONGUE NOIRE FLEURIE', 'jupeslongue1.jpg', '39,95', 'Jupe longue noir avec fleurs en velours.'),
(8, 1, 5, 10, 0, 'JUPE LONGUE GRISE AVEC FENTE', 'jupeslongue2.jpg', '39,95', 'Jupe longue grise avec boutons sur le côté.'),

#ROBES
(9, 1, 6, 11, 0, 'ROBE COURTE NOIR COL CHEMISE', 'robescourtes1.jpg', '49,95', 'Robe courte à col classique et manches longues. Col et poignets en contraste. Nœud en velours au col et aux poignets.'),
(10, 1, 6, 11, 0, 'ROBE COURTE BLEU AVEC PERLES BLANCHES', 'robescourtes2.jpg', '49,95', ''),
(11, 1, 6, 12, 0, 'ROBE LONGUE BLEU/NOIR BRILLANTE', 'robeslongues1.jpg', '59,95', 'Robe longue avec col en V plongeant. Détail à la taille et tissu plissé à brillants. Fermeture au décolleté par nœud.'),
(12, 1, 6, 12, 0, 'ROBE LONGUE BORDEAUX EN MAILLE COTELEE', 'robeslongues2.jpg', '59,95', 'Robe à col roulé avec manches longues et fentes sur les poignets.'),

#SWEATS
(13, 1, 1, 1, 0, 'SWEAT A CAPUCHE TEXTUREL', 'capuchefemme1.jpg', '39,95', 'Sweat à capuche texturée et manches longues. Poches avant. Fermeture par zip à anneau.'),
(14, 1, 1, 1, 0, 'SWEAT A FUSEE', 'capuchefemme2.jpg', '19,95', 'Sweat court à capuche et manches longues. Appliqué texturé sur le devant en velours avec brillants.'),
(15, 1, 1, 2, 0, 'SWEAT OVERSIZE À MANCHES EFFET FAUSSE FOURRURE', 'zipfemme1.jpg', '59,95', 'Sweat oversize à capuche et manches longues à texture effet fausse fourrure colorées. Poches avant passepoilées. Fermeture par zip sur le devant.'),
(16, 1, 1, 2, 0, 'SWEAT A COL ENVELOPPANT', 'zipfemme2.jpg', '39,95', 'Veste à col enveloppant. Manches longues avec élastique aux poignets. Poches sur les côtés. Ourlets élastiques. Fermeture par zip sur le devant'),



#HOMME

#JEANS
(17, 2, 4, 7, 0, 'JEAN GRIS TROUE', 'jeanskinny1.jpg', '49,95', ''),
(18, 2, 4, 7, 0, 'JEAN BLEU TROUE', 'jeanskinny2.jpg', '49,95', ''),
(19, 2, 4, 8, 0, 'JEAN SLIM BLEU FONCE', 'jeanslim1.jpg', '49,95', ''),
(20, 2, 4, 8, 0, 'JEAN SLIM BLEU CIEL DELAVE', 'jeanslim2.jpg', '49,95', ''),

#POLOS
(21, 2, 2, 3, 0, 'POLO GRIS CHINE', 'polocourt1.jpg', '29,95', ''),
(22, 2, 2, 3, 0, 'POLO BLEU DAIM', 'polocourt2.jpg', '29,95', ''),
(23, 2, 2, 4, 0, 'POLO LONG GRIS COL BLEU', 'pololong1.jpg', '34,95', ''),
(24, 2, 2, 4, 0, 'POLO LONG NOIR COL CAMEL', 'pololong2.jpg', '34,95', ''),

#SWEATS
(25, 2, 1, 1, 0, 'SWEAT A CAPUCHE BEIGE INSCRIPTION', 'sweatcapuche1.jpg', '39,95', ''),
(26, 2, 1, 1, 0, 'SWEAT A CAPUCHE VERT AVEC CORDONS', 'sweatcapuche2.jpg', '29,95', ''),
(27, 2, 1, 2, 0, 'SWEAT ZIPPE GRIS CHINE', 'sweatzippe1.jpg', '39,95', ''),
(28, 2, 1, 2, 0, 'SWEAT ZIPPE MARRON', 'sweatzippe2.jpg', '34,95', ''),



#TSHIRT
(29, 2, 3, 6, 0, 'T-SHIRT COL V NOIR BASIQUE', 'tshirt1.jpg', '12,95', ''),
(30, 2, 3, 6, 0, 'T-SHIRT COL V BLEU BASIQUE', 'tshirt2.jpg', '12,95', ''),
(31, 2, 3, 5, 0, 'T-SHIRT BLANC COL ROND INSCRIPTIONS', 'tshirt3.jpg', '24,95', ''),
(32, 2, 3, 5, 0, 'T-SHIRT GRIS ET NOIR INSCRIPTIONS TORSADES', 'tshirt4.jpg', '24,95', ''),


#ENFANT

#JEANS
(33, 3, 4, 8, 0, 'JEAN SLIM BLEU', 'jean1.jpg', '19,95', ''),
(34, 3, 4, 7, 0, 'JEAN SKINNY BLEU DELAVE', 'jean2.jpg', '19,95', ''),
(35, 3, 4, 8, 0, 'JEAN NOIR SLIM', 'jean3.jpg', '14,95', ''),
(36, 3, 4, 7, 0, 'JEAN BLEU CIEL SKINNY', 'jean4.jpg', '23,95', ''),

#MANTEAUX
(37, 3, 7, 13, 0, 'MANTEAU GRIS FOURRURE', 'manteaux1.jpg', '49,95', ''),
(38, 3, 7, 14, 0, 'MANTEAU NOIR MATELASSE BLEU', 'manteaux2.jpg', '39,95', ''),
(39, 3, 7, 13, 0, 'MANTEAU KAKI FOURRURE NOIR', 'manteaux3.jpg', '49,95', ''),
(40, 3, 7, 14, 0, 'MANTEAU BLEU INSCRIPTIONS', 'manteaux4.jpg', '39,95', ''),

#SWEATS
(41, 3, 1, 5, 0, 'SWEAT BLANC PONPONS NOIR', 'sweat1.jpg', '19,95', ''),
(42, 3, 1, 6, 0, 'SWEAT CAMEL TRESSE', 'sweat2.jpg', '29,95', ''),
(43, 3, 1, 6, 0, 'SWEAT GRIS CHINE DOUBLURE BLANCHE', 'sweat3.jpg', '24,95', ''),
(44, 3, 1, 6, 0, 'SWEAT BLEU EN LEINE', 'sweat4.jpg', '29,95', '');



INSERT INTO `user`(`id_user`, `nom_user`, `prenom_user`, `pseudo_user`, `age_user`, `email_user`, `mdp_user`) VALUES 

(1, 'Dupont', 'Paul', 'PaulDupont01', '32', 'dupontpaul@000.fr', SHA1('azergn2')),

(2, 'Bafa', 'Marie', 'MarieBaf', '27',  'mariemarie@123.fr' , SHA1('zdqdf1')),

(3, 'Nala', 'Sarah', 'Sarahna', '47', 'sarahnaaa@456.fr' , SHA1('dfnqfnslgjsil')),

(4, 'Poivai', 'Pablo', 'Poivaaai', '44', 'poivai@vaipoi.fr' , SHA1('fgnsgjsikjp')),

(6, 'Anna', 'Sabrina', 'anna1818', '28', '18anna@hotmail.fr', SHA1('aizdport')),

(7, 'Boval', 'Jacques', 'Bovjac', '48',  'bovaljacques@live.fr', SHA1('oyihyjn')),

(8, 'Jacob', 'Phil', 'philjacccc', '31', 'jacques1212@hotmail.fr' , SHA1('vnrjggp')),

(9, 'Dupuis', 'Loic', 'dupuisloic', '60',  'loic@yahoo.fr' , SHA1('nrjgrgpigkp')),

(10, 'Durant', 'Marc', 'marcoooo4', '47', 'marco@live.fr' , SHA1('klqfldjl')),

(11, 'Aniece', 'Lea', 'aniece25aniece', '32', 'aniece25@hotmail.fr', SHA1('fkmqefm')),

(12, 'Garance', 'Maria', 'garance21', '19',  'garance21@hotmail.fr' , SHA1('fgnsgjeesgssikjp')),

(13, 'Lavie', 'Lola', 'Lolalola', '25',  'Lolalola@Lolalola.fr' , SHA1('fesfsf')),

(14, 'Sonna', 'Emma', 'Emma08sonna', '24', 'emmaa18@live.fr' , SHA1('lvgkslmgkm.fr')),

(15, 'Lantier', 'Etienne', 'Lantierrrr', '27', 'Lantier@live.fr', SHA1('rgerq.fr')),

(16, 'Bastafule', 'Jean-Yves', 'Bastafull', '47',  'Basta@live.fr', SHA1('gtgtth.fr')),

(17, 'Gouranvier', 'Sara', 'Sarahh7', '36',  'sara45@live.fr', SHA1('refeaaagerq.fr')),

(18, 'Coquagnon', 'Frederic', 'Fredou', '61',  'FredCoqua@live.fr', SHA1('hthjyku.fr')),

(18, 'Hassan', 'Gary', 'GaryH', '20',  'garyhassan@hotmail.fr', '1111');


INSERT INTO `categorie` (`id_categorie`, `designation_ctg`) VALUES
(1, 'Femme'),
(2, 'Homme'),
(3, 'Enfant');


INSERT INTO `sous_categorie`(`id_sous_ctg`, `type_sous_ctg`) VALUES 
(1, 'Sweats'),
(2, 'Polo'),
(3, 'T-Shirt'),
(4, 'Jeans'),
(5, 'Jupes'),
(6, 'Robes'),
(7, 'Manteaux/Vestes'),
(8, 'Parfum'),
(9, 'Chaussures');


INSERT INTO `sous_produit` (`id_sous_ctg`, `type_sous_pdt`) VALUES
(1, 'A capuche'),
(1, 'Zippé'),
(2, 'Manche longue'),
(2, 'Manche courte'),
(3, 'Imprimé'),
(3, 'Basique'),
(4, 'Slim Fit'),
(4, 'Skinny'),
(5, 'Longue'),
(5, 'Courte'),
(6, 'Longue'),
(6, 'Courte'),
(7, 'Fourrure'),
(7, 'Bombers'),
(8, '50ml'),
(8, '75ml'),
(9, 'Bottes'),
(9, 'Talons');











