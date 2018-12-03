

CREATE TABLE `alumno`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `id_persona` Int,
  `primer_nombre` Varchar(200) NOT NULL,
  `segundo_nombre` Varchar(200),
  `tercer_nombre` Varchar(200),
  `primer_apellido` Varchar(200) NOT NULL,
  `segundo_apellido` Varchar(200),
  `fechanacimiento` Date NOT NULL,
  `genero` Varchar(20) NOT NULL,
  `telefono` Varchar(30),
  `direccion` Varchar(150),
  `foto` Varchar(300),
  `fe_edad` Varbinary(300),
  `condicion` Tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship24` ON `alumno` (`id_persona`)
;


CREATE TABLE `persona`
(
  `id_persona` Int NOT NULL AUTO_INCREMENT,
  `nombres` Varchar(500) NOT NULL,
  `apellidos` Varchar(500) NOT NULL,
  `email` Varchar(100),
  `fechanacimiento` Date,
  `estado_civil` Varchar(250),
  `nacionalidad` Varchar(300) NOT NULL,
  `profesion` Varchar(350),
  `dpi` Varchar(50) NOT NULL,
  `direccion` Varchar(300),
  `telefono` Varchar(50) NOT NULL,
  `telefono_dos` Varchar(50),
  `celular` Varchar(50),
  `foto` Varchar(300),
  `usuario` Varchar(255),
  `password` Varchar(200),
  `tipo_persona` Varchar(150) NOT NULL,
  PRIMARY KEY (`id_persona`)
)
;

-- Table curso

CREATE TABLE `curso`
(
  `id_curso` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  `descripcion` Varchar(300),
  `condicion` Tinyint(4) NOT NULL,
  PRIMARY KEY (`id_curso`)
)
;

-- Table grado

CREATE TABLE `grado`
(
  `id_grado` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  `descripcion` Varchar(300),
  `seccion` Varchar(50),
  `condicion` Tinyint(4) NOT NULL,
  `id_persona` Int,
  `id_ciclo` Int,
  `id_seccion` Int,
  PRIMARY KEY (`id_grado`)
)
;

CREATE INDEX `IX_Relationship45` ON `grado` (`id_persona`)
;

CREATE INDEX `IX_Relationship46` ON `grado` (`id_ciclo`)
;

CREATE INDEX `IX_Relationship49` ON `grado` (`id_seccion`)
;

-- Table jornada

CREATE TABLE `jornada`
(
  `id_jornada` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(20) NOT NULL,
  `condicion` Tinyint(4) NOT NULL,
  PRIMARY KEY (`id_jornada`)
)
;

-- Table ciclo

CREATE TABLE `ciclo`
(
  `id_ciclo` Int NOT NULL AUTO_INCREMENT,
  `año` Int NOT NULL,
  `fecha_inicio` Date NOT NULL,
  `fecha_fin` Date NOT NULL,
  `condicion` Tinyint(4) NOT NULL,
  `nombre` Varchar(255) NOT NULL,
  PRIMARY KEY (`id_ciclo`)
)
;

-- Table inscripcion

CREATE TABLE `inscripcion`
(
  `id_inscripcion` Int NOT NULL AUTO_INCREMENT,
  `id_alumno` Int,
  `fecha` Datetime NOT NULL,
  `condicion` Tinyint(4) NOT NULL,
  `id_detalle` Int,
  `id_plan` Int,
  `id_persona` Int,
  `cuota` Float,
  PRIMARY KEY (`id_inscripcion`)
)
;

CREATE INDEX `IX_Relationship5` ON `inscripcion` (`id_alumno`)
;

CREATE INDEX `IX_Relationship54` ON `inscripcion` (`id_detalle`)
;

CREATE INDEX `IX_Relationship55` ON `inscripcion` (`id_plan`)
;

CREATE INDEX `IX_Relationship56` ON `inscripcion` (`id_persona`)
;

-- Table unidad

CREATE TABLE `unidad`
(
  `id_unidad` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(150) NOT NULL,
  PRIMARY KEY (`id_unidad`)
)
;

-- Table actividad

CREATE TABLE `actividad`
(
  `id_actividad` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(175) NOT NULL,
  `descripcion` Varchar(300),
  `valor_nota` Float NOT NULL,
  `fecha` Date NOT NULL,
  `id_tipo_actividad` Int,
  `id_asignacion_curso` Int,
  `id_unidad` Int,
  PRIMARY KEY (`id_actividad`)
)
;

CREATE INDEX `IX_Relationship18` ON `actividad` (`id_tipo_actividad`)
;

CREATE INDEX `IX_Relationship27` ON `actividad` (`id_asignacion_curso`)
;

CREATE INDEX `IX_Relationship28` ON `actividad` (`id_unidad`)
;

-- Table nota

CREATE TABLE `nota`
(
  `id_nota` Int NOT NULL AUTO_INCREMENT,
  `id_actividad` Int,
  `nota` Float,
  `id_alumno` Int,
  PRIMARY KEY (`id_nota`)
)
;

CREATE INDEX `IX_Relationship13` ON `nota` (`id_actividad`)
;

CREATE INDEX `IX_Relationship19` ON `nota` (`id_alumno`)
;

-- Table pagocuota

CREATE TABLE `pagocuota`
(
  `id_pagocuota` Int NOT NULL AUTO_INCREMENT,
  `id_inscripcion` Int,
  `id_cuota` Int,
  `monto` Float,
  `fecha` Date,
  `observacion` Varchar(300),
  PRIMARY KEY (`id_pagocuota`)
)
;

CREATE INDEX `IX_Relationship17` ON `pagocuota` (`id_cuota`)
;

CREATE INDEX `IX_Relationship25` ON `pagocuota` (`id_inscripcion`)
;

-- Table cuota

CREATE TABLE `cuota`
(
  `id_cuota` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(250) NOT NULL,
  `cantidad` Float NOT NULL,
  PRIMARY KEY (`id_cuota`)
)
;

-- Table tipo_actividad

CREATE TABLE `tipo_actividad`
(
  `id_tipo_actividad` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_actividad`)
)
;

