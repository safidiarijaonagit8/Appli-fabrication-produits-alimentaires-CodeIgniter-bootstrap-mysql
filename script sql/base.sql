create table superadmin (
    id integer not null auto_increment,
    identifiant varchar(30),
    mdp varchar(100),
    primary key(id)
)ENGINE=InnoDB;
insert into superadmin values(null,'admin1',sha1('admin'));
insert into superadmin values(null,'admin2',sha1('admin'));

create table utilisateur(
    id integer not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    sexe varchar(50),
    email varchar(100),
    datedenaissance date,
    mdp varchar(100),
    primary key(id)
)ENGINE=InnoDB;

insert into utilisateur values(null,'rakoto','jean','masculin','rakoto@gmail.com','2000-02-20',sha1('rakoto'));

create table utilisateurvalide (
    id integer not null auto_increment,
    idutilisateur integer,
    primary key(id),
    foreign key(idutilisateur) references utilisateur(id)
)ENGINE=InnoDB;
insert into utilisateurvalide values(null,1);

create table utilisateurnonvalide (
    id integer not null auto_increment,
    idutilisateur integer,
    primary key(id),
    foreign key(idutilisateur) references utilisateur(id)
)ENGINE=InnoDB;

insert into utilisateurnonvalide values(null,1);
insert into utilisateurnonvalide values(null,2);


create table matierepremiere(
    id integer not null auto_increment,
    nom varchar(100),
    seuil real,
    primary key(id)
)ENGINE=InnoDB;

/*insert into matierepremiere values(null,'sucre',10);
insert into matierepremiere values(null,'lait',10);
insert into matierepremiere values(null,'parfum',5);
insert into matierepremiere values(null,'conservateur',7);
insert into matierepremiere values(null,'colorant',10);
insert into matierepremiere values(null,'banane',5);
insert into matierepremiere values(null,'fraise',5);
*/

insert into matierepremiere values(null,'Lait',10);
insert into matierepremiere values(null,'Sucre',5);
insert into matierepremiere values(null,'parfum',1);
insert into matierepremiere values(null,'Ferment',1);

create table stock(
    id integer not null auto_increment,
    idmatierepremiere integer,
    qteentree real,
    qtesortie real,
    datemvt date,
    primary key(id),
    foreign key(idmatierepremiere) references matierepremiere(id)
)ENGINE=InnoDB;

create view v_etatstock 
as select sum(qteentree)-sum(qtesortie) as reste,nom,mp.id as idmatierepremiere,seuil 
from matierepremiere mp left join stock s 
on s.idmatierepremiere=mp.id
group by mp.id;

create view v_etatstockproduitfini
as select sum(qteentree)-sum(qtesortie) as reste,nomproduit,p.id as idproduit
from produit p left join stockproduitfini s 
on s.idproduit=p.id
group by p.id;



create view v_verifseuil
as select reste,v.nom,
mp.seuil as seuil
from v_etatstock as v join matierepremiere as mp
on v.idmatierepremiere=mp.id;

SELECT reste, seuil,nom
from v_verifseuil
where reste < seuil;

create table produit(
    id integer not null auto_increment,
    nomproduit varchar(100),
    primary key(id)
)ENGINE=InnoDB;

insert into produit values(null,'creme fraiche');
insert into produit values(null,'yaourt');
insert into produit values(null,'beurre');
insert into produit values(null,'glace');
insert into produit values(null,'yaourt a la banane');



create table fabrication(
    id integer not null auto_increment,
    idproduit integer,
    idmatierepremiere integer,
    qte real,
    primary key(id),
    foreign key(idproduit) references produit(id),
    foreign key(idmatierepremiere) references matierepremiere(id)
)ENGINE=InnoDB;

insert into fabrication values(null,5,2,80);
insert into fabrication values(null,5,4,10);
insert into fabrication values(null,5,7,10);
insert into fabrication values(null,1,1,50);
insert into fabrication values(null,1,2,20);
insert into fabrication values(null,1,4,20);
insert into fabrication values(null,2,1,50);
insert into fabrication values(null,2,2,10);
insert into fabrication values(null,2,4,20);
insert into fabrication values(null,3,2,50);
insert into fabrication values(null,3,3,50);
insert into fabrication values(null,4,1,25);
insert into fabrication values(null,4,2,25);
insert into fabrication values(null,4,4,25);
insert into fabrication values(null,4,5,25);


/*create table stockproduitfini(
    id integer not null auto_increment,
    idproduit integer,
    qte real,
    daty date,
    primary key(id),
    foreign key(idproduit) references produit(id)
)ENGINE=InnoDB;
*/
create table stockproduitfini(
    id integer not null auto_increment,
    idproduit integer,
    qteentree real,
    qtesortie real,
    daty date,
    primary key(id),
    foreign key(idproduit) references produit(id)
)ENGINE=InnoDB;
 

/*select f.idproduit,f.idmatierepremiere,mp.nom,reste, from 
fabrication f left join v_etatstock v 
on f.idmatierepremiere=v.idmatierepremiere 
join matierepremiere mp on f.idmatierepremiere = mp.id;
*/

select f.idproduit,f.idmatierepremiere,mp.nom,reste,(f.qte*30)/100 as qteilaina from 
fabrication f left join v_etatstock v 
on f.idmatierepremiere=v.idmatierepremiere 
join matierepremiere mp on f.idmatierepremiere = mp.id 
join produit p on 
f.idproduit=p.id;


select f.idproduit,f.idmatierepremiere,mp.nom,reste,(f.qte*30)/100 
as qteilaina,(reste*30)/((f.qte*30)/100) 
as vitanymp 
from fabrication f 
left join v_etatstock v 
on f.idmatierepremiere=v.idmatierepremiere 
join matierepremiere mp 
on f.idmatierepremiere = mp.id 
join produit p 
on f.idproduit=p.id
where f.idproduit=1;





select (f.qte*30)/100 as qteilaina,f.idmatierepremiere,mp.nom,f.idproduit from
fabrication f join matierepremiere mp 
on f.idmatierepremiere=mp.id 
join produit p on 
f.idproduit=p.id;


create view v_fabrication
as select f.id,f.idproduit,p.nomproduit,mp.nom as matierepremiere,qte as pourcentage,
f.idmatierepremiere
from fabrication f join produit p 
on f.idproduit=p.id 
join matierepremiere mp 
on f.idmatierepremiere=mp.id;






































