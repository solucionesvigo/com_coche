DROP TABLE IF EXISTS `#__coche_marcas`;

CREATE TABLE `#__coche_marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
  `imagen` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_modelos`;

CREATE TABLE `#__coche_modelos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idMarca` INT(11) NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_versiones`;

CREATE TABLE `#__coche_versiones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idMarca` INT(11) NOT NULL,
  `idModelo` INT(11) NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
  `idTipo` INT(11) NOT NULL,
  `idCombustible` INT(11) NOT NULL,
  `estado` BOOLEAN default true NOT NULL,   
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_tipos`;

CREATE TABLE `#__coche_tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__coche_tipos` (nombre) VALUES 
('Turismo'), ('Todoterreno'), ('Industrial');

DROP TABLE IF EXISTS `#__coche_combustibles`;

CREATE TABLE `#__coche_combustibles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__coche_combustibles` (nombre) VALUES 
('Gasolina'), 
('Diésel'), 
('Híbrido'), 
('Eléctrico'), 
('Gas');

DROP TABLE IF EXISTS `#__coche_clasesequipamiento`;

CREATE TABLE `#__coche_clasesequipamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_equipamientos`;

CREATE TABLE `#__coche_equipamientos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idClaseequipamiento` INT(11) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_equipamientosversion`;

CREATE TABLE `#__coche_equipamientosversion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idVersion` INT(11) NOT NULL,
  `idEquipamiento` INT(11) NOT NULL,
  `idClaseequipamiento` INT(11) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_anuncios`;

CREATE TABLE `#__coche_anuncios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idVendedor` INT(11) NOT NULL,
  `idMarca` INT(11) NOT NULL,
  `idModelo` INT(11) NOT NULL,
  `idVersion` INT(11) NOT NULL,
  `precio` INT(8) NOT NULL,
  `kilometros` INT(8) NOT NULL, 
  `mesMatriculacion` INT(2) NOT NULL,   
  `anioMatriculacion` INT(4) NOT NULL,  
  `comentario` TEXT,
  `publicado` BOOLEAN NOT NULL,
  `idFotoPrincipal` INT(11),
  `fechaAnuncio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_anuncioequipamientos`;

CREATE TABLE `#__coche_anuncioequipamientos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idAnuncio` INT(11) NOT NULL,
  `idEquipamiento` INT(11) NOT NULL,
  `serie` BOOL NOT NULL,
  `opcional` BOOL NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__coche_fotos`;

CREATE TABLE `#__coche_fotos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idAnuncio` INT(11) NOT NULL, 
  `nombre` VARCHAR(100),
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