-- Table asignacion_curso

CREATE TABLE `asignacion_curso`
(
  `id_asignacion_curso` Int NOT NULL AUTO_INCREMENT,
  `id_grado` Int NOT NULL,
  `id_curso` Int NOT NULL,
  `id_persona` Int,
  PRIMARY KEY (`id_asignacion_curso`)
)
;

CREATE INDEX `IX_Relationship20` ON `asignacion_curso` (`id_grado`)
;

CREATE INDEX `IX_Relationship21` ON `asignacion_curso` (`id_curso`)
;

CREATE INDEX `IX_Relationship22` ON `asignacion_curso` (`id_persona`)
;

-- Table nivel

CREATE TABLE `nivel`
(
  `id_nivel` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  `descripcion` Varchar(500),
  PRIMARY KEY (`id_nivel`)
)
;

-- Table asistencia

CREATE TABLE `asistencia`
(
  `id_asistencia` Int NOT NULL AUTO_INCREMENT,
  `fecha` Date,
  `condicion` Tinyint NOT NULL,
  `observacion` Varchar(500),
  `id_asignacion_curso` Int,
  `id_alumno` Int,
  PRIMARY KEY (`id_asistencia`)
)
;

CREATE INDEX `IX_Relationship29` ON `asistencia` (`id_asignacion_curso`)
;

CREATE INDEX `IX_Relationship30` ON `asistencia` (`id_alumno`)
;

-- Table rol

CREATE TABLE `rol`
(
  `id_rol` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(150) NOT NULL,
  `descripcion` Varchar(300),
  `condicion` Tinyint(4) NOT NULL,
  `display_name` Varchar(255),
  PRIMARY KEY (`id_rol`)
)
;

-- Table usuario

CREATE TABLE `usuario`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `id_persona` Int,
  `id_rol` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship31` ON `usuario` (`id_persona`)
;

CREATE INDEX `IX_Relationship32` ON `usuario` (`id_rol`)
;

-- Table notaunidad

CREATE TABLE `notaunidad`
(
  `id_notaunidad` Int NOT NULL AUTO_INCREMENT,
  `id_asignacion_curso` Int,
  `id_alumno` Int,
  `id_unidad` Int,
  `nota` Float,
  PRIMARY KEY (`id_notaunidad`)
)
;

CREATE INDEX `IX_Relationship33` ON `notaunidad` (`id_asignacion_curso`)
;

CREATE INDEX `IX_Relationship34` ON `notaunidad` (`id_alumno`)
;

CREATE INDEX `IX_Relationship35` ON `notaunidad` (`id_unidad`)
;

-- Table pagomensualidad

CREATE TABLE `pagomensualidad`
(
  `id_pagomensualidad` Int NOT NULL AUTO_INCREMENT,
  `monto` Float,
  `fecha` Date NOT NULL,
  `mora` Float,
  `id_inscripcion` Int,
  `id_mensualidad` Int,
  `id_mora` Int,
  PRIMARY KEY (`id_pagomensualidad`)
)
;

CREATE INDEX `IX_Relationship39` ON `pagomensualidad` (`id_inscripcion`)
;

CREATE INDEX `IX_Relationship40` ON `pagomensualidad` (`id_mensualidad`)
;

CREATE INDEX `IX_Relationship57` ON `pagomensualidad` (`id_mora`)
;

-- Table mensualidad

CREATE TABLE `mensualidad`
(
  `id_mensualidad` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(150) NOT NULL,
  `fecha_limite` Date NOT NULL,
  PRIMARY KEY (`id_mensualidad`)
)
;

-- Table colegio

CREATE TABLE `colegio`
(
  `id_colegio` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(350) NOT NULL,
  `direccion` Varchar(300) NOT NULL,
  `telefono` Varchar(50),
  `telefono_dos` Varchar(50),
  `foto` Varchar(300),
  PRIMARY KEY (`id_colegio`)
)
;

-- Table materialapoyo

CREATE TABLE `materialapoyo`
(
  `id_materialapoyo` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  `descripcion` Varchar(400),
  `documento` Varchar(300),
  `id_asignacion_curso` Int,
  PRIMARY KEY (`id_materialapoyo`)
)
;

CREATE INDEX `IX_Relationship41` ON `materialapoyo` (`id_asignacion_curso`)
;

-- Table carrera

CREATE TABLE `carrera`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(255) NOT NULL,
  `condicion` Tinyint(4) NOT NULL,
  `id_nivel` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship47` ON `carrera` (`id_nivel`)
