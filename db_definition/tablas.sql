
-- Crea la tabla juegos.
drop table if exists juegos;
create table juegos
(  id integer auto_increment
,  titulo varchar(50) not null
,  plataforma varchar(20)
,  fabricante varchar(20)
,  fecha_de_lanzamiento date comment 'Formato inglés -> YYYY-MM-DD'
,  precio decimal (5,2) not null

,  primary key(id)
);