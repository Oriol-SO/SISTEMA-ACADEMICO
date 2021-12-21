CREATE DATABASE sistema_academico;
USE sistema_academico;

CREATE TABLE USUARIO (
  `ID_USER` varchar(10) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `FOTO` longblob,
  `TIPO` varchar(30) NOT NULL,
  TELE VARCHAR(10),
  DIRECCION VARCHAR (100),
  PRIMARY KEY (`ID_USER`,`DNI`)
);

CREATE TABLE ALUMNO(
 ID_USER VARCHAR(10) NOT NULL,
 ID_ALUMNO VARCHAR(10) NOT NULL,
 NACI DATE NOT NULL,
 GRADO INT NOT NULL,
 SECCION VARCHAR(10),
 PRIMARY KEY (`ID_ALUMNO`),
 CONSTRAINT `user_alum` FOREIGN KEY (`ID_USER`) REFERENCES `USUARIO` (`ID_USER`)
);

CREATE TABLE PROFESOR(
 ID_USER VARCHAR(10) NOT NULL,
 ID_PROFE VARCHAR(10) NOT NULL,
 PRIMARY KEY (`ID_PROFE`),
 CONSTRAINT `user_profe` FOREIGN KEY (`ID_USER`) REFERENCES `USUARIO` (`ID_USER`)
);
CREATE TABLE DIRECTOR(
 ID_USER VARCHAR(10) NOT NULL,
 ID_DIREC VARCHAR(10) NOT NULL,
 PRIMARY KEY (`ID_DIREC`),
 CONSTRAINT `user_direc` FOREIGN KEY (`ID_USER`) REFERENCES `USUARIO` (`ID_USER`)
);

CREATE TABLE ADMINISTRADOR(
 ID_USER VARCHAR(10) NOT NULL,
 ID_ADMI VARCHAR(10) NOT NULL,
 PRIMARY KEY (`ID_ADMI`),
 CONSTRAINT `user_admin` FOREIGN KEY (`ID_USER`) REFERENCES `USUARIO` (`ID_USER`)
);

CREATE TABLE CURSO(
ID_CURSO VARCHAR(10) NOT NULL PRIMARY KEY,
NOMBRE VARCHAR(100)
);

CREATE TABLE SALON(
ID_SALON VARCHAR(10) NOT NULL PRIMARY KEY,
GRADO INT NOT NULL,
SECCION VARCHAR(10),
ID_CURSO VARCHAR(10) NOT NULL,
ID_PROFE VARCHAR(10) NOT NULL,
CONSTRAINT `curso_salon` FOREIGN KEY (`ID_CURSO`) REFERENCES `CURSO` (`ID_CURSO`),
CONSTRAINT `profe_salon` FOREIGN KEY (`ID_PROFE`) REFERENCES `PROFESOR` (`ID_PROFE`)
);

CREATE TABLE CLASE(
ID_ClASS VARCHAR(10) NOT NULL ,
ID_ALUMNO VARCHAR(10) NOT NULL,
ID_SALON VARCHAR(10) NOT NULL,
PROMEDIO INT,
PRIMARY KEY(ID_CLASS),
 CONSTRAINT `class_alum` FOREIGN KEY (`ID_ALUMNO`) REFERENCES `ALUMNO` (`ID_ALUMNO`),
 CONSTRAINT class_salon FOREIGN KEY (ID_SALON) REFERENCES SALON(ID_SALON)
);

CREATE TABLE CALIFICACION(
ID_CALIFICACION VARCHAR(10) NOT NULL PRIMARY KEY,
ID_CLASS VARCHAR(10) NOT NULL,
TRIMESTRE VARCHAR(30) NOT NULL,
UNIDAD VARCHAR(10) NOT NULL,
NOTA INT,
 CONSTRAINT califi_class FOREIGN KEY (ID_CLASS) REFERENCES CLASE (ID_CLASS)
);
INSERT INTO `sistema_academico`.`USUARIO` (`ID_USER`, `NOMBRE`, `APELLIDO`, `DNI`, `PASSWORD`, `TIPO`) VALUES ('U000', 'JUAN', 'ALARCON', '23150122', '123456', 'admi');