;

-- Table seccion

CREATE TABLE `seccion`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)
;

-- Table Detalle

CREATE TABLE `Detalle`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `id_ciclo` Int,
  `id_jornada` Int,
  `id_grado` Int,
  `id_carrera` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship50` ON `Detalle` (`id_ciclo`)
;

CREATE INDEX `IX_Relationship51` ON `Detalle` (`id_jornada`)
;

CREATE INDEX `IX_Relationship52` ON `Detalle` (`id_grado`)
;

CREATE INDEX `IX_Relationship53` ON `Detalle` (`id_carrera`)
;

-- Table plan

CREATE TABLE `plan`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(200) NOT NULL,
  `cantidad` Int,
  PRIMARY KEY (`id`)
)
;

-- Table mora

CREATE TABLE `mora`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `cantidad` Float NOT NULL,
  PRIMARY KEY (`id`)
)
;
-- Create relationships section ------------------------------------------------- 


ALTER TABLE `inscripcion` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `nota` ADD CONSTRAINT `Relationship13` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pagocuota` ADD CONSTRAINT `Relationship17` FOREIGN KEY (`id_cuota`) REFERENCES `cuota` (`id_cuota`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `actividad` ADD CONSTRAINT `Relationship18` FOREIGN KEY (`id_tipo_actividad`) REFERENCES `tipo_actividad` (`id_tipo_actividad`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `nota` ADD CONSTRAINT `Relationship19` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asignacion_curso` ADD CONSTRAINT `Relationship20` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asignacion_curso` ADD CONSTRAINT `Relationship21` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asignacion_curso` ADD CONSTRAINT `Relationship22` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `alumno` ADD CONSTRAINT `Relationship24` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pagocuota` ADD CONSTRAINT `Relationship25` FOREIGN KEY (`id_inscripcion`) REFERENCES `inscripcion` (`id_inscripcion`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `actividad` ADD CONSTRAINT `Relationship27` FOREIGN KEY (`id_asignacion_curso`) REFERENCES `asignacion_curso` (`id_asignacion_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `actividad` ADD CONSTRAINT `Relationship28` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asistencia` ADD CONSTRAINT `Relationship29` FOREIGN KEY (`id_asignacion_curso`) REFERENCES `asignacion_curso` (`id_asignacion_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asistencia` ADD CONSTRAINT `Relationship30` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `usuario` ADD CONSTRAINT `Relationship31` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `usuario` ADD CONSTRAINT `Relationship32` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `notaunidad` ADD CONSTRAINT `Relationship33` FOREIGN KEY (`id_asignacion_curso`) REFERENCES `asignacion_curso` (`id_asignacion_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `notaunidad` ADD CONSTRAINT `Relationship34` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `notaunidad` ADD CONSTRAINT `Relationship35` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pagomensualidad` ADD CONSTRAINT `Relationship39` FOREIGN KEY (`id_inscripcion`) REFERENCES `inscripcion` (`id_inscripcion`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pagomensualidad` ADD CONSTRAINT `Relationship40` FOREIGN KEY (`id_mensualidad`) REFERENCES `mensualidad` (`id_mensualidad`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `materialapoyo` ADD CONSTRAINT `Relationship41` FOREIGN KEY (`id_asignacion_curso`) REFERENCES `asignacion_curso` (`id_asignacion_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `grado` ADD CONSTRAINT `Relationship45` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `grado` ADD CONSTRAINT `Relationship46` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `carrera` ADD CONSTRAINT `Relationship47` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `grado` ADD CONSTRAINT `Relationship49` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Detalle` ADD CONSTRAINT `Relationship50` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Detalle` ADD CONSTRAINT `Relationship51` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Detalle` ADD CONSTRAINT `Relationship52` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Detalle` ADD CONSTRAINT `Relationship53` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `inscripcion` ADD CONSTRAINT `Relationship54` FOREIGN KEY (`id_detalle`) REFERENCES `Detalle` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `inscripcion` ADD CONSTRAINT `Relationship55` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `inscripcion` ADD CONSTRAINT `Relationship56` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pagomensualidad` ADD CONSTRAINT `Relationship57` FOREIGN KEY (`id_mora`) REFERENCES `mora` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


