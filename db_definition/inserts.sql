
use daw2;

set names utf8;

set sql_mode = 'traditional';

-- Crea la tabla juegos.
insert into tc_juegos
    (titulo , plataforma, fabricante, fecha_de_lanzamiento, precio) values
    ('Assassin`s Creed',    'PC',   'Ubisoft',	'2008-10-21', 9.95)
,   ('Assassin`s Creed II',    'PC',   'Ubisoft',	'2010-03-03', 9.95)
,   ('Alien Isolation',    'X360',   'Sega',	'2014-12-31', 64.99)
,   ('Castlevania Lords of Shadow 2',    'PS3',   'Konami',	'2014-02-27', 34.95)
,   ('Donkey Kong Country Tropical Freeze',    'WIIU',   'Nintendo',	'2014-02-21', 42.95)
,   ('Sonic Advance',    'GBA',   'Sega',	'2002-03-07', 1.95)   
;

/*
drop table if exists tc_juegos;
create table tc_juegos
(  id integer auto_increment
,  titulo varchar(50) not null
,  plataforma varchar(20)
,  fabricante varchar(20)
,  fecha_de_lanzamiento date comment 'Formato inglés -> YYYY-MM-DD'
,  precio decimal (5,2) not null

,  primary key(id)
)
engine = myisam default charset=utf8
;*/