--USUARIOS
--DROP TABLE app.usuarios;


CREATE TABLE app.usuarios (
    uid SERIAL PRIMARY KEY,
    login varchar(30) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    nombre varchar(30),
    apellido varchar(30),
    fecha_nac date,
    status varchar(30),
    role varchar(30),
    salt varchar(255),
    email varchar(255),
    bios text
);

INSERT INTO app.usuarios(login,password,nombre,apellido)
VALUES('test1','test1','testuno','uno');

INSERT INTO app.usuarios(login,password,nombre,apellido)
VALUES('test2','test2','testdos','dos');

--AVIONES
--DROP TABLE app.aviones;

CREATE TABLE app.aviones( 
avid SERIAL PRIMARY KEY, 
marca varchar(80), 
modelo varchar(80), 
usuario_id integer REFERENCES app.usuarios(uid) 
);

INSERT INTO app.aviones(marca,modelo,usuario_id) 
VALUES('marca1','modelo2',1);

INSERT INTO app.aviones(marca,modelo,usuario_id) 
VALUES('marca1','modelo1',1);

INSERT INTO app.aviones(marca,modelo,usuario_id) 
VALUES('marca2','modelo1',2);

--POSICIONES
--DROP TABLE app.avion_posicion;

CREATE TABLE app.avion_posicion( 
avion integer REFERENCES app.aviones(avid), 
orientacion smallint CHECK(orientacion>=0 AND orientacion<360), 
velocidad numeric(5,2) CHECK(velocidad>=0 AND velocidad<112), 
altitud smallint CHECK(altitud<13000), 
posicion GEOGRAPHY(POINT,4326) NOT NULL, 
hora timestamp, 
CONSTRAINT pk_avion_posicion PRIMARY KEY(avion,hora) 
);

INSERT INTO app.avion_posicion(avion,orientacion,velocidad,altitud,posicion,hora) VALUES(1,210,40,2000,ST_GeographyFromText('SRID=4326;POINT(-6.549225 39.710884)'), now());

INSERT INTO app.avion_posicion(avion,orientacion,velocidad,altitud,posicion,hora) VALUES(2,100,20,1000,ST_GeographyFromText('SRID=4326;POINT(-5.881805 39.468005)'), now());

INSERT INTO app.avion_posicion(avion,orientacion,velocidad,altitud,posicion,hora) VALUES(3,10,14,200,ST_GeographyFromText('SRID=4326;POINT(-5.817261 39.008513)'), now());

--AEROPUERTOS
--DROP TABLE app.aeropuertos;

CREATE TABLE app.aeropuertos( 
aid SERIAL PRIMARY KEY, 
nombre varchar(255), 
tipo char(1) CHECK(tipo='O' OR tipo='A' OR tipo='Z'), 
posicion GEOGRAPHY(POINT,4326) 
);

INSERT INTO app.aeropuertos(nombre,tipo,posicion) VALUES('Caceres','A',ST_GeographyFromText('SRID=4326;POINT(-6.379623 39.465354)'));

INSERT INTO app.aeropuertos(nombre,tipo,posicion) VALUES('Badajoz','O',ST_GeographyFromText('SRID=4326;POINT(-6.999664 38.893171)'));

--ZONAS
--DROP TABLE app.zonas;

CREATE TABLE app.zonas( 
zid SERIAL PRIMARY KEY, 
nombre varchar(255), 
tipo char(1) CHECK(tipo='P' OR tipo='W' OR tipo='V'), 
area GEOGRAPHY(POLYGON,4326) 
);

INSERT INTO app.zonas(nombre,tipo,area) VALUES('Extremadura','W',ST_GeographyFromText('SRID=4326;POLYGON((-6.915894 38.246809, -6.113892 38.026459, -5.223999 38.711233, -5.899658 39.155622, -6.756592 38.869652,-6.915894 38.246809))'));

INSERT INTO app.zonas(nombre,tipo,area) VALUES('Extremadura2','W',ST_GeographyFromText('SRID=4326;POLYGON(( -4.037476 39.842286,-5.559082 39.880235,-5.471191 39.108751,-3.944092  38.993572 ,-4.037476 39.842286))'));

INSERT INTO app.zonas(nombre,tipo,area) VALUES('Caceres','W',ST_GeographyFromText('SRID=4326;POLYGON((-6.534119 39.713525 , -6.880188 39.726201, -7.003784  39.234381,  -6.583557 39.438314,-6.534119 39.713525))'));


--hay que cerrar los puntos en polygon

--Ejemplo de consulta

SELECT zid,nombre,tipo,ST_AsText(area) 
FROM app.zonas