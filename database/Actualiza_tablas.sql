use db_kiosk_local;

SET foreign_key_checks = 0;

Drop table listas;

CREATE TABLE IF NOT EXISTS listas(
	id_grupo INT NOT NULL,
	curp VARCHAR(18) NOT NULL,
    sesion1 boolean,
    sesion2 boolean,
    sesion3 boolean,
    sesion4 boolean,
    sesion5 boolean,
    sesion6 boolean,
    sesion7 boolean,
    sesion8 boolean,
    sesion9 boolean,
    sesion10 boolean,
    sesion11 boolean,
    sesion12 boolean,
    sesion13 boolean,
    sesion14 boolean,
    sesion15 boolean,
    sesion16 boolean,
    sesion17 boolean,
    sesion18 boolean,
    sesion19 boolean,
    sesion20 boolean,
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT listas_pk PRIMARY KEY (id_grupo, curp),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
	FOREIGN KEY (curp) REFERENCES alumnos(curp)
);

drop table grupos;

CREATE TABLE IF NOT EXISTS grupos(
	id_grupo INT NOT NULL AUTO_INCREMENT,
	id_idioma INT NOT NULL,
	id_sistema INT NOT NULL,
	id_categoria INT NOT NULL,
	id_plantel INT NOT NULL,
    id_modulo INT NOT NULL,
	id_nivel INT NOT NULL,
	fecha_inicio DATE NOT NULL,
	hora_entrada TIME NOT NULL,
    hora_salida TIME NOT NULL,
	lunes BOOLEAN,
	martes BOOLEAN,
	miercoles BOOLEAN,
	jueves BOOLEAN,
	viernes BOOLEAN,
	sabado BOOLEAN,
	id_empleado INT,
    estado char(1),
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT grupos_pk PRIMARY KEY (id_grupo),
	FOREIGN KEY (id_idioma) REFERENCES idiomas(id_idioma),
	FOREIGN KEY (id_sistema) REFERENCES sistemas(id_sistema),
	FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
	FOREIGN KEY (id_plantel) REFERENCES planteles(id_plantel),
	FOREIGN KEY (id_empleado) REFERENCES docentes(id_empleado)
);

CREATE TABLE IF NOT EXISTS evaluacion_semanal(
	id_grupo INT NOT NULL,
	curp VARCHAR(18) NOT NULL,
    pronunciacion1 DEC(4,2),
    fluidez1 DEC(4,2),
    vocabulario1 DEC(4,2),
    gramatica1 DEC(4,2),
    participacion1 DEC(4,2),
    pronunciacion2 DEC(4,2),
    fluidez2 DEC(4,2),
    vocabulario2 DEC(4,2),
    gramatica2 DEC(4,2),
    participacion2 DEC(4,2),
    pronunciacion3 DEC(4,2),
    fluidez3 DEC(4,2),
    vocabulario3 DEC(4,2),
    gramatica3 DEC(4,2),
    participacion3 DEC(4,2),
    pronunciacion4 DEC(4,2),
    fluidez4 DEC(4,2),
    vocabulario4 DEC(4,2),
    gramatica4 DEC(4,2),
    participacion4 DEC(4,2),
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT evaluacion_pk PRIMARY KEY (id_grupo, curp),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
	FOREIGN KEY (curp) REFERENCES alumnos(curp)
);

CREATE TABLE IF NOT EXISTS calificacion_final(
	id_grupo INT NOT NULL,
	curp VARCHAR(18) NOT NULL,
    semanal DEC(4,2),
    tareas DEC(4,2),
    habilidad_escrita DEC(4,2),
    evaluacion_oral DEC(4,2),
    calificacion_final DEC(4,2),
    registrada_por VARCHAR(30),
    registrada_el DATE,
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT calificacion_pk PRIMARY KEY (id_grupo, curp),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
	FOREIGN KEY (curp) REFERENCES alumnos(curp)
);

drop table categorias;

CREATE TABLE IF NOT EXISTS categorias(
	id_categoria INT NOT NULL AUTO_INCREMENT,
	categoria VARCHAR(30) NOT NULL,
	edad_inicial INT NOT NULL,
	edad_final INT NOT NULL,
    id_idioma INT NOT NULL,
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT categorias_pk PRIMARY KEY (id_categoria),
    FOREIGN KEY (id_idioma) REFERENCES idiomas(id_idioma)
);

CREATE TABLE IF NOT EXISTS modulos(
	id_modulo INT NOT NULL AUTO_INCREMENT,
	modulo VARCHAR(30) NOT NULL,
    id_categoria INT NOT NULL,
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT modulos_pk PRIMARY KEY (id_modulo),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE IF NOT EXISTS niveles(
	id_nivel INT NOT NULL AUTO_INCREMENT,
	nivel VARCHAR(30) NOT NULL,
    id_modulo INT NOT NULL,
	modificado_por VARCHAR(30),
	updated_at DATE,
	created_at DATE,
	CONSTRAINT niveles_pk PRIMARY KEY (id_nivel),
    FOREIGN KEY (id_modulo) REFERENCES modulos(id_modulo)
);

ALTER TABLE grupos 
ADD CONSTRAINT niveles_fk 
FOREIGN KEY (id_nivel) 
REFERENCES niveles(id_nivel);

ALTER TABLE grupos 
ADD CONSTRAINT modulos_fk 
FOREIGN KEY (id_modulo) 
REFERENCES modulos(id_modulo);

SET foreign_key_checks = 1;
