CREATE TABLE rol_usuario (
  	id int(11) NOT NULL AUTO_INCREMENT, 
        descripcion varchar (100) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO rol_usuario (id, descripcion) VALUES
(1, 'admin'),
(2, 'estudiante'),
(3, 'profesor');

CREATE TABLE curso (
  	id int(11) NOT NULL AUTO_INCREMENT, 
	sigla  varchar(20) NOT NULL,
        nombre varchar (200) NOT NULL,
	paralelo varchar (10) NOT NULL,
	nivel int (11) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;




CREATE TABLE usuario (
  	id int(11) NOT NULL AUTO_INCREMENT, 
	usuario  varchar(50) NOT NULL,
	password  varchar(50) NOT NULL,
	ap_paterno varchar(100),
	ap_materno varchar(100),
	nombre varchar(200) NOT NULL,
	correo varchar(200) NOT NULL,
	id_rol_u int(11) NOT NULL, 
  	PRIMARY KEY (id),
	KEY (id_rol_u), 
        FOREIGN KEY (id_rol_u) REFERENCES rol_usuario (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO usuario (id, usuario, password, ap_paterno, ap_materno, nombre, correo, id_rol_u) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'super', 'super', 'administrador', 'admin@gmail.com', 1);


CREATE TABLE insc_curso (
  	id int(11) NOT NULL AUTO_INCREMENT, 
	fecha date NOT NULL, 
	id_usuario int(11) NOT NULL,
	id_curso int(11) NOT NULL,
	id_rol_u int(11) NOT NULL,	
	PRIMARY KEY (id),
	KEY (id_usuario), 
        FOREIGN KEY (id_usuario) REFERENCES usuario (id),
	KEY (id_curso), 
        FOREIGN KEY (id_curso) REFERENCES curso (id),
	KEY (id_rol_u), 
        FOREIGN KEY (id_rol_u) REFERENCES rol_usuario (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE tarea (
  	id int(11) NOT NULL AUTO_INCREMENT, 
    	fecha date NOT NULL,
	titulo varchar (100) NOT NULL,
	archivo_docente varchar (200),
	id_curso int(11) NOT NULL,
	id_usuario int(11) NOT NULL,
	PRIMARY KEY (id),
	KEY (id_curso), 
    	FOREIGN KEY (id_curso) REFERENCES curso (id),
	KEY (id_usuario), 
    	FOREIGN KEY (id_usuario) REFERENCES usuario (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



CREATE TABLE respuesta (
  	id int(11) NOT NULL AUTO_INCREMENT, 
    	fecha date NOT NULL,
	archivo_estudiante varchar (200),
	observacion text,
	calificacion int (11),
	id_tarea int(11) NOT NULL,
	id_usuario int(11) NOT NULL,
	PRIMARY KEY (id),
	KEY (id_tarea), 
    	FOREIGN KEY (id_tarea) REFERENCES tarea (id),
	KEY (id_usuario), 
    	FOREIGN KEY (id_usuario) REFERENCES usuario (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
